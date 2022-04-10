<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    function index(Request $request){

        /*if( $request->ajax() ){
            $result = User::all();
            return ['data'=>$result ];
        }*/
        $users = User::all();
        return view('user.index',compact('users'));
    }
}
