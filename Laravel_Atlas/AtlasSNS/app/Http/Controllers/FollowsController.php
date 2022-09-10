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
      //現在認証しているユーザーを取得
      $user = auth()->user();
      //ログインユーザーのリレーション先のqueryを取得
      $following_ids = $user->follows()->pluck('followed_id');
      //フォローのアイコン一覧を取得
      $list = User::whereIn('id',$following_ids)->get();
      //フォローの投稿一覧を取得
      $timelines = Post::whereIn('user_id', $following_ids)->get();
    return view('follows.followList',[
      'list' => $list,
      'timelines' => $timelines
    ]);
    }

    public function followerList(Post $post, Follow $follow, user $user){
      //ログインユーザーのidを取得
      $user = auth()->user();
      //ログインユーザーのリレーション先のqueryを取得
      $followed_ids = $user->followers()->pluck('following_id');
      //フォロワーのアイコン一覧を取得
      $list = User::whereIn('id',$followed_ids)->get();
      //フォロワーの投稿一覧を取得
      $timelines = Post::whereIn('user_id', $followed_ids)->get();
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
