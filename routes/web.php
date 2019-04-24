<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::group(['prefix' => 'admin'], function () {
//======================= Admin Route====================//
Route::get('/', 'Admin\IndexController@Index');  

 //=======================Category\Route====================// 
 Route::get('/GetCategory', 'Admin\CategoryController@GetAllCat');
 Route::get('/AddNewCat', 'Admin\CategoryController@AddCat');
 Route::post('/AddNewCat', 'Admin\CategoryController@AddCat');
 Route::get('/EditCat', 'Admin\CategoryController@EditCat');
 Route::post('/EditCat', 'Admin\CategoryController@EditCat');
 Route::get('/deletesomecat/{id}', 'Admin\CategoryController@DeleteOneCat');
 Route::post('/multicatdelete', 'Admin\CategoryController@MultiCatDelete');
 Route::get('/activecat/{id}', 'Admin\CategoryController@CatActive');
 Route::get('/unactivecat/{id}', 'Admin\CategoryController@CatUnActive');

 //=======================Post\Route====================// 
 Route::get('/ShowPost', 'Admin\PostController@GetPost');
 Route::get('/Addpost', 'Admin\PostController@AddPost');
 Route::post('/Addpost', 'Admin\PostController@AddPost');
 Route::get('/Editpost/{id}', 'Admin\PostController@EditPost');
 Route::post('/Editpost/{id}', 'Admin\PostController@EditPost');
 Route::get('/DeletePost/{id}', 'Admin\PostController@DeletePost');
 Route::post('/multitpostdelete', 'Admin\PostController@MultiDeletePost');
 Route::get('/activePost/{id}', 'Admin\PostController@PostActive');
 Route::get('/unactivePost/{id}', 'Admin\PostController@PostUnActive');

});

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', 'Frontend\IndexController@IndexSite');

 //=======================PostByCat\Route====================//
 Route::get('/PostBy/{slogen_cat}', 'Frontend\IndexController@PostByCat');

 //=======================ShowPost\Route====================//
 Route::get('/Details-Post/{slogen_post}', 'Frontend\IndexController@ShowPost');
