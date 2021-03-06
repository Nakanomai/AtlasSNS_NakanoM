<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class PostsController extends Controller
{
    //
    public function index(){
      $list = \DB::table('posts')->get();
        return view('posts.index',['list'=>$list]);
    }

    //createメソッド
    public function create(Request $request){
     $user_id = auth()->id();
     $post = $request->input('newPost');
     \DB::table('posts')->insert([
         'post' => $post,
         'user_id' => $user_id]);
     return redirect('top');
    }
    //deleteメソッド
    public function delete($id)
    {
        \DB::table('posts')
            ->where('id', $id)
            ->delete();

        return redirect('top');
    }
    //updateメソッド
    public function update(Request $request)
   {
       $id = $request->input('id');
       $up_post = $request->input('upPost');
       \DB::table('posts')
           ->where('id', $id)
           ->update(
               ['post' => $up_post]
           );

       return redirect('top');
   }

   //フォローしているユーザーのみの情報を取得
   public function show(){
　 // フォローしているユーザーのidを取得
  　　 $following_id = Auth::user()->follows()->pluck(' ① ');

　 // フォローしているユーザーのidを元に投稿内容を取得
　　　 $posts = Post::with('user')->whereIn(' ② ', $following_id)->get();

　　  return view('yyyy', compact(‘posts’));
　　}
}
