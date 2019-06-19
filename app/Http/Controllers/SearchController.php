<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class SearchController extends Controller
{
    
    public function index()
    {
        $data['posts'] = Post::latest()->get();
        return view('welcome',$data);
    }

    public function search(Request $request)
    {
    
        $cat = $request->cat;
        $tag = $request->tag;
        $post = $request->post;
        if($cat == "" && $tag == "" && $post == ""){
            $q = Post::latest();
        }
        else if($cat != "" && $tag != "" && $post != "")
        {
            $q = Post::where('title', 'LIKE', '%'.$post.'%')
            ->orWhereHas('categories', function($query) use ($cat){
                return $query->where('cat_name', 'LIKE', '%'.$cat.'%');
            })->orWhereHas('tag', function($query) use ($tag){
                return $query->where('tag_name', 'LIKE', '%'.$tag.'%');
            });   
        }
        else if($cat != "" && $tag != "" )
        {
            $q = Post::whereHas('categories', function($query) use ($cat){
                return $query->where('cat_name', 'LIKE', '%'.$cat.'%');
            })->orWhereHas('tag', function($query) use ($tag){
                return $query->where('tag_name', 'LIKE', '%'.$tag.'%');
            });   
        }

        else if($cat != "" && $post != "" )
        {
            $q = Post::where('title', 'LIKE', '%'.$post.'%')
            ->orWhereHas('categories', function($query) use ($cat){
                return $query->where('cat_name', 'LIKE', '%'.$cat.'%');
            });   
        }

        else if($tag != "" && $post != "" )
        {
            $q = Post::where('title', 'LIKE', '%'.$post.'%')
            ->orWhereHas('tag', function($query) use ($tag){
                return $query->where('tag_name', 'LIKE', '%'.$tag.'%');
            });   
        }
        else if($cat != "")
        {
            $q = Post::whereHas('categories', function($query) use ($cat){
                return $query->where('cat_name', 'LIKE', '%'.$cat.'%');
            });           
        }   
        else if($tag != "")
        {
            $q = Post::whereHas('tag', function($query) use ($tag){
                return $query->where('tag_name', 'LIKE', '%'.$tag.'%');
            });   
        }

        else if($post != "")
        {
            $q = Post::where('title', 'LIKE', '%'.$post.'%')
            ->orWhere('body', 'LIKE', '%'.$post.'%'); 
        }
        $data['posts'] =  $q->get();

        return view('welcome',$data);
    }
}
