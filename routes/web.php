<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PermintaanBarangController;
use App\Http\Controllers\PindahGudangController;
use App\Http\Controllers\StInventController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProcessQtyController;
use App\Http\Controllers\PemakaianSpBbmController;
use App\Http\Controllers\PinGudSpBbmController;
use App\Http\Controllers\PemakaianBbmController;
use App\Http\Controllers\Master\JnsAlatController;
use App\Http\Controllers\Master\LokasiController;
use App\Http\Controllers\Master\MerkController;
use App\Http\Controllers\Master\FixedAssetController;
use App\Http\Controllers\Master\AktivitasAlatController;
use App\Http\Controllers\Master\StsPemakaianController;
use App\Http\Controllers\Master\SupplierController;
use App\Http\Controllers\Master\WarehouseController;
use App\Http\Controllers\Master\MerkBrgController;

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
// Route::get('view', function () {
//     return view('view', ['title' => '']);
// })->name('view');
Route::get('/', function () {
    return view('login', ['title' => '']);
})->name('login');
Route::get('login', [UserController::class, 'login_action'])->name('login.action');
Route::post('login', [UserController::class, 'login_action'])->name('login.action');
Route::get('home', [UserController::class, 'home'])->name('home')->middleware('auth');
Route::get('register',[UserController::class, 'register'])->name('register');
Route::post('register', [UserController::class, 'register_action'])->name('register.action');
Route::get('users',[UserController::class, 'users'])->name('users')->middleware('auth');
Route::post('users', [UserController::class, 'users_add'])->name('users.add')->middleware('auth');
Route::get('profile',[UserController::class, 'profile'])->name('profile')->middleware('auth');
Route::post('profile', [UserController::class, 'profile_edit'])->name('profile.edit')->middleware('auth');
Route::get('lokasi',[LokasiController::class, 'lokasi'])->name('lokasi')->middleware('auth');
Route::post('lokasi', [LokasiController::class, 'lokasi_add'])->name('lokasi.add')->middleware('auth');

Route::get('jnsAlat',[JnsAlatController::class, 'jnsAlat'])->name('jnsAlat')->middleware('auth');
Route::get('jnsAlat_tambah',[JnsAlatController::class, 'jnsAlat_tambah'])->name('jnsAlat_tambah')->middleware('auth');
Route::post('jnsAlat', [JnsAlatController::class, 'jnsAlat_add'])->name('jnsAlat.add')->middleware('auth');

// Route::get('merk',[MerkController::class, 'merk'])->name('merk')->middleware('auth');
// Route::post('merk', [MerkController::class, 'merk_add'])->name('merk.add')->middleware('auth');
Route::get('fixedAsset',[FixedAssetController::class, 'fixedAsset'])->name('fixedAsset')->middleware('auth');
Route::post('fixedAsset', [FixedAssetController::class, 'fixedAsset_add'])->name('fixedAsset.add')->middleware('auth');

Route::get('aktivitasAlat',[AktivitasAlatController::class, 'aktivitasAlat'])->name('aktivitasAlat')->middleware('auth');
Route::post('aktivitasAlat', [AktivitasAlatController::class, 'aktivitasAlat_add'])->name('aktivitasAlat.add')->middleware('auth');

Route::get('sts_pemakaian',[StsPemakaianController::class, 'sts_pemakaian'])->name('sts_pemakaian')->middleware('auth');
Route::post('sts_pemakaian', [StsPemakaianController::class, 'sts_pemakaian_add'])->name('sts_pemakaian.add')->middleware('auth');

Route::get('supplier',[SupplierController::class, 'supplier_browse'])->name('supplier')->middleware('auth');
Route::post('supplier', [SupplierController::class, 'supplier_add'])->name('supplier.add')->middleware('auth');

Route::get('warehouse',[WarehouseController::class, 'warehouse_browse'])->name('warehouse')->middleware('auth');
Route::post('warehouse', [WarehouseController::class, 'warehouse_add'])->name('warehouse.add')->middleware('auth');

Route::get('merkBrg',[MerkBrgController::class, 'merkBrg_browse'])->name('merkBrg')->middleware('auth');
Route::post('merkBrg', [MerkBrgController::class, 'merkBrg_add'])->name('merkBrg.add')->middleware('auth');

Route::get('kayu',[UserController::class, 'kayu'])->name('kayu')->middleware('auth');
Route::post('kayu', [UserController::class, 'kayu_add'])->name('kayu.add')->middleware('auth');
Route::get('driver',[UserController::class, 'driver'])->name('driver')->middleware('auth');
Route::post('driver', [UserController::class, 'driver_add'])->name('driver.add')->middleware('auth');
Route::get('unitAlat',[UserController::class, 'unitAlat'])->name('unitAlat')->middleware('auth');
Route::post('unitAlat', [UserController::class, 'unitAlat_add'])->name('unitAlat.add')->middleware('auth');
Route::get('chainsaw',[UserController::class, 'chainsaw'])->name('chainsaw')->middleware('auth');
Route::post('chainsaw', [UserController::class, 'chainsaw_add'])->name('chainsaw.add')->middleware('auth');
Route::get('kupas',[UserController::class, 'kupas'])->name('kupas')->middleware('auth');
Route::post('kupas', [UserController::class, 'kupas_add'])->name('kupas.add')->middleware('auth');
Route::get('keperluan',[UserController::class, 'keperluan'])->name('keperluan')->middleware('auth');
Route::get('helper',[UserController::class, 'helper'])->name('helper')->middleware('auth');
Route::post('helper', [UserController::class, 'helper_add'])->name('helper.add')->middleware('auth');
Route::post('keperluan', [UserController::class, 'keperluan_add'])->name('keperluan.add')->middleware('auth');

Route::get('trHeaderPb',[PermintaanBarangController::class, 'trHeaderPb'])->name('trHeaderPb')->middleware('auth');
Route::get('trHeaderPb/json', [PermintaanBarangController::class, 'trHeaderPb_data'])->name('trHeaderPb.data')->middleware('auth');
Route::post('trHeaderPb', [PermintaanBarangController::class, 'trHeaderPb_add'])->name('trHeaderPb.add')->middleware('auth');
Route::post('trHeaderPb/delete/', [PermintaanBarangController::class, 'trHeaderPbDestroy_del'])->name('trHeaderPbDestroy.del')->middleware('auth');

Route::get('trDetailPb/{id}', [PermintaanBarangController::class, 'trDetailPb'])->name('trDetailPb')->middleware('auth');
Route::post('trDetailPb', [PermintaanBarangController::class, 'trDetailPb_add'])->name('trDetailPb.add')->middleware('auth');
Route::get('stInvPb/json', [PermintaanBarangController::class, 'stInvPb_data'])->name('stInvPb.data')->middleware('auth');
Route::get('trDetailPb/showedit/{id}', [PermintaanBarangController::class, 'showEdit'])->name('trDetailPb.showEdit')->middleware('auth');
Route::post('trDetailPb/edit', [PermintaanBarangController::class, 'trDetailPb_edit'])->name('trDetailPb.edit')->middleware('auth');
Route::post('trDetailPb/delete/', [PermintaanBarangController::class, 'trDetailPb_del'])->name('trDetailPb.del')->middleware('auth');

Route::get('trHeaderPindahGudang',[PindahGudangController::class, 'trHeaderPindahGudang'])->name('trHeaderPindahGudang')->middleware('auth');
Route::get('trHeaderPindahGudang/json', [PindahGudangController::class, 'trHeaderPindahGudang_data'])->name('trHeaderPindahGudang.data')->middleware('auth');
Route::post('trHeaderPindahGudang', [PindahGudangController::class, 'trHeaderPindahGudang_add'])->name('trHeaderPindahGudang.add')->middleware('auth');
Route::post('trHeaderPindahGudang/delete/', [PindahGudangController::class, 'trHeaderPindahGudangDestroy_del'])->name('trHeaderPindahGudangDestroy.del')->middleware('auth');

Route::get('trDetailPindahGudang/{id}', [PindahGudangController::class, 'trDetailPindahGudang'])->name('trDetailPindahGudang')->middleware('auth');
Route::post('trDetailPindahGudang', [PindahGudangController::class, 'trDetailPindahGudang_add'])->name('trDetailPindahGudang.add')->middleware('auth');
Route::get('stInvSa/json', [PindahGudangController::class, 'stInvSa_data'])->name('stInvSa.data')->middleware('auth');
Route::get('trDetailPindahGudang/showedit/{id}', [PindahGudangController::class, 'showEdit'])->name('trDetailPindahGudang.showEdit')->middleware('auth');
Route::post('trDetailPindahGudang/edit', [PindahGudangController::class, 'trDetailPindahGudang_edit'])->name('trDetailPindahGudang.edit')->middleware('auth');
Route::post('trDetailPindahGudang/delete/', [PindahGudangController::class, 'trDetailPindahGudang_del'])->name('trDetailPindahGudang.del')->middleware('auth');

Route::get('trHeaderPemakaianSpBbm',[PemakaianSpBbmController::class, 'trHeaderPemakaianSpBbm'])->name('trHeaderPemakaianSpBbm')->middleware('auth');
Route::get('trHeaderPemakaianSpBbm/json', [PemakaianSpBbmController::class, 'trHeaderPemakaianSpBbm_data'])->name('trHeaderPemakaianSpBbm.data')->middleware('auth');
Route::post('trHeaderPemakaianSpBbm', [PemakaianSpBbmController::class, 'trHeaderPemakaianSpBbm_add'])->name('trHeaderPemakaianSpBbm.add')->middleware('auth');
Route::post('trHeaderPemakaianSpBbm/delete/', [PemakaianSpBbmController::class, 'trHeaderPemakaianSpBbmDestroy_del'])->name('trHeaderPemakaianSpBbmDestroy.del')->middleware('auth');

Route::get('trDetailPemSpBbm/{id}', [PemakaianSpBbmController::class, 'trDetailPemSpBbm'])->name('trDetailPemSpBbm')->middleware('auth');
// Route::get('trDetailPemSpBbm/showinv', [PemakaianSpBbmController::class, 'showInv'])->name('trDetailPemSpBbm.showInv')->middleware('auth');
Route::get('stInvSpBbm/json', [PemakaianSpBbmController::class, 'stInvSpBbm_data'])->name('stInvSpBbm.data')->middleware('auth');
Route::get('stInvSpBbmx/json', [PemakaianSpBbmController::class, 'stInvSpBbm_data_x'])->name('stInvSpBbmx.data')->middleware('auth');
Route::post('trDetailPemSpBbm', [PemakaianSpBbmController::class, 'trDetailPemSpBbm_add'])->name('trDetailPemSpBbm.add')->middleware('auth');
Route::get('trDetailPemSpBbm/showedit/{id}', [PemakaianSpBbmController::class, 'showEdit'])->name('trDetailPemSpBbm.showEdit')->middleware('auth');
Route::post('trDetailPemSpBbm/edit', [PemakaianSpBbmController::class, 'trDetailPemSpBbm_edit'])->name('trDetailPemSpBbm.edit')->middleware('auth');
Route::post('trDetailPemSpBbm/delete/', [PemakaianSpBbmController::class, 'trDetailPemSpBbm_del'])->name('trDetailPemSpBbm.del')->middleware('auth');

Route::get('trHeaderPinGudSpBbm',[PinGudSpBbmController::class, 'trHeaderPinGudSpBbm'])->name('trHeaderPinGudSpBbm')->middleware('auth');
Route::get('trHeaderPinGudSpBbm/json', [PinGudSpBbmController::class, 'trHeaderPinGudSpBbm_data'])->name('trHeaderPinGudSpBbm.data')->middleware('auth');
Route::post('trHeaderPinGudSpBbm', [PinGudSpBbmController::class, 'trHeaderPinGudSpBbm_add'])->name('trHeaderPinGudSpBbm.add')->middleware('auth');
Route::post('trHeaderPinGudSpBbm/delete/', [PinGudSpBbmController::class, 'trHeaderPinGudSpBbmDestroy_del'])->name('trHeaderPinGudSpBbmDestroy.del')->middleware('auth');

Route::get('trHeaderPemakaianBbm',[PemakaianBbmController::class, 'trHeaderPemakaianBbm'])->name('trHeaderPemakaianBbm')->middleware('auth');
Route::get('trHeaderPemakaianBbm/json', [PemakaianBbmController::class, 'trHeaderPemakaianBbm_data'])->name('trHeaderPemakaianBbm.data')->middleware('auth');
Route::post('trHeaderPemakaianBbm', [PemakaianBbmController::class, 'trHeaderPemakaianBbm_add'])->name('trHeaderPemakaianBbm.add')->middleware('auth');
Route::post('trHeaderPemakaianBbm/delete/', [PemakaianBbmController::class, 'trHeaderPemakaianBbmDestroy_del'])->name('trHeaderPemakaianBbmDestroy.del')->middleware('auth');

Route::get('trDetailPemBbm/{id}', [PemakaianBbmController::class, 'trDetailPemBbm'])->name('trDetailPemBbm')->middleware('auth');
// Route::get('trDetailPemBbm/showinv', [PemakaianBbmController::class, 'showInv'])->name('trDetailPemBbm.showInv')->middleware('auth');
Route::get('stInvBbm/json', [PemakaianBbmController::class, 'stInvBbm_data'])->name('stInvBbm.data')->middleware('auth');
Route::post('trDetailPemBbm', [PemakaianBbmController::class, 'trDetailPemBbm_add'])->name('trDetailPemBbm.add')->middleware('auth');
Route::post('trDetailPemBbm/delete/', [PemakaianBbmController::class, 'trDetailPemBbm_del'])->name('trDetailPemBbm.del')->middleware('auth');

Route::get('stInvent',[StInventController::class, 'stInvent'])->name('stInvent')->middleware('auth');
Route::get('stInvent/json', [StInventController::class, 'stInvent_data'])->name('stInvent.data')->middleware('auth');
Route::get('stInvent/showedit/{id}', [StInventController::class, 'showEdit'])->name('stInvent.showEdit')->middleware('auth');
Route::post('stInvent', [StInventController::class, 'stInvent_add'])->name('stInvent.add')->middleware('auth');
Route::post('stInvent/edit', [StInventController::class, 'stInvent_edit'])->name('stInvent.edit')->middleware('auth');
Route::post('stInvent/delete/', [StInventController::class, 'stInvent_del'])->name('stInvent.del')->middleware('auth');
Route::post('stInvent/openlock/', [StInventController::class, 'stInvent_openlock'])->name('stInvent.openlock')->middleware('auth');

Route::get('processQty',[ProcessQtyController::class, 'processQty'])->name('processQty')->middleware('auth');

Route::get('trHistory',[UserController::class, 'trHistory'])->name('trHistory')->middleware('auth');
Route::get('trHistory/json', [UserController::class, 'trHistory_data'])->name('trHistory.data')->middleware('auth');
Route::get('periodeOperasional',[UserController::class, 'periodeOperasional'])->name('periodeOperasional')->middleware('auth');
Route::post('periodeOperasional', [UserController::class, 'periodeOperasional_add'])->name('periodeOperasional.add')->middleware('auth');
Route::get('periodeOperasional/{id_periode}', [UserController::class, 'periodeOperasional_actived'])->name('periodeOperasional.actived')->middleware('auth');

// --------- TPN LAMA --------------------//
Route::get('trHeaderTpnLm',[UserController::class, 'trHeaderTpnLm'])->name('trHeaderTpnLm')->middleware('auth');
Route::get('trHeaderTpnLm/json', [UserController::class, 'trHeaderTpnLm_data'])->name('trHeaderTpnLm.data')->middleware('auth');
Route::post('trHeaderTpnLm', [UserController::class, 'trHeaderTpnLm_add'])->name('trHeaderTpnLm.add')->middleware('auth');
Route::post('trHeaderTpnLm/delete/', [UserController::class, 'trHeaderTpnLmDestroy_del'])->name('trHeaderTpnLmDestroy.del')->middleware('auth');

Route::get('trDetailTpnLm/{id_header_tpn_in}', [UserController::class, 'trDetailTpnLm'])->name('trDetailTpnLm')->middleware('auth');
Route::post('trDetailTpnLm', [UserController::class, 'trDetailTpnLm_add'])->name('trDetailTpnLm.add')->middleware('auth');
Route::post('trDetailTpnLm/edit', [UserController::class, 'trDetailTpnLm_edit'])->name('trDetailTpnLm.edit')->middleware('auth');
Route::post('trDetailTpnLm/delete/', [UserController::class, 'trDetailTpnLm_del'])->name('trDetailTpnLm.del')->middleware('auth');

Route::get('trHeaderTpnLmOut',[UserController::class, 'trHeaderTpnLmOut'])->name('trHeaderTpnLmOut')->middleware('auth');
Route::get('trHeaderTpnLmOut/json', [UserController::class, 'trHeaderTpnLmOut_data'])->name('trHeaderTpnLmOut.data')->middleware('auth');
Route::post('trHeaderTpnLmOut', [UserController::class, 'trHeaderTpnLmOut_add'])->name('trHeaderTpnLmOut.add')->middleware('auth');
Route::post('trHeaderTpnLmOut/delete/', [UserController::class, 'trHeaderTpnLmOutDestroy_del'])->name('trHeaderTpnLmOutDestroy.del')->middleware('auth');

Route::get('trDetailTpnLmOut/{id_header_tpn_out}', [UserController::class, 'trDetailTpnLmOut'])->name('trDetailTpnLmOut')->middleware('auth');
Route::post('trDetailTpnLmOut', [UserController::class, 'trDetailTpnLmOut_add'])->name('trDetailTpnLmOut.add')->middleware('auth');
Route::post('trDetailTpnLmOut/delete/', [UserController::class, 'trDetailTpnLmOut_del'])->name('trDetailTpnLmOut.del')->middleware('auth');

Route::get('trHeaderTpk49OutLSD',[UserController::class, 'trHeaderTpk49OutLSD'])->name('trHeaderTpk49OutLSD')->middleware('auth');
Route::get('trHeaderTpk49OutLSD/json', [UserController::class, 'trHeaderTpk49OutLSD_data'])->name('trHeaderTpk49OutLSD.data')->middleware('auth');
Route::post('trHeaderTpk49OutLSD', [UserController::class, 'trHeaderTpk49OutLSD_add'])->name('trHeaderTpk49OutLSD.add')->middleware('auth');
Route::post('trHeaderTpk49OutLSD/delete/', [UserController::class, 'trHeaderTpk49OutLSDDestroy_del'])->name('trHeaderTpk49OutLSDDestroy.del')->middleware('auth');

Route::get('trDetailTpk49OutLSD/{id_header_tpn_out}', [UserController::class, 'trDetailTpk49OutLSD'])->name('trDetailTpk49OutLSD')->middleware('auth');
Route::post('trDetailTpk49OutLSD', [UserController::class, 'trDetailTpk49OutLSD_add'])->name('trDetailTpk49OutLSD.add')->middleware('auth');
Route::post('trDetailTpk49OutLSD/delete/', [UserController::class, 'trDetailTpk49OutLSD_del'])->name('trDetailTpk49OutLSD.del')->middleware('auth');

// --------- AQUA --------------------//
Route::get('trHeaderTpnAqua',[UserController::class, 'trHeaderTpnAqua'])->name('trHeaderTpnAqua')->middleware('auth');
Route::get('trHeaderTpnAqua/json', [UserController::class, 'trHeaderTpnAqua_data'])->name('trHeaderTpnAqua.data')->middleware('auth');
Route::post('trHeaderTpnAqua', [UserController::class, 'trHeaderTpnAqua_add'])->name('trHeaderTpnAqua.add')->middleware('auth');
Route::post('trHeaderTpnAqua/delete/', [UserController::class, 'trHeaderTpnAquaDestroy_del'])->name('trHeaderTpnAquaDestroy.del')->middleware('auth');

Route::get('trDetailTpnAqua/{id_header_tpn_in}', [UserController::class, 'trDetailTpnAqua'])->name('trDetailTpnAqua')->middleware('auth');
Route::post('trDetailTpnAqua', [UserController::class, 'trDetailTpnAqua_add'])->name('trDetailTpnAqua.add')->middleware('auth');
Route::post('trDetailTpnAqua/edit', [UserController::class, 'trDetailTpnAqua_edit'])->name('trDetailTpnAqua.edit')->middleware('auth');
Route::post('trDetailTpnAqua/delete/', [UserController::class, 'trDetailTpnAqua_del'])->name('trDetailTpnAqua.del')->middleware('auth');

Route::get('trHeaderTpnAquaOut',[UserController::class, 'trHeaderTpnAquaOut'])->name('trHeaderTpnAquaOut')->middleware('auth');
Route::get('trHeaderTpnAquaOut/json', [UserController::class, 'trHeaderTpnAquaOut_data'])->name('trHeaderTpnAquaOut.data')->middleware('auth');
Route::post('trHeaderTpnAquaOut', [UserController::class, 'trHeaderTpnAquaOut_add'])->name('trHeaderTpnAquaOut.add')->middleware('auth');
Route::post('trHeaderTpnAquaOut/delete/', [UserController::class, 'trHeaderTpnAquaOutDestroy_del'])->name('trHeaderTpnAquaOutDestroy.del')->middleware('auth');

Route::get('trDetailTpnAquaOut/{id_header_tpn_out}', [UserController::class, 'trDetailTpnAquaOut'])->name('trDetailTpnAquaOut')->middleware('auth');
Route::post('trDetailTpnAquaOut', [UserController::class, 'trDetailTpnAquaOut_add'])->name('trDetailTpnAquaOut.add')->middleware('auth');
Route::post('trDetailTpnAquaOut/delete/', [UserController::class, 'trDetailTpnAquaOut_del'])->name('trDetailTpnAquaOut.del')->middleware('auth');

Route::get('trHeaderTpkAquaOutLSD',[UserController::class, 'trHeaderTpkAquaOutLSD'])->name('trHeaderTpkAquaOutLSD')->middleware('auth');
Route::get('trHeaderTpkAquaOutLSD/json', [UserController::class, 'trHeaderTpkAquaOutLSD_data'])->name('trHeaderTpkAquaOutLSD.data')->middleware('auth');
Route::post('trHeaderTpkAquaOutLSD', [UserController::class, 'trHeaderTpkAquaOutLSD_add'])->name('trHeaderTpkAquaOutLSD.add')->middleware('auth');
Route::post('trHeaderTpkAquaOutLSD/delete/', [UserController::class, 'trHeaderTpkAquaOutLSDDestroy_del'])->name('trHeaderTpkAquaOutLSDDestroy.del')->middleware('auth');

Route::get('trDetailTpkAquaOutLSD/{id_header_tpn_out}', [UserController::class, 'trDetailTpkAquaOutLSD'])->name('trDetailTpkAquaOutLSD')->middleware('auth');
Route::post('trDetailTpkAquaOutLSD', [UserController::class, 'trDetailTpkAquaOutLSD_add'])->name('trDetailTpkAquaOutLSD.add')->middleware('auth');
Route::post('trDetailTpkAquaOutLSD/delete/', [UserController::class, 'trDetailTpkAquaOutLSD_del'])->name('trDetailTpkAquaOutLSD.del')->middleware('auth');

Route::get('trHeaderSangaiDrtOutSangaiAir',[UserController::class, 'trHeaderSangaiDrtOutSangaiAir'])->name('trHeaderSangaiDrtOutSangaiAir')->middleware('auth');
Route::get('trHeaderSangaiDrtOutSangaiAir/json', [UserController::class, 'trHeaderSangaiDrtOutSangaiAir_data'])->name('trHeaderSangaiDrtOutSangaiAir.data')->middleware('auth');
Route::post('trHeaderSangaiDrtOutSangaiAir', [UserController::class, 'trHeaderSangaiDrtOutSangaiAir_add'])->name('trHeaderSangaiDrtOutSangaiAir.add')->middleware('auth');
Route::post('trHeaderSangaiDrtOutSangaiAir/delete/', [UserController::class, 'trHeaderSangaiDrtOutSangaiAirDestroy_del'])->name('trHeaderSangaiDrtOutSangaiAirDestroy.del')->middleware('auth');

Route::get('trDetailSangaiDrtOutSangaiAir/{id_header_tpn_out}', [UserController::class, 'trDetailSangaiDrtOutSangaiAir'])->name('trDetailSangaiDrtOutSangaiAir')->middleware('auth');
Route::post('trDetailSangaiDrtOutSangaiAir', [UserController::class, 'trDetailSangaiDrtOutSangaiAir_add'])->name('trDetailSangaiDrtOutSangaiAir.add')->middleware('auth');
Route::post('trDetailSangaiDrtOutSangaiAir/delete/', [UserController::class, 'trDetailSangaiDrtOutSangaiAir_del'])->name('trDetailSangaiDrtOutSangaiAir.del')->middleware('auth');

Route::get('trHeaderSangaiAirOutTanjung',[UserController::class, 'trHeaderSangaiAirOutTanjung'])->name('trHeaderSangaiAirOutTanjung')->middleware('auth');
Route::get('trHeaderSangaiAirOutTanjung/json', [UserController::class, 'trHeaderSangaiAirOutTanjung_data'])->name('trHeaderSangaiAirOutTanjung.data')->middleware('auth');
Route::post('trHeaderSangaiAirOutTanjung', [UserController::class, 'trHeaderSangaiAirOutTanjung_add'])->name('trHeaderSangaiAirOutTanjung.add')->middleware('auth');
Route::post('trHeaderSangaiAirOutTanjung/delete/', [UserController::class, 'trHeaderSangaiAirOutTanjungDestroy_del'])->name('trHeaderSangaiAirOutTanjungDestroy.del')->middleware('auth');

Route::get('trDetailSangaiAirOutTanjung/{id_header_tpn_out}', [UserController::class, 'trDetailSangaiAirOutTanjung'])->name('trDetailSangaiAirOutTanjung')->middleware('auth');
Route::post('trDetailSangaiAirOutTanjung', [UserController::class, 'trDetailSangaiAirOutTanjung_add'])->name('trDetailSangaiAirOutTanjung.add')->middleware('auth');
Route::post('trDetailSangaiAirOutTanjung/delete/', [UserController::class, 'trDetailSangaiAirOutTanjung_del'])->name('trDetailSangaiAirOutTanjung.del')->middleware('auth');

Route::get('trHeaderSangaiAirOutHanj',[UserController::class, 'trHeaderSangaiAirOutHanj'])->name('trHeaderSangaiAirOutHanj')->middleware('auth');
Route::get('trHeaderSangaiAirOutHanj/json', [UserController::class, 'trHeaderSangaiAirOutHanj_data'])->name('trHeaderSangaiAirOutHanj.data')->middleware('auth');
Route::post('trHeaderSangaiAirOutHanj', [UserController::class, 'trHeaderSangaiAirOutHanj_add'])->name('trHeaderSangaiAirOutHanj.add')->middleware('auth');
Route::post('trHeaderSangaiAirOutHanj/delete/', [UserController::class, 'trHeaderSangaiAirOutHanjDestroy_del'])->name('trHeaderSangaiAirOutHanjDestroy.del')->middleware('auth');

Route::get('trDetailSangaiAirOutHanj/{id_header_tpn_out}', [UserController::class, 'trDetailSangaiAirOutHanj'])->name('trDetailSangaiAirOutHanj')->middleware('auth');
Route::post('trDetailSangaiAirOutHanj', [UserController::class, 'trDetailSangaiAirOutHanj_add'])->name('trDetailSangaiAirOutHanj.add')->middleware('auth');
Route::post('trDetailSangaiAirOutHanj/delete/', [UserController::class, 'trDetailSangaiAirOutHanj_del'])->name('trDetailSangaiAirOutHanj.del')->middleware('auth');

Route::get('trHeaderSangaiDrtOutTanjung',[UserController::class, 'trHeaderSangaiDrtOutTanjung'])->name('trHeaderSangaiDrtOutTanjung')->middleware('auth');
Route::get('trHeaderSangaiDrtOutTanjung/json', [UserController::class, 'trHeaderSangaiDrtOutTanjung_data'])->name('trHeaderSangaiDrtOutTanjung.data')->middleware('auth');
Route::post('trHeaderSangaiDrtOutTanjung', [UserController::class, 'trHeaderSangaiDrtOutTanjung_add'])->name('trHeaderSangaiDrtOutTanjung.add')->middleware('auth');
Route::post('trHeaderSangaiDrtOutTanjung/delete/', [UserController::class, 'trHeaderSangaiDrtOutTanjungDestroy_del'])->name('trHeaderSangaiDrtOutTanjungDestroy.del')->middleware('auth');

Route::get('trDetailSangaiDrtOutTanjung/{id_header_tpn_out}', [UserController::class, 'trDetailSangaiDrtOutTanjung'])->name('trDetailSangaiDrtOutTanjung')->middleware('auth');
Route::post('trDetailSangaiDrtOutTanjung', [UserController::class, 'trDetailSangaiDrtOutTanjung_add'])->name('trDetailSangaiDrtOutTanjung.add')->middleware('auth');
Route::post('trDetailSangaiDrtOutTanjung/delete/', [UserController::class, 'trDetailSangaiDrtOutTanjung_del'])->name('trDetailSangaiDrtOutTanjung.del')->middleware('auth');

Route::get('trHeaderTanjungOutKabuauDrt',[UserController::class, 'trHeaderTanjungOutKabuauDrt'])->name('trHeaderTanjungOutKabuauDrt')->middleware('auth');
Route::get('trHeaderTanjungOutKabuauDrt/json', [UserController::class, 'trHeaderTanjungOutKabuauDrt_data'])->name('trHeaderTanjungOutKabuauDrt.data')->middleware('auth');
Route::post('trHeaderTanjungOutKabuauDrt', [UserController::class, 'trHeaderTanjungOutKabuauDrt_add'])->name('trHeaderTanjungOutKabuauDrt.add')->middleware('auth');
Route::post('trHeaderTanjungOutKabuauDrt/delete/', [UserController::class, 'trHeaderTanjungOutKabuauDrtDestroy_del'])->name('trHeaderTanjungOutKabuauDrtDestroy.del')->middleware('auth');

Route::get('trDetailTanjungOutKabuauDrt/{id_header_tpn_out}', [UserController::class, 'trDetailTanjungOutKabuauDrt'])->name('trDetailTanjungOutKabuauDrt')->middleware('auth');
Route::post('trDetailTanjungOutKabuauDrt', [UserController::class, 'trDetailTanjungOutKabuauDrt_add'])->name('trDetailTanjungOutKabuauDrt.add')->middleware('auth');
Route::post('trDetailTanjungOutKabuauDrt/delete/', [UserController::class, 'trDetailTanjungOutKabuauDrt_del'])->name('trDetailTanjungOutKabuauDrt.del')->middleware('auth');

Route::get('trHeaderKabuauDrtOutKabuauAir',[UserController::class, 'trHeaderKabuauDrtOutKabuauAir'])->name('trHeaderKabuauDrtOutKabuauAir')->middleware('auth');
Route::get('trHeaderKabuauDrtOutKabuauAir/json', [UserController::class, 'trHeaderKabuauDrtOutKabuauAir_data'])->name('trHeaderKabuauDrtOutKabuauAir.data')->middleware('auth');
Route::post('trHeaderKabuauDrtOutKabuauAir', [UserController::class, 'trHeaderKabuauDrtOutKabuauAir_add'])->name('trHeaderKabuauDrtOutKabuauAir.add')->middleware('auth');
Route::post('trHeaderKabuauDrtOutKabuauAir/delete/', [UserController::class, 'trHeaderKabuauDrtOutKabuauAirDestroy_del'])->name('trHeaderKabuauDrtOutKabuauAirDestroy.del')->middleware('auth');

Route::get('trDetailKabuauDrtOutKabuauAir/{id_header_tpn_out}', [UserController::class, 'trDetailKabuauDrtOutKabuauAir'])->name('trDetailKabuauDrtOutKabuauAir')->middleware('auth');
Route::post('trDetailKabuauDrtOutKabuauAir', [UserController::class, 'trDetailKabuauDrtOutKabuauAir_add'])->name('trDetailKabuauDrtOutKabuauAir.add')->middleware('auth');
Route::post('trDetailKabuauDrtOutKabuauAir/delete/', [UserController::class, 'trDetailKabuauDrtOutKabuauAir_del'])->name('trDetailKabuauDrtOutKabuauAir.del')->middleware('auth');

Route::get('trHeaderKabuauAirOutTongkang',[UserController::class, 'trHeaderKabuauAirOutTongkang'])->name('trHeaderKabuauAirOutTongkang')->middleware('auth');
Route::get('trHeaderKabuauAirOutTongkang/json', [UserController::class, 'trHeaderKabuauAirOutTongkang_data'])->name('trHeaderKabuauAirOutTongkang.data')->middleware('auth');
Route::post('trHeaderKabuauAirOutTongkang', [UserController::class, 'trHeaderKabuauAirOutTongkang_add'])->name('trHeaderKabuauAirOutTongkang.add')->middleware('auth');
Route::post('trHeaderKabuauAirOutTongkang/delete/', [UserController::class, 'trHeaderKabuauAirOutTongkangDestroy_del'])->name('trHeaderKabuauAirOutTongkangDestroy.del')->middleware('auth');

Route::get('trDetailKabuauAirOutTongkang/{id_header_tpn_out}', [UserController::class, 'trDetailKabuauAirOutTongkang'])->name('trDetailKabuauAirOutTongkang')->middleware('auth');
Route::post('trDetailKabuauAirOutTongkang', [UserController::class, 'trDetailKabuauAirOutTongkang_add'])->name('trDetailKabuauAirOutTongkang.add')->middleware('auth');
Route::post('trDetailKabuauAirOutTongkang/delete/', [UserController::class, 'trDetailKabuauAirOutTongkang_del'])->name('trDetailKabuauAirOutTongkang.del')->middleware('auth');

Route::get('trHeaderKabuauAirOutHanj',[UserController::class, 'trHeaderKabuauAirOutHanj'])->name('trHeaderKabuauAirOutHanj')->middleware('auth');
Route::get('trHeaderKabuauAirOutHanj/json', [UserController::class, 'trHeaderKabuauAirOutHanj_data'])->name('trHeaderKabuauAirOutHanj.data')->middleware('auth');
Route::post('trHeaderKabuauAirOutHanj', [UserController::class, 'trHeaderKabuauAirOutHanj_add'])->name('trHeaderKabuauAirOutHanj.add')->middleware('auth');
Route::post('trHeaderKabuauAirOutHanj/delete/', [UserController::class, 'trHeaderKabuauAirOutHanjDestroy_del'])->name('trHeaderKabuauAirOutHanjDestroy.del')->middleware('auth');

Route::get('trDetailKabuauAirOutHanj/{id_header_tpn_out}', [UserController::class, 'trDetailKabuauAirOutHanj'])->name('trDetailKabuauAirOutHanj')->middleware('auth');
Route::post('trDetailKabuauAirOutHanj', [UserController::class, 'trDetailKabuauAirOutHanj_add'])->name('trDetailKabuauAirOutHanj.add')->middleware('auth');
Route::post('trDetailKabuauAirOutHanj/delete/', [UserController::class, 'trDetailKabuauAirOutHanj_del'])->name('trDetailKabuauAirOutHanj.del')->middleware('auth');

Route::get('trHeaderKabuauDrtOutTongkang',[UserController::class, 'trHeaderKabuauDrtOutTongkang'])->name('trHeaderKabuauDrtOutTongkang')->middleware('auth');
Route::get('trHeaderKabuauDrtOutTongkang/json', [UserController::class, 'trHeaderKabuauDrtOutTongkang_data'])->name('trHeaderKabuauDrtOutTongkang.data')->middleware('auth');
Route::post('trHeaderKabuauDrtOutTongkang', [UserController::class, 'trHeaderKabuauDrtOutTongkang_add'])->name('trHeaderKabuauDrtOutTongkang.add')->middleware('auth');
Route::post('trHeaderKabuauDrtOutTongkang/delete/', [UserController::class, 'trHeaderKabuauDrtOutTongkangDestroy_del'])->name('trHeaderKabuauDrtOutTongkangDestroy.del')->middleware('auth');

Route::get('trDetailKabuauDrtOutTongkang/{id_header_tpn_out}', [UserController::class, 'trDetailKabuauDrtOutTongkang'])->name('trDetailKabuauDrtOutTongkang')->middleware('auth');
Route::post('trDetailKabuauDrtOutTongkang', [UserController::class, 'trDetailKabuauDrtOutTongkang_add'])->name('trDetailKabuauDrtOutTongkang.add')->middleware('auth');
Route::post('trDetailKabuauDrtOutTongkang/delete/', [UserController::class, 'trDetailKabuauDrtOutTongkang_del'])->name('trDetailKabuauDrtOutTongkang.del')->middleware('auth');

Route::get('trHeaderHanjaOutTongkang',[UserController::class, 'trHeaderHanjaOutTongkang'])->name('trHeaderHanjaOutTongkang')->middleware('auth');
Route::get('trHeaderHanjaOutTongkang/json', [UserController::class, 'trHeaderHanjaOutTongkang_data'])->name('trHeaderHanjaOutTongkang.data')->middleware('auth');
Route::post('trHeaderHanjaOutTongkang', [UserController::class, 'trHeaderHanjaOutTongkang_add'])->name('trHeaderHanjaOutTongkang.add')->middleware('auth');
Route::post('trHeaderHanjaOutTongkang/delete/', [UserController::class, 'trHeaderHanjaOutTongkangDestroy_del'])->name('trHeaderHanjaOutTongkangDestroy.del')->middleware('auth');

Route::get('trDetailHanjaOutTongkang/{id_header_tpn_out}', [UserController::class, 'trDetailHanjaOutTongkang'])->name('trDetailHanjaOutTongkang')->middleware('auth');
Route::post('trDetailHanjaOutTongkang', [UserController::class, 'trDetailHanjaOutTongkang_add'])->name('trDetailHanjaOutTongkang.add')->middleware('auth');
Route::post('trDetailHanjaOutTongkang/delete/', [UserController::class, 'trDetailHanjaOutTongkang_del'])->name('trDetailHanjaOutTongkang.del')->middleware('auth');

Route::get('trTongkang',[UserController::class, 'trTongkang'])->name('trTongkang')->middleware('auth');
Route::get('trTongkang/json', [UserController::class, 'trTongkang_data'])->name('trTongkang.data')->middleware('auth');
Route::get('trLoglistModal/json', [UserController::class, 'trLoglistModal_data'])->name('trLoglistModal.data')->middleware('auth');
Route::post('trLoglistModal/edit/', [UserController::class, 'trLoglistModal_edit'])->name('trLoglistModal.edit')->middleware('auth');
Route::get('trLogListTkg/{no_loglist}', [UserController::class, 'trLogListTkg'])->name('trLogListTkg')->middleware('auth');

// ------------------ Reporting --------------------------------//
Route::get('rptStokKayu',[UserController::class, 'rptStokKayu'])->name('rptStokKayu')->middleware('auth');
Route::post('rptStokKayu', [UserController::class, 'rptStokKayu_rpt'])->name('rptStokKayu.rpt')->middleware('auth');

Route::get('rptChainTrack',[UserController::class, 'rptChainTrack'])->name('rptChainTrack')->middleware('auth');
Route::post('rptChainTrack', [UserController::class, 'rptChainTrack_rpt'])->name('rptChainTrack.rpt')->middleware('auth');

Route::get('rptLoglistLoc',[UserController::class, 'rptLoglistLoc'])->name('rptLoglistLoc')->middleware('auth');
Route::post('rptLoglistLoc', [UserController::class, 'rptLoglistLoc_rpt'])->name('rptLoglistLoc.rpt')->middleware('auth');

Route::get('rptStokLoc',[UserController::class, 'rptStokLoc'])->name('rptStokLoc')->middleware('auth');
Route::post('rptStokLoc', [UserController::class, 'rptStokLoc_rpt'])->name('rptStokLoc.rpt')->middleware('auth');

Route::get('rptRekapHauling',[UserController::class, 'rptRekapHauling'])->name('rptRekapHauling')->middleware('auth');
Route::post('rptRekapHauling', [UserController::class, 'rptRekapHauling_rpt'])->name('rptRekapHauling.rpt')->middleware('auth');

Route::get('rptRekapTkg',[UserController::class, 'rptRekapTkg'])->name('rptRekapTkg')->middleware('auth');
Route::post('rptRekapTkg', [UserController::class, 'rptRekapTkg_rpt'])->name('rptRekapTkg.rpt')->middleware('auth');

Route::get('rptStokAkhGab',[UserController::class, 'rptStokAkhGab'])->name('rptStokAkhGab')->middleware('auth');
Route::post('rptStokAkhGab', [UserController::class, 'rptStokAkhGab_rpt'])->name('rptStokAkhGab.rpt')->middleware('auth');


Route::get('password', [UserController::class, 'password'])->name('password');
Route::post('password', [UserController::class, 'password_action'])->name('password.action');

Route::get('logout', [UserController::class, 'logout'])->name('logout');
Route::get('/{any}',[UserController::class, 'logout']);
