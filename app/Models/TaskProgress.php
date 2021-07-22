<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TaskProgress extends Model
{
    protected $guarded = [];
    protected $table = 'task_progresses';

    use HasFactory;
}
