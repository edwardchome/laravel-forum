<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Threads extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function path(){
        return '/threads/'.$this->id;
    }

    public function replies(){
        return $this->hasMany(Replies::class);
    }

    public function creator(){
        return $this->belongsTo(User::class, 'user_id');
    }

    public function AddReply($reply){
        $this->replies()->create($reply);
    }
}
