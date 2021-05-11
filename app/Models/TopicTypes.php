<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TopicTypes extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $table = 'topic_types';

    public function topic(){
        return $this->hasMany(Topic::class);
    }
}
