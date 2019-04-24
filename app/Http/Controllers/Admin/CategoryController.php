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
class CategoryController extends Controller
{
    public function GetAllCat() { //show category
        $i = 1;

        $AllCat = Category::orderBy('id', 'asc')->get();

        return view('backend.Category.index', compact('AllCat', 'i'));
    }

   
    public function AddCat(Request $request) { //create category
        if ($request->isMethod('post')) {
            
                $cat = new Category();
                $cat->cat_name = $request->input('cat_name');
                $cat->slogen_cat = Str::slug($request->input('cat_name'),'-');
                $cat->save();
                Session::flash('success', 'تم الحفظ بنجاح');
                return Redirect::back();
          
                Session::flash('error', 'لم يتم الحفظ');
                return Redirect::back();
            
        }
    }

    public function EditCat(Request $request) { //update category
        if ($request->isMethod('post')) {
            try {
                $cat = Category::find($request->input('id'));
                $cat->cat_name = $request->input('cat_name');
                $cat->slogen_cat = Str::slug($request->input('cat_name'),'-');
                $cat->save();
                Session::flash('success', 'تم الحفظ بنجاح');
                return Redirect::back();
            } catch (\Exception $ex) {
                Session::flash('error', 'لم يتم الحفظ');
                return Redirect::back();
            }
        }
    }

    public function DeleteOneCat($id) { //delete one category

        try {
            Category::find($id)->delete();
            Session::flash('success', 'تم الحذف بنجاح');
            return Redirect::back();
        } catch (\Exception $ex) {
            Session::flash('error', 'لم يتم الحذف');
            return Redirect::back();
        }
    }

    public function MultiCatDelete(Request $request) { //delete multi category
        if ($request->input('multicatdelete') == ""){
            Session::flash('error', 'لم يتم أختيار !');
            return Redirect::back();
        } else {
        try {
            Category::whereIn('id', $request->input('multicatdelete'))->delete();
            Session::flash('success', 'تم الحذف بنجاح');
            return Redirect::back();
        } catch (\Exception $ex) {
            Session::flash('error', 'لم يتم الحذف');
            return Redirect::back();
        }
    }
    }

    public function CatActive($id) { //active category
        try {

            DB::table('categories')
                    ->where('id', '=', $id)
                    ->update(['cat_status' => 1]);
            Session::flash('success', 'تم التفعيل بنجاح');
            return Redirect::back();
        } catch (\Exception $ex) {
            Session::flash('error', 'لم يتم التفعيل');
            return Redirect::back()->withInput(Input::all());
        }
    }

    public function CatUnActive($id) { //off active category
        try {

            DB::table('categories')
                    ->where('id', '=', $id)
                    ->update(['cat_status' => 2]);
            Session::flash('success', 'تم الأيقاف بنجاح');
            return Redirect::back();
        } catch (\Exception $ex) {
            Session::flash('error', 'لم يتم الأيقاف');
            return Redirect::back()->withInput(Input::all());
        }
    }
}