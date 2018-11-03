<?php

Route::get('/','FrontEndController@index')->name('index');
Route::get('/blogs','FrontEndController@blogs')->name('blogs');
Route::get('/selected/blogs','FrontEndController@selected_posts')->name('selected.posts');
Route::get('/category', 'FrontEndController@bolgCategoryView')->name('category');
Route::get('/blog/category/{cat_id}', 'FrontEndController@category_wise_blog')->name('blog.category');
Route::get('/singel/{id}','FrontEndController@singelBlog')->name('blog');
Route::get('/profile/{id}/{type}','FrontEndController@profile')->name('profile');

Route::get('/like/blogs', 'FrontEndController@mostlikeAllBlogs')->name('like.blogs');
Auth::routes();
Route::get('auth/{provider}', 'Auth\LoginController@redirectToProvider');
Route::get('auth/{provider}/callback', 'Auth\LoginController@handleProviderCallback');

Route::prefix('user')->group(function(){
    Route::post('register', 'Auth\RegisterController@shopRegister');
    Route::get('confirmation/{token}', 'Auth\RegisterController@confirmation')->name('confirmation');
	Route::get('logout', 'Auth\LoginController@logout')->name('logout');

	Route::get('/home', 'HomeController@index')->name('user.dashboard');
});
Route::group([ 'prefix' => 'user' ,'middleware'=>['auth:web']], function() {
	Route::post('comment','CommentController@comment')->name('comment');
	Route::post('reply','CommentController@reply')->name('reply');

	Route::get('like/{post_id}/{action}/','FrontEndController@like_dislike')->name('like');
	
	Route::prefix('blog')->name('blog.')->group(function(){
		Route::get('/', 'PostController@userIndex')->name('index');
		Route::get('/create', 'PostController@userCreate')->name('create');
		Route::post('/store', 'PostController@store')->name('store');
		Route::get('/{id}', 'PostController@userView')->name('view');
		Route::get('/edit/{id}', 'PostController@userEdit')->name('edit');
		Route::post('/update', 'PostController@update')->name('update');
		Route::get('/delete/{id}', 'PostController@destroy')->name('destroy');
	});

	Route::prefix('account/')->group(function(){
		Route::get('setting/', 'SettingController@userAccountSetting')->name('user.accountSetting');
		Route::get('fullName/{fullName}', 'SettingController@user_fullName');
		Route::post('/avater', 'SettingController@user_avater')->name('user.avater');
		Route::get('phoneNo/{phoneNo}', 'SettingController@user_phoneNo');
		Route::post('/change_email', 'SettingController@user_change_email');
		Route::post('/bio_status', 'SettingController@user_bio_status');
		Route::post('/password/change', 'SettingController@user_password_change');
		
	});

});

Route::prefix('admin')->name('admin.')->group(function(){
    Route::get('/login', 'Auth\AdminLoginController@showloginform')->name('login');
    Route::post('/login', 'Auth\AdminLoginController@login')->name('login');
    Route::get('/home', 'AdminController@index')->name('dashboard');
    Route::get('/logout', 'Auth\AdminLoginController@logout')->name('logout');
});

Route::group([ 'prefix' => 'admin' ,'middleware'=>['auth:admin']], function() {

	Route::prefix('category')->name('category.')->group(function(){
		Route::get('/', 'CategoryController@index')->name('index');
		Route::post('/store', 'CategoryController@store')->name('store');
		Route::post('/update', 'CategoryController@update')->name('update');
		Route::get('/delete/{id}', 'CategoryController@destroy')->name('destroy');
	});

	Route::prefix('post')->name('post.')->group(function(){
		Route::get('/', 'PostController@index')->name('index');
		Route::get('/create', 'PostController@create')->name('create');
		Route::post('/store', 'PostController@store')->name('store');
		Route::get('/{id}', 'PostController@view')->name('view');
		Route::get('/edit/{id}', 'PostController@edit')->name('edit');
		Route::post('/update', 'PostController@update')->name('update');
		Route::post('/selected/action', 'PostController@selected_action')->name('selected.action');
		Route::get('/delete/{id}', 'PostController@destroy')->name('destroy');
	});

	Route::prefix('user')->name('user.')->group(function(){
		Route::get('/', 'UserController@index')->name('index');
		Route::get('/{id}', 'UserController@view')->name('view');
	});

	Route::prefix('site/')->group(function(){
		Route::get('/setting/', 'SettingController@siteSetting')->name('siteSetting');
		Route::get('/siteName/{siteName}', 'SettingController@siteName');
		Route::get('/phoneNo/{phoneNo}', 'SettingController@phoneNo');
		Route::post('/logo', 'SettingController@siteLogo')->name('siteLogo');
		Route::post('/aboutUs', 'SettingController@aboutUs');
		Route::post('/address', 'SettingController@address');
		Route::get('/email/{email}', 'SettingController@email');
		Route::post('/facebook/', 'SettingController@facebookLink');
		Route::post('/twitter/', 'SettingController@twitterLink');
		Route::post('/instagram/', 'SettingController@instagramLink');

		
	});

	Route::prefix('account/')->group(function(){
		Route::get('setting/', 'SettingController@accountSetting')->name('accountSetting');
		Route::get('fullName/{fullName}', 'SettingController@fullName');
		Route::post('/avater', 'SettingController@avater')->name('avater');
		Route::get('phoneNo/{phoneNo}', 'SettingController@admin_phoneNo');
		Route::post('/change_email', 'SettingController@change_email');
		Route::post('/bio_status', 'SettingController@bio_status');
		Route::post('/password/change', 'SettingController@adminPasswordChange');
	});	
});