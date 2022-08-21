<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Follow extends Model
{
    //
    protected $fillable = [
    'following_id', 'followed_id'
  ];

  public function user()
    {
        return $this->belongsTo('App\User');
    }

// フォローしているユーザのIDを取得
public function followingIds(Int $user_id)
  {
    return $this->where('following_id', $user_id)->get();
  }
// フォローされたユーザのIDを取得
public function followedIds(Int $user_id)
  {
    return $this->where('followed_id', $user_id)->get();
  }
}
