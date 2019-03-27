<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Category;
use App\User;
use Auth;
use Image;
use File;

class PostController extends Controller
{
   public function all_post()
   {
   	    $posts = Post::with('user','category')->orderBy('id','desc')->get();
   	    //$posts = Post::where('id',2)->with('user','category')->first();
        return response()->json([
            'posts' =>$posts
        ],200);
   }

   public function add_post(Request $request)
   {
   	   $position=strpos($request->photo, ';');
   	   $sub=substr($request->photo,0,$position);
   	   $ex=explode('/',$sub)[1];
   
       $post = new Post();
       $post->title = $request->title;
       $post->description = $request->description;
       $post->cat_id = $request->cat_id;
       //$post->user_id = Auth::user()->id;
       if (Auth::guard('web')->check()){
		    $post->user_id = Auth::user()->id;
	   }

       $img = Image::make($request->photo)->resize(300, 200);
       $uploadpath=public_path()."/images/admin/post/";
       $name=time().".".$ex;
       $img->save($uploadpath.$name);



       $post->photo=$name;
       $post->save();
       //return $request->all(); 


   }

   public function delete_post($id)
   {
       $post=Post::find($id);
       if (File::exists('images/admin/post/'.$post->photo)) {  //this line is value less..
              File::delete('images/admin/post/'.$post->photo);
       }
       $post->delete();
   }
   
   public function edit_post($id)
   {
       //$posts = Post::with('category')->orderBy('id','desc')->get();
   	    //$posts = Post::where('id',2)->with('user','category')->first();

   	    $posts=Post::find($id);
        return response()->json([
            'posts' =>$posts
        ],200);
       
   }
    
   public function update_post(Request $request,$id)
   {
       //$posts = Post::with('category')->orderBy('id','desc')->get();
   	    //$posts = Post::where('id',2)->with('user','category')->first();
   	   $post=Post::find($id);

       /*if (File::exists('images/admin/post/'.$post->photo)) {  //this line is value less..
              File::delete('images/admin/post/'.$post->photo);
       }
   	   $position=strpos($request->photo, ';');
   	   $sub=substr($request->photo,0,$position);
   	   $ex=explode('/',$sub)[1];*/
   	   
   	   if($request->photo!=$post->photo){
             if (File::exists('images/admin/post/'.$post->photo)) {  //this line is value less..
                  File::delete('images/admin/post/'.$post->photo);
		      }
		   	  $position=strpos($request->photo, ';');
		   	  $sub=substr($request->photo,0,$position);
		   	  $ex=explode('/',$sub)[1];

		   	  $img = Image::make($request->photo)->resize(300, 200);
		      $uploadpath=public_path()."/images/admin/post/";
		      $name=time().".".$ex;
		      $img->save($uploadpath.$name);

		      $post->photo=$name;


   	   }else{
   	   	    //$name=$post->photo;
   	   	    $post->photo=$request->photo;

   	   }

   	   

       $post->title = $request->title;
       $post->description = $request->description;
       $post->cat_id = $request->cat_id;


      /* $img = Image::make($request->photo)->resize(300, 200);
       $uploadpath=public_path()."/images/admin/post/";
       $name=time().".".$ex;
       $img->save($uploadpath.$name); */

       
       $post->save();


        
       
   }
   


}
