<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['content', 'user_id'];
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function post_users(){
        
        return $this->belogsToMany(User::class, 'user_post', 'post_id', 'user_id')->withtimestamps();
    }
}
