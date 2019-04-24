<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Category;
class IndexController extends Controller
{
    public function IndexSite() {

        $ShowCat = Category::orderBy('id', 'asc')->where('cat_status',1)->get();

        $ShowPost = DB::table('posts')
        ->leftjoin('categories', 'categories.id', '=', 'posts.cat_id')
        ->select('posts.*', 'categories.cat_name as cat_name','categories.slogen_cat as slogen_cat')
        ->where('posts.post_active',1)
        ->orderBy('posts.id', 'desc')
        ->get();
        
        return view('frontend.layouts.home',compact('ShowCat','ShowPost'));
    }

    public function PostByCat($slogen_cat){

        $cat = Category::where('slogen_cat',$slogen_cat)->first();

        $ShowPostByCat = DB::table('posts')
        ->leftjoin('categories', 'categories.id', '=', 'posts.cat_id')
        ->select('posts.*', 'categories.cat_name as cat_name','categories.slogen_cat as slogen_cat')
        ->where('posts.cat_id',$cat->id)
        ->where('posts.post_active',1)
        ->orderBy('posts.id', 'desc')
        ->paginate(6);

        $Category = DB::table('categories')
        ->leftjoin('posts', 'posts.cat_id', '=','categories.id')
        ->select('categories.*',DB::raw('(select COUNT(id) from  posts where cat_id = categories.id) as post_count'))
        ->where('categories.cat_status',1)
        ->orderBy('categories.id', 'asc')
        ->get();

        return view('frontend.Post.bycat',compact('ShowPostByCat','cat','Category'));
    }

    public function ShowPost($slogen_post){

        $ShowPostsingle = DB::table('posts')
        ->leftjoin('categories', 'categories.id', '=', 'posts.cat_id')
        ->select('posts.*', 'categories.cat_name as cat_name','categories.slogen_cat as slogen_cat')
        ->where('posts.post_slogen',$slogen_post)
        ->where('posts.post_active',1)
        ->first();

        return view('frontend.Post.single',compact('ShowPostsingle'));
    }
}
