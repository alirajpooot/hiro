<?php

use Illuminate\Support\Facades\Route;

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

//frontend routes auth routes ==============================================================

Auth::routes(['verify' => true]);
Route::get('/home', ['uses' => 'HomeController@index', 'as' => 'home']);
Route::get('/logout', ['uses' => 'HomeController@logout', 'as' => 'logout']);
Route::get('/home/services', ['uses' => 'HomeController@Services', 'as' => 'home.services']);
Route::get('/home/links', ['uses' => 'HomeController@Links', 'as' => 'home.links']);
Route::get('/home/password', ['uses' => 'HomeController@Password', 'as' => 'home.password']);

//frontend non auth routes
Route::get('/', ['uses' => 'MainController@index', 'as' => 'main.page']);










//admin routes==================================

//non auth routes
Route::prefix('admin')->namespace('admin')->group(function () {
    Route::get('/', ['as' => 'admin.login','uses'=>'AuthController@Login']);
    Route::post('/dologin', 'AuthController@DoLogin');
    });

//auth routs
Route::group(['prefix' => 'admin', 'namespace'=>'admin', 'middleware'=>'auth'], function () {
Route::get('/dashboard', 'HomeController@index')->name('admin.dashbaord');
Route::get('/adminlogout',['as' => 'admin.logout', 'uses' => 'HomeController@Logout']);

//categories section routes
Route::get('/categories',['as'=> 'news.categories', 'uses'=>'HomeController@NewsCat']);
Route::post('/addnewscat',['as'=> 'news.add.cat', 'uses'=>'HomeController@addNewsCat']);
Route::get('/categories/{id}',['as'=> 'edit.news.categories', 'uses'=>'HomeController@editNewsCat']);
Route::post('/editnewscat',['as'=> 'news.edit.cat', 'uses'=>'HomeController@editNewsCatPost']);
Route::get('/deletenewscat/{id}',['as'=> 'delete.news.categories', 'uses'=>'HomeController@deleteNewsCatPost']);

//Services section

Route::get('/services',['as'=> 'list.services', 'uses'=>'HomeController@Services']);
Route::post('/servicespost',['as'=> 'add.services', 'uses'=>'HomeController@addServicePost']);
Route::get('/services/{id}',['as'=> 'edit.services', 'uses'=>'HomeController@editServices']);
Route::post('/editservicepost',['as'=> 'edit.servicepost', 'uses'=>'HomeController@editServicePost']);
Route::get('/deletservice/{id}',['as'=> 'delete.service', 'uses'=>'HomeController@deleteService']);


///end =========
});
