<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Post;
use App\Http\Requests\RegisterFormRequest;

class UsersController extends Controller
{
    //
    public function profile(){
        return view('users.profile');
    }

    public function search(Request $request){
      $user = \DB::table('users')->get(); // usersの全てのデータを取得(Model通さずに)
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

    //プロフィール編集機能

    public function profileUpdate(RegisterFormRequest $request){ //Request→RegisterFormRequest
      $user = Auth::user();
      $user->username = $request->name;
      $user->mail = $request->mail;
      $user->password = $request->password;
      $user->password = bcrypt($request->password);
      $user->bio = $request->bio;
      if(!empty($user->images)){
      // name属性が'images'のinputタグをファイル形式に、画像をpublicに保存
      $images = $request->file('images')->store('public');
      // 上記処理にて保存した画像に名前を付け、userテーブルのthumbnailカラムに、格納
      $user->images = basename($images);
      $user->save();
    }
      $user->save();
      return redirect('top');
    }

    //相手のプロフィール


    public function othersprofile($user_id){

      $user = User::find($user_id);
      $posts = $user->posts()->get();

      //$images = \DB::table('users')->where('id',$id)->get();

      //$list = \DB::table('posts')
      //->join('users','posts.user_id','=','user_id')
      //->where('user_id', $id)
      //->orderBy('posts.created_at','desc') //並び替え
      //->select('posts.*','posts.user_id','users.username','users.images')
      //->find();


      return view('users.othersprofile',[
        'user'=> $user,
        'posts'=> $posts
      ]);
    }
}
