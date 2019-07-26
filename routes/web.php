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
Route::get('/post/{id}}', 'PostController@show')->name('post.show');
Route::delete('/post/{id}}', 'PostController@delete')->name('post.delete');
Route::get('/post/{id}}/edit', 'PostController@edit')->name('post.edit');
Route::put('/post/{id}}', 'PostController@update')->name('post.update');

Route::get('/task', 'TaskController@index')->name('task.index');
Route::post('/task', 'TaskController@store')->name('task.store');
Route::delete('/task/{id}', 'TaskController@destroy')->name('task.delete');
Route::put('/task/{id}', 'TaskController@update')->name('task.update');
Route::get('/task/{id}', 'TaskController@show')->name('task.show');