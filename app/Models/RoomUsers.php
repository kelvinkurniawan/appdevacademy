<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoomUsers extends Model{
    protected $guarded = [];

    use HasFactory;

    public function role(){
        return $this->belongsTo(Role::class);
    }

    public function room(){
        return $this->belongsTo(Room::class);
    }
}
