<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UsersController extends Controller
{
    //
    public function profile(){
        return view('users.profile');
    }
    public function search(Request $request){
      $user = \DB::table('users')->get();
      $username = $request->username;
      if (!empty($username)) {
        $user = User::where('username','like',"%$username%")->get();// code...
        $request->session()->put('username', $username);
      }else{
        \Session::remove('username');
      }
        return view('users.search',['username'=>$username,'user'=>$user]);
    }
    // ユーザーフォロー
    public function follow(user $user,$id){ //フォロー
      $user = User::find($id);//var_dump($user);
      $follower = auth()->user(); //フォローしてるか
      $is_following = $follower->isFollowing($user->id);
      if(!$is_following){
        $follower->follow($user->id);
            return back(); // フォローしていなければフォローする
      }
    }
    // ユーザーフォロー解除
    public function unfollow(user $user,$id){ //フォロー解除
      $user = User::find($id);//var_dump($user);
      $follower = auth()->user(); //フォローしてるか
      $is_following = $follower->isFollowing($user->id);
      if($is_following){
        $follower->unfollow($user->id);
        return back(); // フォローしていなければフォローする
      }
    }

    //

}
