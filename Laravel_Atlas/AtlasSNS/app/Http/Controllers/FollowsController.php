<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Post;
use App\Follow;

class FollowsController extends Controller
{
    //
    public function followList(Post $post, Follow $follow, user $user){
      $user = auth()->user(); //現在認証しているユーザーを取得
      $list = User::get();  //  where('id','$id') - > get () ?
      $follow_ids = $follow->followingIds($user->id);
      $following_ids = $follow_ids->pluck('followed_id')->toArray();
      $timelines = $post->getTimelines($user->id, $following_ids);
    return view('follows.followList',[
      'list' => $list,
      'timelines' => $timelines
    ]);
    }

    public function followerList(Post $post, Follow $follow, user $user){
      $user = auth()->user();
      $follow_ids = $follow->followedIds($user->id);
      //ユーザーがフォローされているユーザーを取得
      $followed_ids = $follow_ids->pluck('following_id')->toArray();
      $timelines = $post->getTimelines($user->id, $followed_ids);
      $list = $this->followers()->whereIn('following_id', $user->id,)->pluck('following_id')->toArray();
        return view('follows.followerList',[
          'list' => $list,
          'timelines' => $timelines
        ]);
    }

    //フォローする
    public function follow(Request $request)
    {
        FollowUser::firstOrCreate([
            'followed_user_id' => $request->post_user,
            'following_user_id' => $request->auth_user
        ]);
        return true;
    }
    //フォロー解除する
    public function unfollow(Request $request)
    {
        $follow = FollowUser::where('followed_user_id', $request->post_user)
            ->where('following_user_id', $request->auth_user)
            ->first();
        if ($follow) {
            $follow->delete();
            return false;
        }
    }
}
