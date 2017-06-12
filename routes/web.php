<?php

Route::get('/',function (){
  return view('welcome');
});

Route::get('/tasks', 'TasksController@index');

Route::get('/tasks/{task}', 'TasksController@show');
//aq id-is magivrad tu klasis saxels mivcemt controllershi shegvidzlia funqcias gadavcet ara id aramed mtlianad klasii tavisi saxelit ixile BlogsController-shi show funqcia

Route::get('/posts','PostsController@index');

Route::get('/posts/create','PostsController@create')->middleware('auth');

Route::post('/posts','PostsController@store')->middleware('auth');

Route::get('/posts/{post}','PostsController@show');

Route::get('/posts/tags/{tag}','PostsController@tags');

Route::post('/comment/{post}','CommentController@comment')->middleware('auth');

//Route::resource('/giorgi','giorgi'); resorsis kontroleri

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
