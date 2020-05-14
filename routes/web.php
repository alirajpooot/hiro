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

//frontend routes ==============================================================

Route::get('/', ['uses' => 'HomeController@index', 'as' => 'homepage']);
Route::get('/login', ['uses' => 'HomeController@login', 'as' => 'login']);
Auth::routes();
Route::get('/companies/{alpah?}', ['uses' => 'HomeController@CompaniesByAlphabet', 'as' => 'companies.alphabet']);

//admin routes==================================

//non auth routes
Route::prefix('admin')->namespace('admin')->group(function () {
    Route::get('/', ['as' => 'admin.login','uses'=>'AuthController@Login']);
    Route::post('/dologin', 'AuthController@DoLogin');
    });

//auth routs
Route::group(['prefix' => 'admin', 'namespace'=>'admin', 'middleware'=>'auth'], function () {
Route::get('/dashboard', 'HomeController@index')->name('admin.dashbaord');
Route::get('/logout',['as' => 'logout', 'uses' => 'HomeController@Logout']);

//sliders routes
Route::get('/sliders',['as'=> 'sliders', 'uses'=>'HomeController@Sliders']);
Route::post('/sliderspost',['as'=> 'sliderspost', 'uses'=>'HomeController@SlidersPost']);
Route::get('/sliderdelete/{id}',['as'=> 'sliderdelete', 'uses'=>'HomeController@SliderDel']);
Route::post('/slidersort',['as'=> 'slidersort', 'uses'=>'HomeController@SliderSort']);

//categories section routes
Route::get('/categories',['as'=> 'news.categories', 'uses'=>'HomeController@NewsCat']);
Route::post('/addnewscat',['as'=> 'news.add.cat', 'uses'=>'HomeController@addNewsCat']);
Route::get('/categories/{id}',['as'=> 'edit.news.categories', 'uses'=>'HomeController@editNewsCat']);
Route::post('/editnewscat',['as'=> 'news.edit.cat', 'uses'=>'HomeController@editNewsCatPost']);
Route::get('/deletenewscat/{id}',['as'=> 'delete.news.categories', 'uses'=>'HomeController@deleteNewsCatPost']);

// locations routes
Route::get('/locations',['as'=> 'locations', 'uses'=>'HomeController@Locations']);
Route::post('/addlocation',['as'=> 'add.loc', 'uses'=>'HomeController@addLocation']);
Route::get('/locations/{id}',['as'=> 'edit.locations', 'uses'=>'HomeController@editLoc']);
Route::post('/editlocpost',['as'=> 'edit.loc', 'uses'=>'HomeController@editLocPost']);
Route::get('/deleteloc/{id}',['as'=> 'delete.location', 'uses'=>'HomeController@deleteLocPost']);

//companies routes
Route::get('/companies/add',['as'=> 'companies.add', 'uses'=>'CompanyController@CompanyAdd']);
Route::post('/companies/addpost',['as'=> 'companies.addpost', 'uses'=>'CompanyController@CompanyAddPost']);
Route::get('/companies/list',['as'=> 'companies.list', 'uses'=>'CompanyController@CompanyList']);
Route::get('/companies/edit/{id}',['as'=> 'companies.edit', 'uses'=>'CompanyController@CompanyEdit']);
Route::post('/companies/editpost/',['as'=> 'companies.editpost', 'uses'=>'CompanyController@CompanyEditPost']);
Route::get('/companies/deactivate/{id}',['as'=> 'companies.deactivate', 'uses'=>'CompanyController@CompanyDeactivate']);
Route::get('/companies/activate/{id}',['as'=> 'companies.activate', 'uses'=>'CompanyController@CompanyAactivate']);

//news and poromotions
Route::get('/companies/details/{id}',['as'=> 'companies.details', 'uses'=>'CompanyController@getCompanyDetails']);
Route::post('/companies/addnewspost',['as'=> 'companies.addnewspost', 'uses'=>'CompanyController@CompanyAddNewsPost']);
Route::get('/companies/details/edit/{id}',['as'=> 'companies.details.edit', 'uses'=>'CompanyController@getCompanyDetailsEdit']);
Route::post('/companies/details/editpost',['as'=> 'companies.details.editpost', 'uses'=>'CompanyController@getCompanyDetailsEditPost']);
Route::get('/companies/details/addeactive/{id}',['as'=> 'companies.details.addeactive', 'uses'=>'CompanyController@getCompanyDetailsAdDeactive']);
Route::get('/companies/details/adactive/{id}',['as'=> 'companies.details.adactive', 'uses'=>'CompanyController@getCompanyDetailsAdactive']);
Route::get('/companies/details/addelete/{id}',['as'=> 'companies.details.addelete', 'uses'=>'CompanyController@getCompanyDetailsAddelete']);

// business nature routes

Route::get('/businessnature',['as'=> 'businessnature', 'uses'=> 'HomeController@businessNature']);
Route::post('/addbusinessnature',['as'=> 'addbusinessnature', 'uses'=> 'HomeController@businessNatureAdd']);
Route::get('/deletebusinessnature/{id}',['as'=> 'deletebusinessnature', 'uses'=> 'HomeController@businessNatureDelete']);
Route::post('/editbusinessnature',['as'=> 'editbusinessnature', 'uses'=> 'HomeController@businessNatureEdit']);












///end =========
});
