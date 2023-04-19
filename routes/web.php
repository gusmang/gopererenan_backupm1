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

Route::post('/post-sumbangan', [
	'as'   => 'post-sumbangan',
	'uses' => 'ApiController@post_sumbangan'
]);

Route::post('/invoice', [
	'as'   => 'invoice',
	'uses' => 'FrontController@invoice'
]);

// Route::get('/privacy-policy', function () {

Route::post('payment_ipaymu', [
	'as'   => 'payment_ipaymu',
	'uses' => 'FrontController@payment_ipaymu'
]);
	
// });

Route::get('/privacy-policy', [
	'as'   => 'mari-menyumbang',
	'uses' => 'FrontController@privacy'
]);

Route::get('/help-center', [
	'as'   => 'mari-menyumbang',
	'uses' => 'FrontController@help'
]);

Route::get('/about-us', [
	'as'   => 'mari-menyumbang',
	'uses' => 'FrontController@abouts'
]);

Route::get('/generate-pdf', [
	'as'   => 'generate-pdf',
	'uses' => 'FrontController@generate_pdf'
]);

Route::get('/mari-menyumbang', [
	'as'   => 'mari-menyumbang',
	'uses' => 'FrontController@mari_menyumbang'
]);

Route::get('/register-new', [
	'as'   => 'register-new',
	'uses' => 'FrontController@register_new'
]);

Route::get('/get_datakomentar_cat/{index}', [
	'as'   => 'get_datakomentar_cat',
	'uses' => 'ApiController@get_datakomentar_cat'
]);

Route::post('/post_datakomentar_cat/{index}', [
	'as'   => 'post_datakomentar_cat',
	'uses' => 'ApiController@post_datakomentar_cat'
]);

Route::post('/submit_post_new_usaha', [
	'as'   => 'submit_post_new_usaha',
	'uses' => 'FrontController@submit_post_new_usaha'
]);

Route::get('/success-register', [
	'as'   => 'success-register',
	'uses' => 'FrontController@success_register'
]);

Route::get('/daftar-seluruh-sumbangan', [
	'as'   => 'mari-menyumbang',
	'uses' => 'FrontController@daftar_sumbangan'
]);

Route::get('/invoice-transfer', [
	'as'   => 'invoice-transfer',
	'uses' => 'FrontController@donasi_transfer'
]);


Route::get('/account-login', [
	'as'   => 'account-login',
	'uses' => 'FrontController@account_login'
]);

Route::get('/blog/list', [
	'as'   => 'blog/list',
	'uses' => 'FrontController@blog_list'
]);

Route::get('/blog/{slug}', [
	'uses' => 'FrontController@blog_detail'
]);

Route::get('/blog_list_paging', [
	'uses' => 'FrontController@blog_list_paging'
]);

Route::get('/form-sumbangan', [
	'as'   => 'form-sumbangan',
	'uses' => 'FrontController@sumbangan'
]);

Route::get('/form-sumbangan-ipaymu', [
	'as'   => 'form-sumbangan-ipaymu',
	'uses' => 'FrontController@sumbangan_ipaymu'
]);

Route::get('/admin', function () {
    return view('admin');
});

Route::get('/tesenv', [
	'as'   => 'tesenv',
	'uses' => 'FrontController@tesenv'
]);

Route::get('administrator/', function () {
    return view('auth.login');
});

Route::get('/admin', function () {
    return view('admin');
});

Route::get('administrator/login', function () {
	return view('auth.login');
});

Route::post('submit-data-login', function () {
	//return view('auth.login');
});

Route::post('/submit-data-login', [
	'as'   => 'submit-data-login',
	'uses' => 'AuthController@runlogin'
]);

Route::get('/validasi_tanggal_sumbangan', [
	'as'   => 'validasi_tanggal_sumbangan',
	'uses' => 'FrontController@validasi_tanggal_sumbangan'
]);

Route::group(['prefix' => 'account', 'middleware' => 'users' , 'as' => 'account'], function () {

	Route::get('/punia-tamiu', [
		'as'   => 'punia-tamiu',
		'uses' => 'FrontController@punia_tamiu'
	]);

	Route::get('/tenaga-kerja', [
		'as'   => 'tenaga-kerja',
		'uses' => 'FrontController@tenaga_kerja'
	]);

	Route::get('/daftar-tenaga-kerja', [
		'as'   => 'daftar-tenaga-kerja',
		'uses' => 'FrontController@daftar_tenaga_kerja'
	]);

	Route::get('/hired-employee', [
		'as'   => 'hired-employee',
		'uses' => 'FrontController@hired_employee'
	]);

	Route::post('/post-update-profile', [
		'as'   => 'post-update-profile',
		'uses' => 'FrontController@post_update_profile'
	]);

	Route::get('/edit-profile', [
		'as'   => 'edit-profile',
		'uses' => 'FrontController@edit_profile'
	]);
	Route::get('/list-tenaga-kerja/{index}', [
		'as'   => 'list-tenaga-kerja',
		'uses' => 'FrontController@list_tenaga_kerja'
	]);

	Route::post('/post-punia-tamiu', [
		'as'   => 'post-punia-tamiu',
		'uses' => 'FrontController@post_pembayaran_baru'
	]);

	Route::post('/invoice-punia', [
		'as'   => 'invoice-punia',
		'uses' => 'FrontController@invoice_punia'
	]);

	Route::get('/punia-tranfers', [
		'as'   => 'punia-tranfers',
		'uses' => 'FrontController@punia_tranfers'
	]);

	Route::get("logout-users" , [
		'as'   => 'logout-users',
		'uses' => 'AuthController@logout'
	]);

	Route::post("hire-pegawai", [
		'as'   => 'hire-pegawai',
		'uses' => 'FrontController@hire_pegawai'
	]);

	Route::post("refuse-pegawai", [
		'as'   => 'refuse-pegawai',
		'uses' => 'FrontController@refuse_pegawai'
	]);

	Route::post("accept-pegawai", [
		'as'   => 'accept-pegawai',
		'uses' => 'FrontController@accept_pegawai'
	]);

	Route::get("get-pegawai-list", [
		'as'   => 'get-pegawai-list',
		'uses' => 'FrontController@get_pegawai_list'
	]);

	Route::get('get-detail-karyawan-api/{index}', [
		'as'   => 'get_detail_employee',
		'uses' => 'ApiController@get_detail_employee'
	]);

	//::get('')
	

});
	
Route::group(['prefix' => 'administrator', 'middleware' => 'admin' , 'as' => 'administrator'], function () {

	// Route::get('/', function () {
	//     return view('admin.pages.home');
	// })->middleware('admin');
	
	Route::get('/', [
		'as'   => 'dashboard',
		'uses' => 'Administrator\DashboardController@indexhome', 'middleware' => 'admin',
	]);

	Route::get('/download_usaha_pdf', [
		'as'   => 'download_usaha_pdf',
		'uses' => 'Administrator\UsahaController@download_usaha_pdf', 'middleware' => 'admin',
	]);

	Route::post('/post_search_usaha', [
		'as'   => 'post_search_usaha',
		'uses' => 'Administrator\UsahaController@post_search_usaha', 'middleware' => 'admin',
	]);

	Route::get('/get_danapunia_range', [
		'as'   => 'dashboard',
		'uses' => 'Administrator\DashboardController@get_danapunia_range', 'middleware' => 'admin',
	]);

	Route::get('/get_danasumbangan_range', [
		'as'   => 'dashboard',
		'uses' => 'Administrator\DashboardController@get_sumbangan_range', 'middleware' => 'admin',
	]);

	Route::post('/approve-pembayaran-baru', [
		'as'   => 'approve-pembayaran-baru',
		'uses' => 'Administrator\SumbanganController@approve_pembayaran_baru', 'middleware' => 'admin',
	]);

	Route::get('/get-sumbangan-detail/{index}', [
		'uses' => 'Administrator\SumbanganController@get_sumbangan_detail', 'middleware' => 'admin',
	]);

	Route::get('/sumbangan-online-api', [
		'uses' => 'Administrator\SumbanganController@sumbangan_online_api', 'middleware' => 'admin',
	]);

	Route::get('ambil_listkategori','Administrator\KategoriController@ambil_listkategori');
	Route::get('ambil_listkategori_awal','Administrator\KategoriController@ambil_listkategori_awal');
	Route::post('post_kategori','Administrator\KategoriController@post_kategori');
	Route::get('ambil_kategori/{index}','Administrator\KategoriController@ambil_kategori');
	Route::post('updatekategori','Administrator\KategoriController@updatekategori');
	Route::get('hapuskategori','Administrator\KategoriController@hapuskategori');

	Route::get('kirim_reminder/{email}','Administrator\UsahaController@kirim_reminder');


	Route::get('ambil_listberita','BeritaController@ambil_listberita');
	Route::get('ambil_listberita_kategori','BeritaController@ambil_listberita_kategori');
	Route::post('tambahberita','BeritaController@tambahberita');
	Route::post('updateberita','BeritaController@updateberita');
	Route::get('ambil_berita/{index}','BeritaController@ambil_berita');

	
	
	Route::get('/home', [
		'as'   => 'home',
		'uses' => 'Administrator\DashboardController@indexhome', 'middleware' => 'admin',
	]);

	Route::get('/userprofile', [
		'as'   => 'home',
		'uses' => 'UserController@indexuser', 'middleware' => 'admin',
	]);

	Route::get('/datauser', function () {
		return view('admin.pages.data_user.table');
	})->middleware('admin');

	Route::get('ambil_listuser','UserController@ambil_listuser');
	
	Route::get('/data_usaha', [
		'as'   => 'data_usaha',
		'uses' => 'Administrator\UsahaController@ambil_listUsaha', 'middleware' => 'admin',
	]);
	
	Route::get('/detail_usaha/{index}', [
		'as'   => 'detail_usaha',
		'uses' => 'Administrator\UsahaController@get_detailUsaha', 'middleware' => 'admin',
	]);
	
	
	Route::post('/submit_post_add_usaha','Administrator\UsahaController@submit_post_add_usaha');
	
	Route::put('/update_post_add_usaha','Administrator\UsahaController@update_post_add_usaha');
	
	Route::post('/upload_gambar_usaha/{index}','Administrator\UsahaController@upload_gambar_usaha');
	Route::get('/approve_usaha/{index}','Administrator\UsahaController@approve_usaha');

	Route::post('/upload_gambar_karyawan/{index}','Administrator\KaryawanController@upload_gambar_karyawan');
	
	Route::get('/duitkutes','Administrator\DuitkuController@pay_credit_card');
	
	Route::post('/post_pembayaran_baru/{index}','Administrator\UsahaController@post_pembayaran_baru');
	Route::post('/update_pembayaran_baru/{index}','Administrator\UsahaController@update_pembayaran_baru');

	
	
	Route::get('/get_pembayaran_detail/{index}','Administrator\UsahaController@get_pembayaran_detail');
	
// 	Route::get('/data_usaha', function () {
// 	    return view('admin.pages.data_usaha.table');
// 	})->middleware('admin');
	Route::get('/datakategori', function () {
		return view('admin.pages.data_kategori.table');
	})->middleware('admin');

	Route::get('/databerita', function () {
		return view('admin.pages.data_berita.table');
	})->middleware('admin');

	Route::get('/laporan_keuangan', function () {
		return view('front.pages.data_laporan.table');
	})->middleware('admin');

	Route::get('/datakategorial', function () {
		return view('front.pages.data_kategorial.table');
	})->middleware('admin');

	Route::get('/datageneral', function () {
		return view('admin.pages.data_general.form');
	});

	Route::post('/updateabout_us' , 'Administrator\ContentController@updateabout_us');
	Route::post('/updatehelp_policy' , 'Administrator\ContentController@updatehelp_policy');
	Route::post('/updateprivacy_policy' , 'Administrator\ContentController@updateprivacy_policy');

	Route::get('/dataabout_us','Administrator\ContentController@dataabout_us');
	Route::get('/dataprivacy_pererenan','Administrator\ContentController@dataprivacy_pererenan');
	Route::get('/datahelp_center','Administrator\ContentController@datahelp_center');

	Route::get('/datageneral','Administrator\DashboardController@general');
	Route::post('/post_general','Administrator\DashboardController@post_general');

	Route::get('/data_akunbank','Administrator\BankController@index_bank');
	Route::get('/post_data_bank','Administrator\BankController@post_data_bank');
	Route::post('/post_submit_banks','Administrator\BankController@post_submit_banks');
	Route::post('/update_submit_banks/{index}','Administrator\BankController@update_submit_banks');

	Route::get('/ambil_bank/{index}','Administrator\BankController@ambil_bank');

	Route::get('/download_puniabulanan_pdf/{bln}/{thn}','Administrator\DanaPuniaController@download_puniabulanan_pdf');
	Route::get('/download_puniabulanan_pdf2/{bln}/{thn}','Administrator\DanaPuniaController@download_puniabulanan_pdf2');
	Route::get('/download_puniabulanan_pdf3/{bln}/{thn}','Administrator\DanaPuniaController@download_puniabulanan_pdf3');
	
	Route::get('/datapunia_wajib','Administrator\DanaPuniaController@list_datapunia_wajib');
	Route::get('/datapunia_wajib/{index}/{tanggal}','Administrator\DanaPuniaController@list_datapunia_wajib_param');
	
	Route::get('/list_datapunia_wajib/{index}','Administrator\DanaPuniaController@list_datapunia_wajib');
	Route::get('download_pdf_danapunia','Administrator\DanaPuniaController@download_pdf_danapunia');

	Route::get('ambil_listbanjar','Administrator\BanjarController@ambil_listbanjar');
	Route::post('post_data_banjar','Administrator\BanjarController@post_data_banjar');
	Route::post('hapusbanjar','Administrator\BanjarController@hapusbanjar');
	

	Route::get('/databanjar','Administrator\BanjarController@index');

	Route::get('ambil_listbanjar','Administrator\BanjarController@ambil_listbanjar');
	Route::post('post_data_banjar','Administrator\BanjarController@post_data_banjar');
	Route::post('hapusbanjar','Administrator\BanjarController@hapusbanjar');

	Route::get('/datamenu','Administrator\MenuController@index');

	Route::get('ambil_listmenu','Administrator\MenuController@ambil_listmenu');
	Route::post('post_data_menu','Administrator\MenuController@post_data_menu');
	

	Route::get('/data_tenagakerja','Administrator\KaryawanController@index');
	Route::get('/data_skill_tk','Administrator\KaryawanController@data_skill_tk');
	Route::get('/ambil_listtenagakerja','Administrator\KaryawanController@ambil_listtenagakerja');
	Route::post('submit_post_add_tenagakerja','Administrator\KaryawanController@submit_post_add_tenagakerja');
	Route::put('update_post_add_tenagakerja','Administrator\KaryawanController@update_post_add_tenagakerja');
	Route::get('detail_tenaga_kerja/{index}','Administrator\KaryawanController@detail_tenaga_kerja');
	Route::post('submit_hire_tenaga','Administrator\KaryawanController@submit_hire_tenaga');
	Route::post('approve_data_karyawan','Administrator\KaryawanController@approve_data_karyawan');
	Route::post('not_approve_data_karyawan','Administrator\KaryawanController@not_approve_data_karyawan');
	
	
	Route::get('/data_tenagakerja_skill','Administrator\KaryawanController@index_skill');
	Route::post('/post_data_skill','Administrator\KaryawanController@post_data_skill');
	Route::put('/post_data_edit_skill','Administrator\KaryawanController@post_data_edit_skill');
	Route::get('/hapus_skill/{index}','Administrator\KaryawanController@hapus_skill');
	Route::post('/post_data_skill_new','Administrator\KaryawanController@post_data_skill_new');

	Route::get('/data_tenagakerja_interview','Administrator\KaryawanController@indexInterview');
	Route::get('/data_tenagakerja_approve','Administrator\KaryawanController@indexApprove');
	Route::get('/approve_data_tk','Administrator\KaryawanController@approve_data_tk');

	Route::get('ambil_listbanjar','Administrator\BanjarController@ambil_listbanjar');
	Route::post('post_data_banjar','Administrator\BanjarController@post_data_banjar');
	Route::post('hapusbanjar','Administrator\BanjarController@hapusbanjar');


	Route::get('/datakategori_slides','Administrator\GambarSlidesController@index');
	Route::get('ambil_listkategori_slides','Administrator\GambarSlidesController@ambil_listkategori_slides');

	Route::get('/datagambar_slides','Administrator\GambarSlidesController@index_gambar');
	Route::post('post_gambar_baru','Administrator\GambarSlidesController@post_data_slides');
	Route::post('post_gambar_baru_edit','Administrator\GambarSlidesController@post_gambar_baru_edit');
	Route::get('ambil_listslides/{kategori}','Administrator\GambarSlidesController@ambil_listslides');
	Route::get('/get_gambar_slide','Administrator\GambarSlidesController@get_gambar_slide');

	Route::post('post_active_slides','Administrator\GambarSlidesController@post_active_slides');

	Route::post('post_data_kategori','Administrator\GambarSlidesController@post_data_kategori');

	Route::get('datasumbangan','Administrator\SumbanganController@index');
	Route::post('submit_post_add_sumbangan','Administrator\SumbanganController@submit_post_add_sumbangan');
	Route::get('download_pdf_sumbangan','Administrator\SumbanganController@download_pdf_sumbangan');

	Route::get('data_kategoriberita','Administrator\KategoriBeritaController@index');
	Route::post('post_kategori_berita','Administrator\KategoriBeritaController@post_kategori_berita');
	Route::post('post_user_kategori_berita','Administrator\KategoriBeritaController@post_user_kategori_berita');
	Route::get('hapus_kategori_berita','Administrator\KategoriBeritaController@hapus_kategori_berita');

	Route::get('logoutadmin','LoginController@logout');
	

	});


	
Route::post('runlogin','LoginController@runlogin');

Auth::routes();