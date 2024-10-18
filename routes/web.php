<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PermintaanBarangController;
use App\Http\Controllers\PindahGudangController;
use App\Http\Controllers\ReturPemakaianController;
use App\Http\Controllers\KoreksiSoController;
use App\Http\Controllers\HistPemakaianController;
use App\Http\Controllers\StInventController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProcessQtyController;
use App\Http\Controllers\ProcessGlobalController;
use App\Http\Controllers\PemakaianSpBbmController;
use App\Http\Controllers\PinGudSpBbmController;
use App\Http\Controllers\RetPemSpBbmController;
use App\Http\Controllers\KoreksiSpBbmController;
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
use App\Http\Controllers\Reporting\SpRekMuStokController;
use App\Http\Controllers\Reporting\SpRincMuStokController;
use App\Http\Controllers\Reporting\SpPenerimaanController;
use App\Http\Controllers\Reporting\SpRekPemPerUnitController;
use App\Http\Controllers\Reporting\SpRincPemPerUnitController;
use App\Http\Controllers\Reporting\SpInventarisController;
use App\Http\Controllers\Reporting\SpChainsawmanController;
use App\Http\Controllers\Reporting\SpMovingController;
use App\Http\Controllers\Reporting\BbmPenerimaanController;
use App\Http\Controllers\Reporting\BbmRekMuStokController;
use App\Http\Controllers\Reporting\BbmRekPemPerUnitController;
use App\Http\Controllers\Reporting\BbmBantuanController;
use App\Http\Controllers\Reporting\BbmRincPemPerUnitController;
use App\Http\Controllers\Reporting\BbmRincPemPerUnitPerHariController;

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
Route::get('fixedAsset/showedit/{id}', [FixedAssetController::class, 'showEditFa'])->name('fixedAsset.showEditFa')->middleware('auth');
Route::post('fixedAsset/edit', [FixedAssetController::class, 'fixedAsset_edit'])->name('fixedAsset.edit')->middleware('auth');


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
Route::get('trHeaderPb/showedit/{id}', [PermintaanBarangController::class, 'showEditHead'])->name('trHeaderPb.showEditHead')->middleware('auth');
Route::post('trHeaderPb/edit', [PermintaanBarangController::class, 'trHeaderPb_edit'])->name('trHeaderPb.edit')->middleware('auth');
Route::post('trHeaderPb/delete/', [PermintaanBarangController::class, 'trHeaderPbDestroy_del'])->name('trHeaderPbDestroy.del')->middleware('auth');

Route::get('trDetailPb/{id}', [PermintaanBarangController::class, 'trDetailPb'])->name('trDetailPb')->middleware('auth');
Route::post('trDetailPb', [PermintaanBarangController::class, 'trDetailPb_add'])->name('trDetailPb.add')->middleware('auth');
Route::get('stInvPb/json', [PermintaanBarangController::class, 'stInvPb_data'])->name('stInvPb.data')->middleware('auth');
Route::get('trDetailPb/showedit/{id}', [PermintaanBarangController::class, 'showEdit'])->name('trDetailPb.showEdit')->middleware('auth');
Route::post('trDetailPb/edit', [PermintaanBarangController::class, 'trDetailPb_edit'])->name('trDetailPb.edit')->middleware('auth');
Route::post('trDetailPb/delete/', [PermintaanBarangController::class, 'trDetailPb_del'])->name('trDetailPb.del')->middleware('auth');
Route::get('printPb/{id}', [PermintaanBarangController::class, 'printPb_rpt'])->name('printPb')->middleware('auth');

Route::get('trHeaderPindahGudang',[PindahGudangController::class, 'trHeaderPindahGudang'])->name('trHeaderPindahGudang')->middleware('auth');
Route::get('trHeaderPindahGudang/json', [PindahGudangController::class, 'trHeaderPindahGudang_data'])->name('trHeaderPindahGudang.data')->middleware('auth');
Route::post('trHeaderPindahGudang', [PindahGudangController::class, 'trHeaderPindahGudang_add'])->name('trHeaderPindahGudang.add')->middleware('auth');
Route::get('trHeaderPindahGudang/showedit/{id}', [PindahGudangController::class, 'showEditHead'])->name('trHeaderPindahGudang.showEditHead')->middleware('auth');
Route::post('trHeaderPindahGudang/edit', [PindahGudangController::class, 'trHeaderPindahGudang_edit'])->name('trHeaderPindahGudang.edit')->middleware('auth');
Route::post('trHeaderPindahGudang/delete/', [PindahGudangController::class, 'trHeaderPindahGudangDestroy_del'])->name('trHeaderPindahGudangDestroy.del')->middleware('auth');

Route::get('trDetailPindahGudang/{id}', [PindahGudangController::class, 'trDetailPindahGudang'])->name('trDetailPindahGudang')->middleware('auth');
Route::post('trDetailPindahGudang', [PindahGudangController::class, 'trDetailPindahGudang_add'])->name('trDetailPindahGudang.add')->middleware('auth');
Route::get('stInvSa/json', [PindahGudangController::class, 'stInvSa_data'])->name('stInvSa.data')->middleware('auth');
Route::get('trDetailPindahGudang/showedit/{id}', [PindahGudangController::class, 'showEdit'])->name('trDetailPindahGudang.showEdit')->middleware('auth');
Route::post('trDetailPindahGudang/edit', [PindahGudangController::class, 'trDetailPindahGudang_edit'])->name('trDetailPindahGudang.edit')->middleware('auth');
Route::post('trDetailPindahGudang/delete/', [PindahGudangController::class, 'trDetailPindahGudang_del'])->name('trDetailPindahGudang.del')->middleware('auth');

Route::get('trHeaderReturPemakaian',[ReturPemakaianController::class, 'trHeaderReturPemakaian'])->name('trHeaderReturPemakaian')->middleware('auth');
Route::get('trHeaderReturPemakaian/json', [ReturPemakaianController::class, 'trHeaderReturPemakaian_data'])->name('trHeaderReturPemakaian.data')->middleware('auth');
Route::post('trHeaderReturPemakaian', [ReturPemakaianController::class, 'trHeaderReturPemakaian_add'])->name('trHeaderReturPemakaian.add')->middleware('auth');
Route::post('trHeaderReturPemakaian/delete/', [ReturPemakaianController::class, 'trHeaderReturPemakaianDestroy_del'])->name('trHeaderReturPemakaianDestroy.del')->middleware('auth');

Route::get('trDetailReturPemakaian/{id}', [ReturPemakaianController::class, 'trDetailReturPemakaian'])->name('trDetailReturPemakaian')->middleware('auth');
Route::post('trDetailReturPemakaian', [ReturPemakaianController::class, 'trDetailReturPemakaian_add'])->name('trDetailReturPemakaian.add')->middleware('auth');
Route::get('stInvReturPemakaian/json', [ReturPemakaianController::class, 'stInvReturPemakaian_data'])->name('stInvReturPemakaian.data')->middleware('auth');
Route::get('stInvReturPemakaianx/json', [ReturPemakaianController::class, 'stInvReturPemakaian_data_x'])->name('stInvReturPemakaianx.data')->middleware('auth');
Route::get('trDetailReturPemakaian/showedit/{id}', [ReturPemakaianController::class, 'showEdit'])->name('trDetailReturPemakaian.showEdit')->middleware('auth');
Route::post('trDetailReturPemakaian/edit', [ReturPemakaianController::class, 'trDetailReturPemakaian_edit'])->name('trDetailReturPemakaian.edit')->middleware('auth');
Route::post('trDetailReturPemakaian/delete/', [ReturPemakaianController::class, 'trDetailReturPemakaian_del'])->name('trDetailReturPemakaian.del')->middleware('auth');

Route::get('trHeaderKoreksiSo',[KoreksiSoController::class, 'trHeaderKoreksiSo'])->name('trHeaderKoreksiSo')->middleware('auth');
Route::get('trHeaderKoreksiSo/json', [KoreksiSoController::class, 'trHeaderKoreksiSo_data'])->name('trHeaderKoreksiSo.data')->middleware('auth');
Route::post('trHeaderKoreksiSo', [KoreksiSoController::class, 'trHeaderKoreksiSo_add'])->name('trHeaderKoreksiSo.add')->middleware('auth');
Route::post('trHeaderKoreksiSo/delete/', [KoreksiSoController::class, 'trHeaderKoreksiSoDestroy_del'])->name('trHeaderKoreksiSoDestroy.del')->middleware('auth');

Route::get('trDetailKoreksiSo/{id}', [KoreksiSoController::class, 'trDetailKoreksiSo'])->name('trDetailKoreksiSo')->middleware('auth');
Route::post('trDetailKoreksiSo', [KoreksiSoController::class, 'trDetailKoreksiSo_add'])->name('trDetailKoreksiSo.add')->middleware('auth');
Route::get('stInvKoreksiSo/json', [KoreksiSoController::class, 'stInvKoreksiSo_data'])->name('stInvKoreksiSo.data')->middleware('auth');
Route::get('stInvKoreksiSox/json', [KoreksiSoController::class, 'stInvKoreksiSo_data_x'])->name('stInvKoreksiSox.data')->middleware('auth');
Route::get('trDetailKoreksiSo/showedit/{id}', [KoreksiSoController::class, 'showEdit'])->name('trDetailKoreksiSo.showEdit')->middleware('auth');
Route::post('trDetailKoreksiSo/edit', [KoreksiSoController::class, 'trDetailKoreksiSo_edit'])->name('trDetailKoreksiSo.edit')->middleware('auth');
Route::post('trDetailKoreksiSo/delete/', [KoreksiSoController::class, 'trDetailKoreksiSo_del'])->name('trDetailKoreksiSo.del')->middleware('auth');

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

Route::get('trDetailPinGudSpBbm/{id}', [PinGudSpBbmController::class, 'trDetailPinGudSpBbm'])->name('trDetailPinGudSpBbm')->middleware('auth');
Route::get('stInvPgSpBbm/json', [PinGudSpBbmController::class, 'stInvPgSpBbm_data'])->name('stInvPgSpBbm.data')->middleware('auth');
Route::get('stInvPgSpBbmx/json', [PinGudSpBbmController::class, 'stInvPgSpBbm_data_x'])->name('stInvPgSpBbmx.data')->middleware('auth');
Route::post('trDetailPinGudSpBbm', [PinGudSpBbmController::class, 'trDetailPinGudSpBbm_add'])->name('trDetailPinGudSpBbm.add')->middleware('auth');
Route::get('trDetailPinGudSpBbm/showedit/{id}', [PinGudSpBbmController::class, 'showEdit'])->name('trDetailPinGudSpBbm.showEdit')->middleware('auth');
Route::post('trDetailPinGudSpBbm/edit', [PinGudSpBbmController::class, 'trDetailPinGudSpBbm_edit'])->name('trDetailPinGudSpBbm.edit')->middleware('auth');
Route::post('trDetailPinGudSpBbm/delete/', [PinGudSpBbmController::class, 'trDetailPinGudSpBbm_del'])->name('trDetailPinGudSpBbm.del')->middleware('auth');

Route::get('trHeaderRetPemSpBbm',[RetPemSpBbmController::class, 'trHeaderRetPemSpBbm'])->name('trHeaderRetPemSpBbm')->middleware('auth');
Route::get('trHeaderRetPemSpBbm/json', [RetPemSpBbmController::class, 'trHeaderRetPemSpBbm_data'])->name('trHeaderRetPemSpBbm.data')->middleware('auth');
Route::post('trHeaderRetPemSpBbm', [RetPemSpBbmController::class, 'trHeaderRetPemSpBbm_add'])->name('trHeaderRetPemSpBbm.add')->middleware('auth');
Route::post('trHeaderRetPemSpBbm/delete/', [RetPemSpBbmController::class, 'trHeaderRetPemSpBbmDestroy_del'])->name('trHeaderRetPemSpBbmDestroy.del')->middleware('auth');

Route::get('trDetailRetPemSpBbm/{id}', [RetPemSpBbmController::class, 'trDetailRetPemSpBbm'])->name('trDetailRetPemSpBbm')->middleware('auth');
Route::get('stInvRpSpBbm/json', [RetPemSpBbmController::class, 'stInvRpSpBbm_data'])->name('stInvRpSpBbm.data')->middleware('auth');
Route::get('stInvRpSpBbmx/json', [RetPemSpBbmController::class, 'stInvRpSpBbm_data_x'])->name('stInvRpSpBbmx.data')->middleware('auth');
Route::post('trDetailRetPemSpBbm', [RetPemSpBbmController::class, 'trDetailRetPemSpBbm_add'])->name('trDetailRetPemSpBbm.add')->middleware('auth');
Route::get('trDetailRetPemSpBbm/showedit/{id}', [RetPemSpBbmController::class, 'showEdit'])->name('trDetailRetPemSpBbm.showEdit')->middleware('auth');
Route::post('trDetailRetPemSpBbm/edit', [RetPemSpBbmController::class, 'trDetailRetPemSpBbm_edit'])->name('trDetailRetPemSpBbm.edit')->middleware('auth');
Route::post('trDetailRetPemSpBbm/delete/', [RetPemSpBbmController::class, 'trDetailRetPemSpBbm_del'])->name('trDetailRetPemSpBbm.del')->middleware('auth');

Route::get('trHeaderKoreksiSpBbm',[KoreksiSpBbmController::class, 'trHeaderKoreksiSpBbm'])->name('trHeaderKoreksiSpBbm')->middleware('auth');
Route::get('trHeaderKoreksiSpBbm/json', [KoreksiSpBbmController::class, 'trHeaderKoreksiSpBbm_data'])->name('trHeaderKoreksiSpBbm.data')->middleware('auth');
Route::post('trHeaderKoreksiSpBbm', [KoreksiSpBbmController::class, 'trHeaderKoreksiSpBbm_add'])->name('trHeaderKoreksiSpBbm.add')->middleware('auth');
Route::post('trHeaderKoreksiSpBbm/delete/', [KoreksiSpBbmController::class, 'trHeaderKoreksiSpBbmDestroy_del'])->name('trHeaderKoreksiSpBbmDestroy.del')->middleware('auth');

Route::get('trDetailKoreksiSpBbm/{id}', [KoreksiSpBbmController::class, 'trDetailKoreksiSpBbm'])->name('trDetailKoreksiSpBbm')->middleware('auth');
Route::get('stInvKoreksiSpBbm/json', [KoreksiSpBbmController::class, 'stInvKoreksiSpBbm_data'])->name('stInvKoreksiSpBbm.data')->middleware('auth');
Route::get('stInvKoreksiSpBbmx/json', [KoreksiSpBbmController::class, 'stInvKoreksiSpBbm_data_x'])->name('stInvKoreksiSpBbmx.data')->middleware('auth');
Route::post('trDetailKoreksiSpBbm', [KoreksiSpBbmController::class, 'trDetailKoreksiSpBbm_add'])->name('trDetailKoreksiSpBbm.add')->middleware('auth');
Route::get('trDetailKoreksiSpBbm/showedit/{id}', [KoreksiSpBbmController::class, 'showEdit'])->name('trDetailKoreksiSpBbm.showEdit')->middleware('auth');
Route::post('trDetailKoreksiSpBbm/edit', [KoreksiSpBbmController::class, 'trDetailKoreksiSpBbm_edit'])->name('trDetailKoreksiSpBbm.edit')->middleware('auth');
Route::post('trDetailKoreksiSpBbm/delete/', [KoreksiSpBbmController::class, 'trDetailKoreksiSpBbm_del'])->name('trDetailKoreksiSpBbm.del')->middleware('auth');

Route::get('trHeaderPemakaianBbm',[PemakaianBbmController::class, 'trHeaderPemakaianBbm'])->name('trHeaderPemakaianBbm')->middleware('auth');
Route::get('trHeaderPemakaianBbm/json', [PemakaianBbmController::class, 'trHeaderPemakaianBbm_data'])->name('trHeaderPemakaianBbm.data')->middleware('auth');
Route::post('trHeaderPemakaianBbm', [PemakaianBbmController::class, 'trHeaderPemakaianBbm_add'])->name('trHeaderPemakaianBbm.add')->middleware('auth');
Route::post('trHeaderPemakaianBbm/delete/', [PemakaianBbmController::class, 'trHeaderPemakaianBbmDestroy_del'])->name('trHeaderPemakaianBbmDestroy.del')->middleware('auth');

Route::get('trDetailPemBbm/{id}', [PemakaianBbmController::class, 'trDetailPemBbm'])->name('trDetailPemBbm')->middleware('auth');
// Route::get('trDetailPemBbm/showinv', [PemakaianBbmController::class, 'showInv'])->name('trDetailPemBbm.showInv')->middleware('auth');
Route::get('stInvBbm/json', [PemakaianBbmController::class, 'stInvBbm_data'])->name('stInvBbm.data')->middleware('auth');
Route::post('trDetailPemBbm', [PemakaianBbmController::class, 'trDetailPemBbm_add'])->name('trDetailPemBbm.add')->middleware('auth');
Route::get('trDetailPemBbm/showedit/{id}', [PemakaianBbmController::class, 'showEdit'])->name('trDetailPemBbm.showEdit')->middleware('auth');
Route::post('trDetailPemBbm/edit', [PemakaianBbmController::class, 'trDetailPemBbm_edit'])->name('trDetailPemBbm.edit')->middleware('auth');
Route::post('trDetailPemBbm/delete/', [PemakaianBbmController::class, 'trDetailPemBbm_del'])->name('trDetailPemBbm.del')->middleware('auth');

Route::get('histPemakaian',[HistPemakaianController::class, 'histPemakaian'])->name('histPemakaian')->middleware('auth');
Route::get('stInvHp/json', [HistPemakaianController::class, 'stInvHp_data'])->name('stInvHp.data')->middleware('auth');
Route::post('histPemakaian', [HistPemakaianController::class, 'histPemakaian_rpt'])->name('histPemakaian.rpt')->middleware('auth');

Route::get('stInvent',[StInventController::class, 'stInvent'])->name('stInvent')->middleware('auth');
Route::get('stInvent/json', [StInventController::class, 'stInvent_data'])->name('stInvent.data')->middleware('auth');
Route::get('stInvent/showedit/{id}', [StInventController::class, 'showEdit'])->name('stInvent.showEdit')->middleware('auth');
Route::post('stInvent', [StInventController::class, 'stInvent_add'])->name('stInvent.add')->middleware('auth');
Route::post('stInvent/edit', [StInventController::class, 'stInvent_edit'])->name('stInvent.edit')->middleware('auth');
Route::post('stInvent/delete/', [StInventController::class, 'stInvent_del'])->name('stInvent.del')->middleware('auth');
Route::post('stInvent/openlock/', [StInventController::class, 'stInvent_openlock'])->name('stInvent.openlock')->middleware('auth');
Route::get('stInvent/printStock/{jnsInvent}', [StInventController::class, 'printStock_rpt'])->name('printStock')->middleware('auth');

Route::get('processQty',[ProcessQtyController::class, 'processQty'])->name('processQty')->middleware('auth');
Route::get('processGlobal',[ProcessGlobalController::class, 'processGlobal'])->name('processGlobal')->middleware('auth');

Route::get('periodeOperasional',[UserController::class, 'periodeOperasional'])->name('periodeOperasional')->middleware('auth');
Route::post('periodeOperasional', [UserController::class, 'periodeOperasional_add'])->name('periodeOperasional.add')->middleware('auth');
Route::get('periodeOperasional/{id_periode}', [UserController::class, 'periodeOperasional_actived'])->name('periodeOperasional.actived')->middleware('auth');


// ------------------ Reporting --------------------------------//
Route::get('spRekMuStok',[SpRekMuStokController::class, 'spRekMuStok'])->name('spRekMuStok')->middleware('auth');
Route::post('spRekMuStok', [SpRekMuStokController::class, 'spRekMuStok_rpt'])->name('spRekMuStok.rpt')->middleware('auth');

Route::get('spRincMuStok',[SpRincMuStokController::class, 'spRincMuStok'])->name('spRincMuStok')->middleware('auth');
Route::post('spRincMuStok', [SpRincMuStokController::class, 'spRincMuStok_rpt'])->name('spRincMuStok.rpt')->middleware('auth');

Route::get('spPenerimaan',[SpPenerimaanController::class, 'spPenerimaan'])->name('spPenerimaan')->middleware('auth');
Route::post('spPenerimaan', [SpPenerimaanController::class, 'spPenerimaan_rpt'])->name('spPenerimaan.rpt')->middleware('auth');

Route::get('spRekPemPerUnit',[SpRekPemPerUnitController::class, 'spRekPemPerUnit'])->name('spRekPemPerUnit')->middleware('auth');
Route::post('spRekPemPerUnit', [SpRekPemPerUnitController::class, 'spRekPemPerUnit_rpt'])->name('spRekPemPerUnit.rpt')->middleware('auth');

Route::get('spRincPemPerUnit',[SpRincPemPerUnitController::class, 'spRincPemPerUnit'])->name('spRincPemPerUnit')->middleware('auth');
Route::post('spRincPemPerUnit', [SpRincPemPerUnitController::class, 'spRincPemPerUnit_rpt'])->name('spRincPemPerUnit.rpt')->middleware('auth');

Route::get('spInventaris',[SpInventarisController::class, 'spInventaris'])->name('spInventaris')->middleware('auth');
Route::post('spInventaris', [SpInventarisController::class, 'spInventaris_rpt'])->name('spInventaris.rpt')->middleware('auth');

Route::get('spChainsawman',[SpChainsawmanController::class, 'spChainsawman'])->name('spChainsawman')->middleware('auth');
Route::post('spChainsawman', [SpChainsawmanController::class, 'spChainsawman_rpt'])->name('spChainsawman.rpt')->middleware('auth');

Route::get('spMoving',[SpMovingController::class, 'spMoving'])->name('spMoving')->middleware('auth');
Route::post('spMoving', [SpMovingController::class, 'spMoving_rpt'])->name('spMoving.rpt')->middleware('auth');

Route::get('bbmPenerimaan',[BbmPenerimaanController::class, 'bbmPenerimaan'])->name('bbmPenerimaan')->middleware('auth');
Route::post('bbmPenerimaan', [BbmPenerimaanController::class, 'bbmPenerimaan_rpt'])->name('bbmPenerimaan.rpt')->middleware('auth');

Route::get('bbmRekMuStok',[BbmRekMuStokController::class, 'bbmRekMuStok'])->name('bbmRekMuStok')->middleware('auth');
Route::post('bbmRekMuStok', [BbmRekMuStokController::class, 'bbmRekMuStok_rpt'])->name('bbmRekMuStok.rpt')->middleware('auth');

Route::get('bbmRekPemPerUnit',[BbmRekPemPerUnitController::class, 'bbmRekPemPerUnit'])->name('bbmRekPemPerUnit')->middleware('auth');
Route::post('bbmRekPemPerUnit', [BbmRekPemPerUnitController::class, 'bbmRekPemPerUnit_rpt'])->name('bbmRekPemPerUnit.rpt')->middleware('auth');

Route::get('bbmBantuan',[BbmBantuanController::class, 'bbmBantuan'])->name('bbmBantuan')->middleware('auth');
Route::post('bbmBantuan', [BbmBantuanController::class, 'bbmBantuan_rpt'])->name('bbmBantuan.rpt')->middleware('auth');

Route::get('bbmRincPemPerUnit',[BbmRincPemPerUnitController::class, 'bbmRincPemPerUnit'])->name('bbmRincPemPerUnit')->middleware('auth');
Route::post('bbmRincPemPerUnit', [BbmRincPemPerUnitController::class, 'bbmRincPemPerUnit_rpt'])->name('bbmRincPemPerUnit.rpt')->middleware('auth');

Route::get('bbmRincPemPerUnitPerHari',[BbmRincPemPerUnitPerHariController::class, 'bbmRincPemPerUnitPerHari'])->name('bbmRincPemPerUnitPerHari')->middleware('auth');
Route::post('bbmRincPemPerUnitPerHari', [BbmRincPemPerUnitPerHariController::class, 'bbmRincPemPerUnitPerHari_rpt'])->name('bbmRincPemPerUnitPerHari.rpt')->middleware('auth');

// Route::get('rptChainTrack',[UserController::class, 'rptChainTrack'])->name('rptChainTrack')->middleware('auth');
// Route::post('rptChainTrack', [UserController::class, 'rptChainTrack_rpt'])->name('rptChainTrack.rpt')->middleware('auth');

// Route::get('rptLoglistLoc',[UserController::class, 'rptLoglistLoc'])->name('rptLoglistLoc')->middleware('auth');
// Route::post('rptLoglistLoc', [UserController::class, 'rptLoglistLoc_rpt'])->name('rptLoglistLoc.rpt')->middleware('auth');

// Route::get('rptRekapHauling',[UserController::class, 'rptRekapHauling'])->name('rptRekapHauling')->middleware('auth');
// Route::post('rptRekapHauling', [UserController::class, 'rptRekapHauling_rpt'])->name('rptRekapHauling.rpt')->middleware('auth');

// Route::get('rptRekapTkg',[UserController::class, 'rptRekapTkg'])->name('rptRekapTkg')->middleware('auth');
// Route::post('rptRekapTkg', [UserController::class, 'rptRekapTkg_rpt'])->name('rptRekapTkg.rpt')->middleware('auth');

// Route::get('rptStokAkhGab',[UserController::class, 'rptStokAkhGab'])->name('rptStokAkhGab')->middleware('auth');
// Route::post('rptStokAkhGab', [UserController::class, 'rptStokAkhGab_rpt'])->name('rptStokAkhGab.rpt')->middleware('auth');


Route::get('password', [UserController::class, 'password'])->name('password');
Route::post('password', [UserController::class, 'password_action'])->name('password.action');

Route::get('logout', [UserController::class, 'logout'])->name('logout');
Route::get('/{any}',[UserController::class, 'logout']);
