<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
  protected $fillable = [
      'created_at', 'updated_at',
      'user_id', 'post',
  ];
  protected $dates = [
      'created_at', 'updated_at'
  ];//　

  /* 投稿に関連しているユーザーの取得 */
  public function user()
    {
        return $this->belongsTo('App\User');
    }

  // 一覧画面
  public function getTimeLines(Int $user_id, Array $follow_ids)
  {
    return $this->whereIn('user_id', $follow_ids)->orderBy('created_at', 'DESC')->paginate();
  }
}
