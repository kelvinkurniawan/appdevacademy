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

function convertYoutube($string) {
    return preg_replace(
        "/\s*[a-zA-Z\/\/:\.]*youtu(be.com\/watch\?v=|.be\/)([a-zA-Z0-9\-_]+)([a-zA-Z0-9\/\*\-\_\?\&\;\%\=\.]*)/i",
        "<iframe width='100%' height='300px' src=\"//www.youtube.com/embed/$2\" allowfullscreen></iframe>",
        $string
    );
}
