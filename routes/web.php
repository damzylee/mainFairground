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

Route::get('/', function () {
    $companiess = App\Company::paginate(8);
    $sectors = App\Sectors::orderBy('id', 'desc')->paginate(8);

    return view('welcome', compact('companiess', 'sectors'));
});

Auth::routes();

Route::get('/admin', 'HomeController@admin')->middleware('admin');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/{user}', 'HomeController@show');
Route::get('/{user}/edit', 'HomeController@edit');
Route::patch('/{user}', 'HomeController@update');
Route::delete('/{user}', 'HomeController@destroy');
Route::post('/search', 'HomeController@search')->name('search');

Route::resource('/subscription', 'SubscriptionController');
Route::resource('/subscribe', 'SubscribeController');
Route::resource('/sector', 'SectorsController');
Route::resource('/company', 'CompanyController');
Route::get('/delete', 'CompanyController@deleteCompany');
Route::resource('/service', 'ServiceController');
Route::resource('/review', 'ReviewController');
Route::post('/reviewCom', 'ReviewController@companyPost');
Route::get('/reviewCom/create', 'ReviewController@companyPostView');
Route::resource('/request', 'MakeRequestController');
Route::get('/requestAll/{company}', 'MakeRequestController@showAll');
Route::resource('/comment', 'CommentController');
Route::post('/commentrequest', 'CommentController@storeRequest');
Route::resource('/like', 'LikeController');

// Route::get('/','ContactFormController@create');
Route::post('/contact','ContactFormController@store');

