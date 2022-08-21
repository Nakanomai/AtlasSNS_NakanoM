<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;


class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'user_id', 'mail', 'password','icon_image',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /*投稿のユーザーを取得*/
    public function posts()
    {
      return $this->hasMany('App\Post');
    }

    /*フォローされているユーザーを取得*/
   public function followers()
   {
       return $this->belongsToMany(self::class, 'follows', 'followed_id', 'following_id');
   }
  /*フォローしているユーザーを取得*/
   public function follows()
   {
       return $this->belongsToMany(self::class, 'follows', 'following_id', 'followed_id');
   }

   // フォローする
    public function follow(Int $user_id)
    {
        return $this->follows()->attach($user_id);
    }

    // フォロー解除する
    public function unfollow(Int $user_id)
    {
        return $this->follows()->detach($user_id);
    }

    // フォローしているか
    public function isFollowing(Int $user_id)
    {
        return (boolean) $this->follows()->where('followed_id', $user_id)->first(['follows.id']);
    }

    // フォローされているか
    public function isFollowed(Int $user_id)
    {
        return (boolean) $this->followers()->where('following_id', $user_id)->first(['follows.id']);
    }

}
