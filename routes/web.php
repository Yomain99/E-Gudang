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

Route::get('/halaman', 'HomeController@index')->middleware('auth')->name('home');
//Route::get('/', function () {
    //    return view('welcome');
    //});
    Route::get('/','PenyewaController@index');
    Route::get('gudang/{id}','PenyewaController@DetailGudang');
    Route::post('user/store','UserController@userStore');
    // Route::get('/sewa', 'PenyewaController@sewa');
    // Route::get('/sewa/{id}/hapus', 'SewaController@destroy');



    
    Route::group(['middleware' => ['auth','owner']], function () {
        Route::get('/profiles','OwnerController@index')->name('owner.profile');
        Route::patch('/profiles/update','OwnerController@update')->name('owner.update');
        Route::get('/buildings-rentaled', 'OwnerController@penyewaan')->name('owner.penyewaan');
        Route::get('/buildings', 'GudangController@index')->name('owner.indexgudang');
        Route::post('/buildings/create', 'GudangController@store')->name('owner.creategudang');
        Route::get('/buildings/{gudang}', 'GudangController@edit')->name('owner.proposeedit');
        Route::put('/buildings/update/{gudang}', 'GudangController@update')->name('owner.editgudang');
        Route::get('editprofile', 'OwnerController@edit');
        Route::get('/penyewa', 'GudangController@penyewa');
        Route::delete('/buildings/{gudang}', 'GudangController@edit')->name('owner.proposeedit');
        
    });
    
    
    
    Route::group(['middleware' => ['auth','user']], function () {    
        Route::get('masyarakat.indexsewa', function () {
            return view('masyarakat.indexsewa');
        });
        Route::POST('/sewa','SewaController@store');
        Route::get('masyarakat.indexrekomendasi', function () {
            return view('masyarakat.indexrekomendasi');
        });
        Route::get('masyarakat.indexsewa', 'GudangController@index');
        Route::get('masyarakat.showgudang/{gudang}', 'GudangController@show');
        // Route::resource('masyarakat', 'MasyarakatController');
        // Route::resource('admin', 'MasyarakatController');
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
        Route::get('/gudang/{gudang}', 'GudangController@show');
        Route::get('/gudang', 'GudangController@index')->name('admin.indexbuilding');
        Route::patch('/gudang/updateverif/{gudang}', 'GudangController@adminverif')->name('admin.updateverif');
        Route::patch('/gudang/updateeditverif/{gudang}', 'GudangController@adminverifedit')->name('admin.updateverifedit');
        Route::get('/verification', 'GudangController@verification')->name('admin.buildingverification');
        Route::get('/verificationedit', 'GudangController@verificationedit')->name('admin.editverification');
        Route::get('/admin/pemilik/{user}', 'GudangController@pemilik')->name('pemilik.gudang');
        Route::get('/datapenyewa', 'GudangController@penyewa');
        Route::patch('admin/verifbayar/{payment}', 'SewaController@verifbayar');
        Route::get('/gudang/destroy/{id}','GudangController@destroy')->name('gudang/destroy');

        
        // Route::get('admin.showgudang/{gudang}', 'GudangController@show');
    });
    
    