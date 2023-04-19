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

Route::get('/', [
	'as'   => 'home',
	'uses' => 'FrontController@index'
]);

Route::get('mari-menyumbang', [
	'as'   => 'mari-menyumbang',
	'uses' => 'FrontController@mari_menyumbang'
]);

Route::get('about', [
	'as'   => 'about',
	'uses' => 'FrontController@index'
]);


Route::get('/admin', function () {
    return view('admin');
});

Route::get('administrator/', function () {
    return view('auth.login');
});

Route::get('/admin', function () {
    return view('admin');
});

Route::get('administrator/login', function () {
	return view('auth.login');
});

	
Route::group(['as' => 'administrator', 'prefix' => 'administrator',
'middleware' => 'admin'], function () {

	Route::get('/home', [
        'as'   => 'dashboard',
        'uses' => 'Administrator\DashboardController@indexhome'
    ]);

	Route::get('/seo', [
        'as'   => 'seo',
        'uses' => 'Administrator\DashboardController@indexseo'
    ]);
	
	Route::get('/', [
        'as'   => 'dashboard',
        'uses' => 'Administrator\DashboardController@indexhome'
    ]);

	Route::get('/gallery', [
        'as'   => 'gallery',
        'uses' => 'Administrator\GalleryController@index_gal'
    ]);
    
    // Route::get('/gallery', function () {
    //     return view('admin.pages.data_gallery.table');
	// })->middleware('admin');
    

	Route::get('/home', [
        'as'   => 'home',
        'uses' => 'Administrator\DashboardController@indexhome'
    ]);

	Route::get('/profile', [
        'as'   => 'home',
        'uses' => 'Administrator\DashboardController@indexprofile'
    ]);

	Route::get('/contacts', [
        'as'   => 'home',
        'uses' => 'Administrator\DashboardController@indexcontacts'
    ]);
    
	

	Route::get('/userprofile', [
        'as'   => 'home',
        'uses' => 'UserController@indexuser'
    ]);

	Route::get('/datauser', function () {
	    return view('admin.pages.data_user.table');
	});
	
// 	Route::get('/data_usaha', function () {
// 	    return view('admin.pages.data_usaha.table');
// 	})->middleware('admin');

	Route::get('/datakategori', function () {
	    return view('admin.pages.data_kategori.table');
	});

	Route::get('/databerita', function () {
	    return view('admin.pages.data_berita.table');
	});


	Route::get('/datamenu','Administrator\MenuController@index');

	Route::get('ambil_listmenu','Administrator\MenuController@ambil_listmenu');
	Route::post('post_data_menu','Administrator\MenuController@post_data_menu');
	Route::post('hapusbanjar','Administrator\BanjarController@hapusbanjar');
	
	Route::post('post_data_gallery','Administrator\GalleryController@post_data_gallery');
	Route::get('get_data_gallery','Administrator\GalleryController@get_data_gallery');
	Route::get('get_detail_gallery/{index}','Administrator\GalleryController@get_detail_gallery');


	Route::get('kategori-gallery','Administrator\GalleryController@index_kategori');
	Route::get('get_detail_kategori_gallery/{index}','Administrator\GalleryController@get_detail_kategori_gallery');
	Route::get('get-data-kategori-gallery','Administrator\GalleryController@get_data_kategori_all');
	Route::post('post_data_kategori_gallery','Administrator\GalleryController@post_data_kategori_gallery');
	Route::put('update_kategori_gallery_baru','Administrator\GalleryController@update_kategori_gallery_baru');
	Route::get('post_hapus_kategori/{index}','Administrator\GalleryController@post_hapus_kategori');

	Route::get('/datakategori_slides','Administrator\GambarSlidesController@index');
	Route::get('ambil_listkategori_slides','Administrator\GambarSlidesController@ambil_listkategori_slides');

	Route::get('/datagambar_slides','Administrator\GambarSlidesController@index_gambar');
	Route::post('post_gambar_baru','Administrator\GalleryController@post_gambar_baru');
	Route::put('update_gambar_baru','Administrator\GalleryController@update_gambar_baru');
	Route::get('/hapus_gallery/{index}','Administrator\GalleryController@hapus_gallery');
	
	
	Route::get('/index_slideshow','Administrator\GambarSlidesController@index');
	Route::put('post_gambar_baru_edit','Administrator\GambarSlidesController@post_gambar_baru_edit');
	Route::get('ambil_listslides/{kategori}','Administrator\GambarSlidesController@ambil_listslides');
	Route::get('/get_gambar_slide','Administrator\GambarSlidesController@get_gambar_slide');
	Route::post('post_data_slideshow','Administrator\GambarSlidesController@post_data_slideshow');
	Route::get('/get_detail_slideshow/{index}','Administrator\GambarSlidesController@get_detail_slideshow');
	Route::get('/hapus_slideshow/{index}','Administrator\GambarSlidesController@hapus_slideshow');

	Route::get('/index_sosmed','Administrator\SocialController@index_sosmed');
	Route::get('/get-data-socials','Administrator\SocialController@get_data_socials');
	Route::post('/post_data_sosmed','Administrator\SocialController@post_data_sosmed');
	Route::get('get_detail_sosmed/{index}','Administrator\SocialController@get_detail_sosmed');
	Route::put('update_sosmed_baru','Administrator\SocialController@update_sosmed_baru');
	Route::get('post_hapus_sosmed/{index}','Administrator\SocialController@post_hapus_sosmed');
	
	Route::get('/room-category','Administrator\RoomCatController@index');
	Route::get('/get_gambar_roomcat','Administrator\RoomCatController@get_gambar_roomcat');
	Route::post('post_data_roomcat','Administrator\RoomCatController@post_data_roomcat');
	Route::post('post_data_updateroom','Administrator\RoomCatController@post_data_updateroom');
	
	Route::get('/hapus_gambar_gallery/{index}', [
        'as'   => 'hapus_gambar_gallery',
        'uses' => 'Administrator\RoomCatController@hapus_gambar_gallery'
    ]);

	Route::get('/detail-room-category/{index}','Administrator\RoomCatController@index_detail');

	Route::get('/facilities','Administrator\FacilitiesController@index');
	Route::get('/get-data-facilities','Administrator\FacilitiesController@get_facilities');
	Route::post('post_data_facilities','Administrator\FacilitiesController@post_data_facilities');
	Route::put('update_facilities','Administrator\FacilitiesController@update_facilities');
	Route::get('/get_detail_facilities/{index}','Administrator\FacilitiesController@get_detail_facilities');
	Route::get('/post_hapus_facilities/{index}','Administrator\FacilitiesController@post_hapus_facilities');

	Route::get('/bedtype','Administrator\BedTypeController@index');
	Route::get('/get-data-bedtype','Administrator\BedTypeController@get_bedtype');
	Route::post('post_data_bedtype','Administrator\BedTypeController@post_data_bedtype');
	Route::put('update_bedtype','Administrator\BedTypeController@update_bedtype');
	Route::get('/get_detail_bedtype/{index}','Administrator\BedTypeController@get_detail_bedtype');
	Route::get('/post_hapus_bedtype/{index}','Administrator\BedTypeController@post_hapus_bedtype');

	Route::get('/welcome-video','Administrator\WelcomeController@index');
	Route::put('/post-video','Administrator\WelcomeController@update_video');

	Route::get('/special-offers','Administrator\SpecialController@index');
	Route::get('/get_data_offers','Administrator\SpecialController@get_data_offers');
	Route::post('/post_data_specials','Administrator\SpecialController@post_data_specials');
	Route::get('/detail-special-offers/{index}','Administrator\SpecialController@detail_special_offers');
	Route::post('/post_data_updateoffers/','Administrator\SpecialController@post_data_updateoffers');
	Route::get('/hapus_offers/{index}','Administrator\SpecialController@hapus_offers');
	Route::get('/aktif_offers/{index}','Administrator\SpecialController@aktif_offers');

	Route::get('/detail-restaurant','Administrator\RestaurantController@index');
	Route::get('/get_data_event_resto','Administrator\RestaurantController@get_data_event_resto');
	Route::post('/post_event_restaurant','Administrator\RestaurantController@post_event_restaurant');
	Route::post('/post_event_restaurant_edit','Administrator\RestaurantController@post_event_restaurant_edit');
	Route::get('/get_data_event_detailresto/{index}','Administrator\RestaurantController@get_data_event_detailresto');

	Route::post('/post_data_updateresto','Administrator\RestaurantController@post_data_updateresto');
	Route::post('/post_menu_restaurant','Administrator\RestaurantController@post_menu_restaurant');
	Route::get('/get_data_menu_resto','Administrator\RestaurantController@get_data_menu_resto');
	Route::get('/get_data_menu_detailresto/{index}','Administrator\RestaurantController@get_data_menu_detailresto');
	Route::post('/post_menu_restaurant_edit','Administrator\RestaurantController@post_menu_restaurant_edit');
	Route::get('/get_data_deleteEvent_resto/{index}','Administrator\RestaurantController@get_data_deleteEvent_resto');
	Route::get('/get_data_deleteMenu_resto/{index}','Administrator\RestaurantController@get_data_deleteMenu_resto');

	
	Route::get('/detail-wedding','Administrator\WeddingsController@index');
	Route::get('/get_data_testimonial_wedding','Administrator\WeddingsController@get_data_testimonial_wedding');
	Route::post('/post_testimonial_wedding','Administrator\WeddingsController@post_testimonial_wedding');
	Route::post('/post_edit_testi','Administrator\WeddingsController@post_testimonial_wedding_edits');
	Route::post('/upload_wedding_brosur','Administrator\WeddingsController@upload_wedding_brosur');

	Route::post('/post_data_updatewedding','Administrator\WeddingsController@post_data_updatewedding');
	Route::get('/hapus_gambar_wedding/{index}','Administrator\WeddingsController@hapus_gambar_wedding');
	Route::get('/get_data_event_detailwedding/{index}','Administrator\WeddingsController@get_data_event_detailwedding');
	Route::get('/get_data_deleteEvent_testimonial/{index}','Administrator\WeddingsController@get_data_deleteEvent_testimonial');
	// Route::get('/get_data_menu_detailresto/{index}','Administrator\RestaurantController@get_data_menu_detailresto');
	// Route::post('/post_menu_restaurant_edit','Administrator\RestaurantController@post_menu_restaurant_edit');
	// Route::get('/get_data_deleteEvent_resto/{index}','Administrator\RestaurantController@get_data_deleteEvent_resto');
	// Route::get('/get_data_deleteMenu_resto/{index}','Administrator\RestaurantController@get_data_deleteMenu_resto');

	Route::get('/detail-spa','Administrator\SpaController@index');
	Route::post('/post_data_updatespa','Administrator\SpaController@post_data_updatespa');
	Route::post('/post_testimonial_wedding','Administrator\WeddingsController@post_testimonial_wedding');
	Route::post('/post_edit_testi','Administrator\WeddingsController@post_testimonial_wedding_edits');
	Route::post('/upload_wedding_brosur','Administrator\WeddingsController@upload_wedding_brosur');

	Route::get('/detail-weddings','Administrator\WeddingsController@index');
	Route::post('post_data_update_profile','Administrator\DashboardController@post_data_update_profile');
	Route::post('post_data_update_seo','Administrator\DashboardController@post_data_update_seo');
	Route::post('post_data_update_wa','Administrator\DashboardController@post_data_update_wa');

	Route::get('/wa_text','Administrator\DashboardController@wa_text');

	Route::post('post_data_update_contact','Administrator\DashboardController@post_data_update_contact');
	
	Route::get('/what-todo','Administrator\TodoController@index');
	Route::post('post_data_updatetodo','Administrator\TodoController@post_data_updatetodo');
	
	Route::post('post_data_experience','Administrator\TodoController@post_data_experience');
	Route::post('post_event_experience_edit','Administrator\TodoController@post_event_experience_edit');
	Route::get('get_data_experience','Administrator\TodoController@get_data_experience');
	Route::get('get_data_event_detailexp/{index}','Administrator\TodoController@get_data_event_detailexp');
	Route::post('/post_data_destination_img','Administrator\TodoController@post_data_destination_img');
	Route::get('/get_data_subimg_exp/{index}','Administrator\TodoController@get_data_subimg_exp');
	

	Route::get('/where-togo','Administrator\WhereToGoController@index');
	Route::post('post_data_updatetodo','Administrator\TodoController@post_data_updatetodo');

	

	
	Route::post('post_data_destination','Administrator\WhereToGoController@post_data_destination');
	Route::post('post_event_experience_edit','Administrator\TodoController@post_event_experience_edit');
	Route::get('get_data_destination','Administrator\WhereToGoController@get_data_destination');
	Route::get('get_data_event_detaildest/{index}','Administrator\WhereToGoController@get_data_event_detaildest');
	Route::post('post_destination_edit','Administrator\WhereToGoController@post_destination_edit');
	Route::get('get_data_delete_destination/{index}','Administrator\WhereToGoController@get_data_delete_destination');

	Route::get('logoutadmin','LoginController@logout');
	

	});


	
Route::post('runlogin','LoginController@runlogin');

Auth::routes();