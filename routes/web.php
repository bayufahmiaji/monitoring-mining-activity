<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

// Route::get('/','HomesController@index');
Route::get('/news','HomesController@news');
Route::get('/company','HomesController@company');
Route::get('/profile','HomesController@profile');


Route::get('/login','authcontroller@index')->name('login');
Route::get('/logout','authcontroller@logout');
Route::get('/register','authcontroller@create');
Route::post('/postuser','authcontroller@store');
Route::post('/auth','authcontroller@login');

Route::group(['middleware' => 'auth'],function(){
Route::get('/','HomesController@home');
//admin
	//mail
	Route::get('/mail_inbox','MailController@inbox');
	Route::get('/mail_compose','MailController@compose');
	Route::get('/mail_sent','MailController@sent');
	Route::get('/mail/{mail}/delete','MailController@destroy');
	Route::get('/mail/{mail}/view','MailController@show');
	Route::post('/sendmail','MailController@store');
	Route::post('/sendmail2','MailController@stores');

	//user
	Route::get('/user','UsersController@index');
	Route::get('/user/add','UsersController@create');
	Route::get('/user/add','UsersController@create');
	Route::get('/user/{user}/delete','authcontroller@destroy');
	Route::get('/user/{user}/edit','authcontroller@edit');
	
	//company
	Route::get('/perusahaan','CompaniesController@index');
	Route::get('/perusahaan/add','CompaniesController@create');
	Route::post('/perusahaan/adds','CompaniesController@store');
	Route::get('/company/{company}/info','CompaniesController@show');
	Route::get('/company/{company}/delete','CompaniesController@destroy');
	Route::get('/company/{company}/edit','CompaniesController@edit');
	Route::get('/company/{company}/detail','CompaniesController@show');
		//lokasi
		Route::get('/company/{company}/lokasi','CompaniesController@lokasi');
		//alat
		Route::get('/company/{company}/alat','CompaniesController@equipment');
		//pegawai
		Route::get('/company/{company}/pegawai','CompaniesController@pegawai');
		//kecelakaan
		Route::get('/company/{company}/kecelakaan','CompaniesController@kecelakaan');
		//produksi
		Route::get('/company/{company}/produksi','CompaniesController@shows');
		//biaya
		Route::get('/company/{company}/biaya','CompaniesController@biaya');

	//produksi	
	Route::get('/ptambang','CompaniesController@ptambang');
	Route::post('/ptambang/show','CompaniesController@ptambangs');

		

	//news
	Route::get('/berita','NewsController@index');
	Route::get('/berita/add','NewsController@create');
	Route::post('/new/add','NewsController@store');

	//biaya
	Route::get('/biaya','PricesController@index');
	Route::get('/biaya/{price}/delete','PricesController@destroy');
	Route::post('/biaya/add','PricesController@store');
	Route::post('/biaya/{price}/update','PricesController@update');

//perusahaan tambang
	//kecelekaan
	Route::get('/kecelakaan','AccidentsController@index');
	Route::get('/accident/{accident}/delete','AccidentsController@destroy');
	Route::post('/accident/add','AccidentsController@store');
	Route::post('/accident/update','AccidentsController@update');

	//alat
	Route::get('/alat','EquipmentsController@index');
	Route::post('/alat/add','EquipmentsController@store');
	Route::post('/alat/update','EquipmentsController@update');
	Route::get('/alat/{equipment}/delete','EquipmentsController@destroy');

	//pegawai
	Route::get('/pegawai','WorkersController@index');
	Route::get('/pegawai/{worker}/destroy','WorkersController@destroy');
	Route::post('/pegawai/add','WorkersController@store');
	Route::post('/pegawai/update','WorkersController@update');

	//penjualan
	Route::get('/penjualan','TurnoversController@index');

	//report
	Route::get('/report','ReportsController@index');

	//pertambangan
		//lokasi
		route::get('/lokasi','LocationsController@index');
		route::get('/lokasi/add','LocationsController@create');
		route::get('/lokasi/{location}/edit','LocationController@edit');
		route::post('/lokasi/{id}/update','LocationsController@update');
		route::post('/lokasi/adds','LocationsController@store');
		route::get('/lokasi/{location}/delete','LocationController@destroy');

		//hasil
		route::get('/hasil','ResultsController@index');
		route::post('/hasil/add','ResultsController@store');

		//produksi tambang
			//pengupasan
			route::get('/pengupasan','OverburdensController@index');
			route::get('/overburden/{overburden}/delete','OverburdensController@destroy');
			route::post('/overburden/add','OverburdensController@store');
			route::post('/pengupasan/update','OverburdensController@update');

			//pengangkutan
			route::get('/pengangkutan','TransportsController@index');
			route::get('/transport/{transport}/delete','TransportsController@destroy');
			route::post('/transport/add','TransportsController@store');
			route::post('/transport/update','TransportsController@update');

			//penggalian
			route::get('/penggalian','ExavationsController@index');
			route::get('/exavation/{exavation}/delete','ExavationsController@destroy');
			route::post('/excavation/add','ExavationsController@store');
			route::post('/excavation/update','ExavationsController@update');

			//hasil
			route::get('/biayas','CompaniesController@biayas');

});


