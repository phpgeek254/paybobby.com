<?php

use App\Order;
use Illuminate\Http\Request;

Route::get('/home', function(){
    if(Auth::check())
        return redirect(route('profile'));

});


Route::get('profile', 'UsersController@show')->name('profile');

Route::get('/', 'PagesController@home')->name('home');
Route::get('/about', 'PagesController@about')->name('about');
Route::get('/contact', 'PagesController@contact')->name('contact');


Route::get('working', 'PagesController@working')->name('working');
Route::resource('faqs', 'FaqsController');
Route::resource('users', 'UsersController');
Route::get('members/{param?}', 'UsersController@index');
Route::resource('categories', 'CategoryController');
Route::resource('profiles', 'UserInfoController');

Route::get('available-jobs/{id?}', function($id = null){
if ( $id != null ){
    $orders = Order::where([
        ['status'=>'new'],
        ['category_id'=>$id]
        ])->get();
} else {
    $orders = Order::where('status', 'new')->get();
}
    return view('orders.available', compact('orders'));
});

Route::post('take-job', function(Request $request){
        $order = Order::findOrFail($request->order_id);
        $order->status = 'taken';
        $order->employee_id = Auth::id();
        $order->save();
        return redirect('orders/');
})->name('take-job');


Route::post('submit_job', function(Request $request) {
if ($request->hasFile('file')){
    $file_name = uniqid().$request->file->getClientOriginalName();
    $destination = 'submissions/';



    $order = Order::findOrFail($request->order_id);
    $order->file = $destination.$file_name;
    $request->file->move($destination, $file_name);
    $order->status = 'completed';
    $order->save();
    return redirect()->back()->withMessage('Submission Successful');
} else {
    return redirect()->back()->withMessage('Invalid File');
}
})->name('submit_job');


Route::get('/pay', 'PaypalController@payWithPaypal')->name('pay_with_paypal');
Route::post('/pay', 'PaypalController@paymentWithPaypal')->name('payment_with_paypal');
Route::get('/payment-status', 'PaypalController@paymentStatus')->name('payment_status');

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