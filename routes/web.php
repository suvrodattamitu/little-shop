<?php




Route::get('/','ProductController@getIndex')->name('index');
Route::get('/user/profile','UserController@getProfile')->name('profile');
Route::get('/add-to-cart/{id}','ProductController@getAddToCart')->name('addtocart');
Route::get('/remove-from-cart/{id}','ProductController@getRemoveFromCart')->name('removefromcart');
Route::get('/remove-all-cart/{id}','ProductController@getRemoveAllCart')->name('removeallcart');
Route::get('/shoppingcart','ProductController@getCart')->name('shoppingcart');

Route::get('/checkout',[
	'uses' =>'ProductController@getCheckout',
	'as' => 'checkout'
	])->middleware('auth');

Route::post('/checkout',[
	'users' => 'ProductController@postCheckout',
	'as' => 'checkout'
	])->middleware('auth');


Route::group(['prefix' => 'auth'],function(){

		Route::get('/register', 'Auth\RegisterController@showRegistrationForm')->name('register');
		Route::post('/register', 'Auth\RegisterController@register');

		Route::get('/login', 'Auth\LoginController@showLoginForm')->name('login');
		Route::post('/login', 'Auth\LoginController@login');

		Route::get('/logout', 'Auth\LoginController@logout')->name('logout');
	
});


