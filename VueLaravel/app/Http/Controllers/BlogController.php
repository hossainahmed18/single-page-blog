<?php

namespace App\Http\Controllers;

use App\Post;
use App\Category;

use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function get_blog_post()
    {
    	$posts = Post::with('user','category')->orderBy('id','desc')->get();
   	    //$posts = Post::where('id',2)->with('user','category')->first();
        return response()->json([
            'posts' =>$posts
        ],200);
    }
    
    public function singlePost($id)
    {
    	//$posts = Post::with('user','category')->orderBy('id','desc')->get();
   	    $post = Post::where('id',$id)->with('user','category')->first();
        return response()->json([
            'post' =>$post
        ],200);
    }

    public function userCategories()
    {
    	$usercategories = Category::all();
   	    //$posts = Post::where('id',2)->with('user','category')->first();
        return response()->json([
            'usercategories' =>$usercategories
        ],200);
    }

    public function CategoryPost($categoryId)
    {
    	
   	    $categorypost = Post::where('cat_id',$categoryId)->with('user','category')->get();
        return response()->json([
            'categorypost' =>$categorypost
        ],200);
    }

    public function SearchPost()
    {
    	$search=\Request::get('s');


   	    if($search==null){
   	    	$posts = Post::with('user','category')->orderBy('id','desc')->get();
   	    //$posts = Post::where('id',2)->with('user','category')->first();
	        return response()->json([
	            'searchpost' =>$posts
	        ],200);

   	    }else{
   	    	$searchpost = Post::with('user','category')
   	                        ->where('title','LIKE',"%$search%")
   	                        ->OrWhere('description','LIKE',"%$search%")
   	                        ->get();

	        return response()->json([
	            'searchpost' =>$searchpost
	        ],200);
   	    }

    }

    public function LatestPost()
    {
    	$posts = Post::with('user','category')->orderBy('id','desc')->limit(5)->get();
   	    //$posts = Post::where('id',2)->with('user','category')->first();
        return response()->json([
            'latestpost' =>$posts
        ],200);
    }

    public function checkboxDelete($ids)
    {
      /*$posts = Post::with('user','category')->orderBy('id','desc')->limit(5)->get();
        //$posts = Post::where('id',2)->with('user','category')->first();
        return response()->json([
            'latestpost' =>$posts
        ],200);

        */
        $all_id=explode(',', $ids);
        foreach ($all_id as $id) {
            $category=Category::find($id);
            $category->delete();
        }
        return response()->json([
            'ids' =>$ids
        ],200);
    }

    


}
