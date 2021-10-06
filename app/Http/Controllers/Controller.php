<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    function createThumbnail($sourceImagePath, $destImagePath, $thumbWidth = 50)
    {
        $type = exif_imagetype($sourceImagePath);
        if (!$type || !IMAGETYPE_JPEG || !IMAGETYPE_PNG) {
            return null;
        }
        if ($type == IMAGETYPE_PNG) {
            $sourceImage = imagecreatefrompng($sourceImagePath);
            $orgWidth = imagesx($sourceImage);
            $orgHeight = imagesy($sourceImage);
            $thumbHeight = floor($orgHeight * ($thumbWidth / $orgWidth));
            $thumbnail = imagecreatetruecolor($thumbWidth, $thumbHeight);
            // make image transparent
            imagecolortransparent(
                $thumbnail,
                imagecolorallocate(
                    $thumbnail,
                    0,
                    0,
                    0
                )
            );
            imagecopyresampled($thumbnail, $sourceImage, 0, 0, 0, 0, $thumbWidth, $thumbHeight, $orgWidth, $orgHeight);

            imagepng($thumbnail, $destImagePath);
        } elseif ($type  == IMAGETYPE_JPEG) {
            $sourceImage = imagecreatefromjpeg($sourceImagePath);
            $orgWidth = imagesx($sourceImage);
            $orgHeight = imagesy($sourceImage);
            $thumbHeight = floor($orgHeight * ($thumbWidth / $orgWidth));
            $thumbnail = imagecreatetruecolor($thumbWidth, $thumbHeight);
            imagecopyresampled($thumbnail, $sourceImage, 0, 0, 0, 0, $thumbWidth, $thumbHeight, $orgWidth, $orgHeight);
            imagejpeg($thumbnail, $destImagePath);
        }
        imagedestroy($sourceImage);
        imagedestroy($thumbnail);
    }




}
