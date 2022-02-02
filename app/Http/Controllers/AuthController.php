<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Validator;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Auth;



class AuthController extends Controller
{




    function login(Request $request)
    {

        $res = Http::asForm()->post(env('LINK'), [
            'LoginUserViaCbtGet' => 'good',
            'email' => $request->email,
            'password' => $request->password ?? '',
        ]);
        $user = [
            'email' => $request->email,
            'password' => $request->password,
        ];
        if ($res['status'] == 1) {
            $data = $res['data'];
            $create = $this->createUser($data);
            $userData = $this->pAuth($user);
            if(auth()->user()->role > 1) { return redirect('/control')->with('success', 'welcome back'); }
            return redirect('/user')->with('success', 'welcome back');
        }
        return back()->with('error', $res['message']);
    }




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







    function pAuth($user)
    {
        if (Auth::attempt($user)) {
            $user = User::where('id', auth()->user()->id)->first(['id', 'firstname', 'lastname', 'email', 'phone']);
            return response($user);
        } else {
            return response(['message' => 'error logging in', 'success' => false]);
        }
    }



    function createUser($data)
    {
        $user = User::where('live_id', $data['sn'])->first();
        if ($user == null or $user = '') {
            User::create([
                'lastname' => $data['lastname'],
                'firstname' => $data['firstname'],
                'email' => $data['email'],
                'phone' => $data['phone'],
                'live_id' => $data['sn'],
                'password' => $data['pass'],
            ]);
        } else {
            User::where('live_id', $data['sn'])->update([
                'lastname' => $data['lastname'],
                'firstname' => $data['firstname'],
                'email' => $data['email'],
                'phone' => $data['phone'],
                'password' => $data['pass'],
            ]);
        }
    }





    // function loginUser(Request $request)
    // {
    //     $user = User::where('live_id', $request->live_id)->first();
    //     if($user == ''){
    //         //register the user
    //         $new = User::create([
    //             'lastname' => $request->lastname,
    //             'firstname' => $request->firstname,
    //             'email' => $request->email,
    //             'password' => $request->password,
    //             'live_id' => $request->live_id,
    //             'phone' => $request->phone,
    //         ]);
    //         return response()->json([
    //             'success' => true,
    //             'message' => 'You Just logged in for the first time',
    //             'data' => null,
    //         ], 201);
    //     }else{
    //         User::where('live_id', $request->live_id)->update(['password' => $request->password, 'phone' => $request->phone]);
    //         if(auth()->login($user)){
    //             return response()->json([
    //                 'success' => true,
    //                 'message' => 'Login Sucessful',
    //                 'data' => auth()->user(),
    //             ], 201);
    //         }else{
    //             return response()->json([
    //                 'success' => true,
    //                 'message' => 'Login Sucessful',
    //                 'data' => auth()->user(),
    //             ], 201);
    //         }
    //     }
    // }


}
