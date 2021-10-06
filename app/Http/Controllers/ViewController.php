<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ViewController extends Controller
{
    
    function userEditProfile()
    {
        return  view('user.editprofile');
    }


    function userInvoice()
    {
        return  view('user.invoice');
    }


    function userSecurity()
    {
        return  view('user.security');
    }


}
