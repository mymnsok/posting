<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class User extends Model implements AuthenticatableContract,
                                    AuthorizableContract,
                                    CanResetPasswordContract
{
    use Authenticatable, Authorizable, CanResetPassword;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'email', 'password'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];
    
    public function posts()
    {
        return $this->hasMany(Post::class);
    }
    
    public function user_posts()
    {
        return $this->belongsToMany(Post::class, 'user_post', 'user_id', 'post_id')->withtimestamps();
    }
    
    public function favorite($postId)
    {
        // 既に登録しているかの確認
        $exist = $this->is_user_posts($postId);
    
        //登録していないなら登録する
        if($exist){
            return false;
        } else{
            $this->user_posts()->attach($postId);
            return true;
        }
    }
    
    public function unfavorite($postId)
    {
        // 既に登録しているかの確認
        $exist = $this->is_user_posts($postId);
    
        //登録していないなら登録する
        if($exist){
            $this->user_posts()->detach($postId);
            return true;
        } else{
           return false; 
        }
    }
    
    // user_postテーブルに登録されていたらtrueを返す関数
    public function is_user_posts($postId)
    {
        return $this->user_posts()->where('post_id', $postId)->exists();
    }
    
}