<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
use App\Category;
use App\Post;
class PostController extends Controller
{
    public function GetPost() { //show category
        $i = 1; 

        $AllPost = DB::table('posts')
                ->leftjoin('categories', 'categories.id', '=', 'posts.cat_id')
                ->select('posts.*', 'categories.cat_name as cat_name')
                ->orderBy('posts.id', 'desc')
                ->get();

        return view('backend.Post.index', compact('AllPost','i'));
    }

    public function AddPost(Request $request) { //create category

        if ($request->isMethod('post')) {
            $data = $request->all();
            $rules = [
                'post_title' => 'required|max:15',
                'post_note' => 'required|max:135',
                'post_desc' => 'required',
                'cat_id' => 'required',
            ];
            $messages = [
                'post_title.required' => 'العنوان  مطلوب ادخالة',
                'post_note.required' => 'الوصف  مطلوب ادخالة ',
                'post_desc.required' => 'الوصف  مطلوب ادخالة',
                'cat_id.required' => 'مطلوب أختيار القسم',
            ];
            $Validator = Validator::make($data, $rules, $messages);
            if ($Validator->fails()) {
                return redirect()->back()->withErrors($Validator)->withInput(Input::all());
            } else {
                try {
                $post = new Post();
                $post->post_title = $request->input('post_title');
                $post->post_slogen = Str::slug($request->input('post_title'),'-');
                $post->post_note = $request->input('post_note');
                $post->post_desc = $request->input('post_desc');
                $post->cat_id = $request->input('cat_id');

                $post->save();
                
                    Session::flash('success', 'تم الحفظ بنجاح');
                    return Redirect::back();
                } catch (\Exception $ex) {
                    Session::flash('error', 'لم يتم الحفظ');
                    return Redirect::back();
                }
            }
        }

        $AllCat = Category::orderBy('id', 'asc')->get();
        return view('backend.Post.add', compact('AllCat'));
    }

    public function EditPost($id, Request $request) { //update category

        if ($request->isMethod('post')) {
            $data = $request->all();
            $rules = [
                'post_title' => 'required|max:15',
                'post_note' => 'required|max:135',
                'post_desc' => 'required',
            ];
            $messages = [
                'post_title.required' => 'العنوان  مطلوب ادخالة',
                'post_note.required' => 'الوصف  مطلوب ادخالة ',
                'post_desc.required' => 'الوصف  مطلوب ادخالة',
            ];
            $Validator = Validator::make($data, $rules, $messages);
            if ($Validator->fails()) {
                return redirect()->back()->withErrors($Validator)->withInput(Input::all());
            } else {
                try {
                $post = Post::find($id);
                $post->post_title = $request->input('post_title');
                $post->post_slogen = Str::slug($request->input('post_title'),'-');
                $post->post_note = $request->input('post_note');
                $post->post_desc = $request->input('post_desc');
                $post->cat_id = $request->input('cat_id');
                $post->save();
                    Session::flash('success', 'تم الحفظ بنجاح');
                    return Redirect::back();
                } catch (\Exception $ex) {
                    Session::flash('error', 'لم يتم الحفظ');
                    return Redirect::back();
                }
            }
        }
        $post = Post::find($id);
        $AllCat = Category::orderBy('id', 'asc')->get();
        return view('backend.Post.edit', compact('AllCat', 'post'));
    }

    public function DeletePost($id) { //delete one category
        try {
            Post::find($id)->delete();
            Session::flash('success', 'تم الحذف بنجاح');
            return Redirect::back();
        } catch (\Exception $ex) {
            Session::flash('error', 'لم يتم الحذف');
            return Redirect::back();
        }
    }

    public function MultiDeletePost(Request $request) {  //delete multi category
        if ($request->input('multitpostdelete') == ""){
            Session::flash('error', 'لم يتم أختيار !');
            return Redirect::back();
        } else {
        try {
            Post::whereIn('id', $request->input('multitpostdelete'))->delete();
            Session::flash('success', 'تم الحذف بنجاح');
            return Redirect::back();
        } catch (\Exception $ex) {
            Session::flash('error', 'لم يتم الحذف');
            return Redirect::back();
        }
    }
}
public function PostActive($id) { //active category
    try {
        DB::table('posts')
                ->where('id', '=', $id)
                ->update(['post_active' => 1]);
        Session::flash('success', 'تم التفعيل بنجاح');
        return Redirect::back();
    } catch (\Exception $ex) {
        Session::flash('error', 'لم يتم التفعيل');
        return Redirect::back()->withInput(Input::all());
    }
}

public function PostUnActive($id) { //off active category
    try {

        DB::table('posts')
                ->where('id', '=', $id)
                ->update(['post_active' => 2]);
        Session::flash('success', 'تم الأيقاف بنجاح');
        return Redirect::back();
    } catch (\Exception $ex) {
        Session::flash('error', 'لم يتم الأيقاف');
        return Redirect::back()->withInput(Input::all());
    }
}
}
