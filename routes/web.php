<?php
Route::get('/home', function(){
    if(Auth::check())
        return redirect(route('profile'));

});

Route::get('profile', 'UsersController@show')->name('profile');
Route::get('/', 'PagesController@home')->name('home');
Route::get('working', 'PagesController@working')->name('working');
Route::resource('faqs', 'FaqsController');
Route::resource('users', 'UsersController');
Route::get('members/{param?}', 'UsersController@index');
Route::resource('categories', 'CategoryController');
Route::resource('profiles', 'UserInfoController');


Route::resource('payment', 'PaymentController');

Route::resource('orders', 'OrderController');
Auth::routes();


function insertRecords(){
	$file = fopen('cats.txt', 'r');

	// while(!feof($file)) {
	// 	$line = fgets($file);
	// 	App\Category::create(['name'=>$line]);
	// }
}

Route::get('test', function(){
	insertRecords();
});