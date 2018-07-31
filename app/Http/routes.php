<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('welcome', function () {
    return view('welcome');
});


//Route::get('login1', function () {
//    return view('admin/index/login1');
//});
//Route::get('login2', function () {
//    return view('admin/index/login2');
//});
/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/
Route::group(['middleware' => ['web']], function () {
    
  Route::get('/login','Home\IndexController@login');
  Route::post('/user_login', 'Home\IndexController@user_login'); 
  Route::get('geterror','Home\IndexController@geterror'); 
  Route::get('shouye', 'Home\IndexController@shouye');
 
});

Route::group(['middleware' => ['web','checkother']], function () {
    Route::get('logout', 'Home\IndexController@logout');    
    Route::get('/', 'Home\IndexController@index');
    Route::get('/notice', 'Home\IndexController@notice');
    Route::get('/share', 'Home\IndexController@share');
    Route::get('/gyou', 'Home\IndexController@gyou');
    Route::get('/content/{id}', 'Home\IndexController@content');
    Route::get('/search', 'Home\IndexController@search');
    
});



Route::group(['middleware' => ['web','homelogin','checkother']], function () {
    Route::get('/user/news', 'Home\UserController@news');
    Route::get('/user/readed_news', 'Home\UserController@readed_news');
    Route::get('/user/article', 'Home\UserController@article');
    Route::post('user/set', 'Home\UserController@set');
    Route::any('user/thumb', 'Home\UserController@thumb');
    Route::post('user/move_thumb', 'Home\UserController@move_thumb');
    Route::post('user/setpsw', 'Home\UserController@setpsw');
    Route::post('article/set', 'Home\ArticleController@set');
    Route::post('setyidu', 'Home\UserController@setyidu');
    Route::post('comment', 'Home\ArticleController@comment');
    Route::post('recomment', 'Home\ArticleController@recomment');
    Route::post('/article/like', 'Home\ArticleController@like');
    Route::post('/article/delete', 'Home\ArticleController@delete');
    Route::post('/comment/like', 'Home\CommentController@like');
    Route::post('/comment/del', 'Home\CommentController@del');
    Route::resource('/user','Home\UserController');   
    Route::resource('/article', 'Home\ArticleController');
    });


//后台路由
Route::group(['middleware' => ['web']], function () {
   
    Route::any('ad_login', 'Admin\IndexController@login');
    Route::any('admin/user/thumb','Admin\UserController@thumb');
 
});


      

Route::group(['middleware' => ['web','logincheck'],'prefix' => 'admin'], function () {
    //
    Route::get('manage','Admin\IndexController@index' );
    Route::any('/logout', 'Admin\IndexController@logout');
    Route::any('ma_admin/check', 'Admin\AdminController@check');
    Route::post('ma_admin/delete','Admin\AdminController@delete');
    Route::get('ma_admin/info','Admin\AdminController@info');
    Route::any('ma_admin/modify','Admin\AdminController@modify');
    Route::post('ma_admin/set/{id}','Admin\AdminController@set');
    Route::post('ma_admin/is_stop','Admin\AdminController@is_stop');
    Route::post('article/delete','Admin\ArticleController@delete');
    Route::post('article/is_stop','Admin\ArticleController@is_stop');
    Route::get('article/notice','Admin\ArticleController@notice');
    Route::post('user/delete','Admin\UserController@delete');
    Route::post('user/is_stop','Admin\UserController@is_stop');
    Route::post('user/depart','Admin\UserController@depart');
    Route::post('user/set','Admin\UserController@set');
    
    Route::post('comment/delete','Admin\CommentController@delete');
    Route::any('comment/com_list','Admin\CommentController@com_list');
    Route::post('department/add','Admin\DepartmentController@add');
    Route::post('department/delete','Admin\DepartmentController@delete');
    Route::post('department/set','Admin\DepartmentController@set');
    Route::post('role/delete','Admin\RoleController@delete');
    Route::post('role/set','Admin\RoleController@set');
    Route::resource('role','Admin\RoleController');
    Route::resource('ma_admin','Admin\AdminController');
    Route::resource('comment','Admin\CommentController');
    Route::resource('article','Admin\ArticleController');
    Route::resource('user','Admin\UserController');
    Route::resource('department','Admin\DepartmentController');
    
    
//    Route::resource('user','Admin\UserController' );
 
    
});
