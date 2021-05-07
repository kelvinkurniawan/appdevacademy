<?php

use App\Models\RoomUsers;
use App\Models\User;

if(!function_exists('getUserById')){
    function getUserById($id){
        $user =  User::where('id', $id)->first();
        return $user->name;
    }
}

function hasRoleInRoom($room, $user, $role) {
    return RoomUsers::where([
        ['room_id', '=', $room],
        ['user_id', '=', $user],
        ['role_id', '=', $role]
    ])->count() == 1;
}
