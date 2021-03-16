<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Threads extends Model
{
    use HasFactory;

    public function path(){
        return '/threads/'.$this->id;
    }

    public function replies(){
        return $this->hasMany(Replies::class);
    }
}
