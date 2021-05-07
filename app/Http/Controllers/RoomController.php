<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Room;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('pages.rooms');
    }

    public function indexStudent(){

        //$user = User::where('id', Auth::id())->with(['userRomes.room', 'userRomes.role', 'userRomes'])->firstOrFail();
        //return $user->userRomes;
        return view('pages.student.rooms');
    }
}
