<?php
use App\Models\Post;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/post', function() {
    $models = Post::all();
    
    return view('post.index', [
        'models' => $models
    ]);
})->name('post.index');;

Route::get('/post/create', 'PostController@create')->name('post.create');
Route::post('/post/store', 'PostController@store')->name('post.store');
Route::get('/task', 'TaskController@index')->name('task.index');
Route::post('/task', 'TaskController@store')->name('task.store');
Route::delete('/task/{id}', 'TaskController@destroy')->name('task.delete');
Route::put('/task/{id}', 'TaskController@update')->name('task.update');