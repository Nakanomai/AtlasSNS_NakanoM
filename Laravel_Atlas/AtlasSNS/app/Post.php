<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
  protected $fillable = [
      'created_at', 'updated_at'
  ];
  protected $dates = [
      'created_at', 'updated_at'
  ];//

  public function getTimeLines(Int $user_id, Array $follow_ids)
    {
        return $this->whereIn('user_id', $follow_ids)->orderBy('created_at', 'DESC')->paginate();
    }
}
