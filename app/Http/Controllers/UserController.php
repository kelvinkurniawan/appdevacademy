<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the users
     *
     * @param  \App\Models\User  $model
     * @return \Illuminate\View\View
     */

    public function index(User $model)
    {
        if(request()->user()->hasRole('admin')){
            return view('users.index');
        }else{
            return view('dashboard');
        }
    }
}
