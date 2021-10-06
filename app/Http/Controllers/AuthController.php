<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Validator;

use Illuminate\Support\Facades\Http;



class AuthController extends Controller
{



    function updateProfile(Request $request)
    {
        $val = Validator::make($request->all(), [
            'firstname' => 'string|required',
            'lastname' => 'string|required',
        ])->validate();
        User::where('id', $request->id)->update([
            'firstname' => $val['firstname'] ,
            'lastname' =>  $val['lastname'], 
        ]);
        return back()->with('success', 'Profile updated scucssfully');
    }


    function deleteProfilePics(Request $request)
    {
        User::where('id', $request->id)->update([
            'photo' => 'user.jpg',
        ]);
        return back()->with('success', 'Profile photo has benn removed');
    }


    function uploadProfilePics(Request $request)
    {
        if ($request->hasFile('photo')) {
            $name = time().rand(123212321,999999999999).'.'.$request->photo->extension();
            move_uploaded_file($request->photo ,'assets/img/avatar/'.$name);
            User::where('id', $request->id)->update([
                'photo' => $name,
            ]);
        }
        return back()->with('success', 'Profile Photo Uploaded Sucessfully');
    }



    function chnagePassword(Request $request)
    {
        $val = Validator::make($request->all(), [
            'old_password' => 'string|required',
            'new_password' => 'string|required|min:6',
            'confirm_password' => 'string|required',
        ])->validate();
        
        if(password_verify($val['old_password'], auth()->user()->id)){
            if($val['new_password'] == $val['confirm_password']){
                User::where('id', auth()->user()->id)->update([
                    'password' => password_hash($val['new_password'], PASSWORD_BCRYPT),
                ]);
                return back()->with('success', 'Password Updated Sucess Fully');
            }else { return back()->with('error', 'Password does not match'); }
        }else{
            return back()->with('error', 'Inavlid password');
        }
    }


    function loginUser(Request $request)
    {
        $user = User::where('live_id', $request->live_id)->first();
        if($user == ''){
            //register the user
            $new = User::create([
                'lastname' => $request->lastname,
                'firstname' => $request->firstname,
                'email' => $request->email,
                'password' => $request->password,
                'live_id' => $request->live_id,
                'phone' => $request->phone,
            ]);
            return response()->json([
                'success' => true,
                'message' => 'You Just logged in for the first time',
                'data' => null,
            ], 201);
        }else{ 
            User::where('live_id', $request->live_id)->update(['password' => $request->password, 'phone' => $request->phone]); 
            if(auth()->login($user)){
                return response()->json([
                    'success' => true,
                    'message' => 'Login Sucessful',
                    'data' => auth()->user(),
                ], 201);
            }else{
                return response()->json([
                    'success' => true,
                    'message' => 'Login Sucessful',
                    'data' => auth()->user(),
                ], 201);
            }
        }  
    }


    function registerUser()
    {
        //
    }

}
