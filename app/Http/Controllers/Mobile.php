<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Http;
use GuzzleHttp\Client;



class Mobile extends ApiController
{


    public function ApiloginUser(Request $request)
    {
        $email = $request->input('email');
        $password = $request->input('password');
        $response = Http::get('http://localhost/livepetal/testapi/api/cbt/apiclass.php?email='.$email.'&&password='.$password.'
        &&LoginUserViaCbtGet=LoginUserViaCbtGet');
        $data = json_decode($response, true);
        return $data['data'];
    }

    // function loginUser333333333333333(Request $request)
    // {
    //     $email = $request->input('email');
    //     $password = $request->input('password');

    //     $response = Http::post('http://localhost/livepetal/testapi/api/cbt/api.php', [
    //             'LoginUserApi' => 'LoginUserApi',
    //     ]);

    //     return $response;
    // }




    function signup(Request $request)
    {

    }



    function howToSpecifyAllAPiTypes()
    {
        $token = 'token'; $client = auth()->user();
        //passing it in as a get variable
        $response = $client->request('GET', '/api/user?api_token='.$token);

        //or as a post using headers
        $response = $client->request('POST', '/api/user', [
            'headers' => [
                'Accept' => 'application/json',
            ],
            'form_params' => [
                'api_token' => $token,
            ],
        ]);

        ///as a bearer token

        $response = $client->request('POST', '/api/user', [
            'headers' => [
                'Authorization' => 'Bearer '.$token,
                'Accept' => 'application/json',
            ],
        ]);
    }


        // function updateUsers() {

    //     $token = Str::random(60);

    //     User::where('id', 2)->update([
    //         'api_token' => hash('sha256', $token),
    //     ]);

    //     return response('done');
    // }


}
