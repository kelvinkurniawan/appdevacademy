<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $guarded = [];
    use HasFactory;

    public function TaskProgresses(){
        return $this->hasMany(TaskProgress::class);
    }
}
