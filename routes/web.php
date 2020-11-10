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

use Illuminate\Support\Facades\Route;

Auth::routes();

Route::get('/home', 'HomeController@index')->middleware('auth')->name('home');
//Route::get('/', function () {
    //    return view('welcome');
    //});
    Route::get('/','PenyewaController@index');
    Route::get('gudang/{id}','PenyewaController@Detailgudang');
    Route::post('user/store','UserController@userStore');
    // Route::get('/sewa', 'PenyewaController@sewa');
    // Route::get('/sewa/{id}/hapus', 'SewaController@destroy');



    
    Route::group(['middleware' => ['auth','owner']], function () {
        Route::get('/profiles','OwnerController@index')->name('owner.profile');
        Route::patch('/profiles/update','OwnerController@update')->name('owner.update');
        Route::get('/buildings-rentaled', 'OwnerController@penyewaan')->name('owner.penyewaan');
        Route::get('/buildings', 'gudangController@index')->name('owner.indexgudang');
        Route::post('/buildings/create', 'gudangController@store')->name('owner.creategudang');
        Route::get('/buildings/{gudang}', 'gudangController@edit')->name('owner.proposeedit');
        Route::patch('/buildings/update/{gudang}', 'gudangController@update')->name('owner.editgudang');
        Route::get('editprofile', 'OwnerController@edit');
        Route::get('/penyewa', 'gudangController@penyewa');
        
    });
    
    
    
    Route::group(['middleware' => ['auth','user']], function () {    
        Route::get('Petani.indexsewa', function () {
            return view('Petani.indexsewa');
        });
        Route::POST('/sewa','SewaController@store');
        Route::get('Petani.indexrekomendasi', function () {
            return view('Petani.indexrekomendasi');
        });
        Route::get('Petani.indexsewa', 'gudangController@index');
        Route::get('Petani.showgudang/{gudang}', 'gudangController@show');
        // Route::resource('Petani', 'PetaniController');
        // Route::resource('admin', 'PetaniController');
        Route::get('bayar/{id}', 'SewaController@bayar');
        Route::post('bayar', 'SewaController@post_bayar');
        Route::get('checkout', 'SewaController@indexcheckout');
        Route::get('/sewa', 'PenyewaController@sewa')->name('sewa');
        Route::get('rentals', 'SewaController@rentals')->name('rentals');
        Route::get('/cetakpdf/{rental}', 'SewaController@cetak');
        Route::get('/sewa/{id}/hapus', 'SewaController@destroy');

    });
    
    
    Route::group(['middleware' => ['auth','admin']], function () {
        Route::resource('profile', 'ProfileController');
        Route::get('/gudang/{gudang}', 'gudangController@show');
        Route::get('/gudang', 'gudangController@index')->name('admin.indexbuilding');
        Route::patch('/gudang/updateverif/{gudang}', 'gudangController@adminverif')->name('admin.updateverif');
        Route::patch('/gudang/updateeditverif/{gudang}', 'gudangController@adminverifedit')->name('admin.updateverifedit');
        Route::get('/verification', 'gudangController@verification')->name('admin.buildingverification');
        Route::get('/verificationedit', 'gudangController@verificationedit')->name('admin.editverification');
        Route::get('/admin/pemilik/{user}', 'gudangController@pemilik')->name('pemilik.gudang');
        Route::get('/datapenyewa', 'gudangController@penyewa');
        Route::patch('admin/verifbayar/{payment}', 'SewaController@verifbayar');
        
        // Route::get('admin.showgudang/{gudang}', 'gudangController@show');
    });
    