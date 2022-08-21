<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\User;
use App\Post;
use App\Follow;

class PostsController extends Controller
{
    //indexメソッド
    public function index(Request $request){
      $list = Post::with('user')->get();
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
   public function show()
   {
     // Postモデル経由でpostsテーブルのレコードを取得
     $posts = Post::get();
     return view('followList.blade', compact('posts'));
   }
}
