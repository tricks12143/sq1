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
    return view('home');
});

Route::get('/dashboard', function () {
    return view('dashboard.home');
});
Route::get('/admin', function () {
    return view('admin.home');
});

Route::get('/blog', function () {
    return view('admin.blog');
});

Route::get('/createblog', function () {
    return view('admin.createblog');
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/createticket', 'TicketController@createticket');

Route::get('/getticket', 'TicketController@getticket');

Route::get('/gettotalhrticket', 'TicketController@gettotalhrticket');

Route::get('/gettotalinticket', 'TicketController@gettotalinticket');

Route::get('/getlogticket', 'TicketController@getlogticket');

Route::post('/insertblog', 'blogcontroller@insertblog');

Route::get('/getblogs', 'blogcontroller@getblogs');

Route::get('/editblog/{id}', 'blogcontroller@editblogs');

Route::post('/modifyblog', 'blogcontroller@modifyblog');

Route::get('/getthumbblogs', 'blogcontroller@getthumbblogs');