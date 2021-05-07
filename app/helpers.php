<?php

use App\Models\User;

if(!function_exists('getUserById')){
    function getUserById($id){
        $user =  User::where('id', $id)->first();
        return $user->name;
    }
}
