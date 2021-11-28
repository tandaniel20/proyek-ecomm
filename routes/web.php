<?php

use App\Http\Controllers\AdminViewController;
use App\Http\Controllers\AlamatController;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\BukuKategoriController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\HPromoController;
use App\Http\Controllers\HReturController;
use App\Http\Controllers\HTransController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\KeranjangController;
use App\Http\Controllers\RatingController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserVoucherController;
use App\Http\Controllers\VoucherController;
use App\Http\Controllers\WishlistController;
use App\Models\Alamat;
use App\Models\Buku;
use App\Models\HPromo;
use App\Models\HRetur;
use App\Models\HTrans;
use App\Models\Kategori;
use App\Models\Keranjang;
use App\Models\Rating;
use App\Models\UserVoucher;
use App\Models\Wishlist;
use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', function () {
    return redirect('home');
});

Route::get('/home', function(){
    return view('home',[
        'buku' => Buku::all(),
        'kategori' => Kategori::all(),
    ]);
});

Route::get('/login', function () {
    return view('login');
});

Route::get('/register', function () {
    return view('register');
});

Route::post('/register-user', [UserController::class,'create']);
Route::post('/login-user', [UserController::class,'checkLogin']);
Route::get('/logout-user', [UserController::class,'logOut']);
Route::get('/logout-admin', [UserController::class,'logOut']);

Route::prefix('home')->group(function(){
    Route::get('/', [HomeController::class, 'homeAll']);
    Route::get('/promo', [HomeController::class, 'homePromo']);
    Route::post('/search', [HomeController::class, 'homeSearch']);
    Route::get('/{id}', [HomeController::class, 'homeKategori']);
});

Route::prefix('buku')->group(function(){
    Route::get('/{id}/detail', [BukuController::class, 'detailBuku']);
    Route::get('/{id}/wishlist', [BukuController::class, 'wishBuku']);
    Route::get('/{id}/removeWishlist', [BukuController::class, 'removeWishBuku']);
    Route::post('/{id}/addToCart', [KeranjangController::class, 'addToCart']);
});

Route::prefix('cart')->group(function(){
    Route::get('/', [KeranjangController::class, 'detailKeranjang']);
    Route::get('/{id}/remove', [KeranjangController::class, 'removeKeranjang']);
    Route::get('/{id}/tambah', [KeranjangController::class, 'tambahItem']);
    Route::get('/{id}/kurang', [KeranjangController::class, 'kurangItem']);
});

Route::prefix('point')->group(function(){
    Route::get('/', [UserVoucherController::class, 'detailPoint']);
    Route::post('/cekVoucher', [UserVoucherController::class, 'cekVoucher']);
});

Route::prefix('checkout')->group(function(){
    Route::get('/', [HTransController::class, 'checkOutPage']);
    Route::post('/confirm',[HTransController::class, 'checkOut']);
    Route::get('/success',[HTransController::class, 'toSuccess']);
    Route::get('/successPoint',[HTransController::class, 'toSuccessPoint']);
});

Route::prefix('pemesanan')->group(function(){
    Route::get('/', [HTransController::class, 'pemesananPage']);
    Route::get('/{id}/detail', [HTransController::class, 'pemesananDetail']);
    Route::get('/{id}/kirim-bukti', [HTransController::class, 'kirimBuktiPage']);
    Route::post('/{id}/upload-bukti', [HTransController::class, 'uploadBukti']);
});

Route::prefix('rate')->group(function(){
    Route::get('/{id}', [RatingController::class, 'ratePage']);
    Route::post('/{id}/submit', [RatingController::class, 'rateSubmit']);
});

Route::prefix('wishlist')->group(function(){
    Route::get('/', [WishlistController::class, 'showWishlist']);
});

Route::prefix('retur')->group(function(){
    Route::get('/',[HReturController::class, 'returPage']);
    Route::get('/ajuRetur', [HReturController::class, 'ajuRetur']);
    Route::get('/{id}/form', [HReturController::class, 'ajuReturDetail']);
    Route::post('/getNew', [HReturController::class, 'getNew']);
});

Route::prefix('admin')->group(function(){
    Route::get('/', [AdminViewController::class,'home']);
    Route::prefix('kategori')->group(function(){
        Route::get('/', [AdminViewController::class,'kategori']);
        Route::get('/add', [AdminViewController::class,'addKategori']);
        Route::post('/add-kategori', [KategoriController::class, 'store']);
        Route::get('/{id}/update', [AdminViewController::class, 'updateKategori']);
        Route::post('/{id}/update-kategori', [KategoriController::class, 'cekUpdate']);
        Route::get('/{id}/delete', [KategoriController::class, 'delete']);
    });

    Route::prefix('buku')->group(function(){
        Route::get('/', [AdminViewController::class,'buku']);
        Route::get('/add', [AdminViewController::class, 'addBuku']);
        Route::post('/add-buku', [BukuController::class, 'store']);
        Route::get('/{id}/kategori', [AdminViewController::class, 'kategoriBuku']);
        Route::post('/{id}/kategori-added', [BukuKategoriController::class, 'store']);
        Route::get('/{id}/update', [AdminViewController::class, 'updateBuku']);
        Route::post('/{id}/update-buku', [BukuController::class, 'cekUpdate']);
        Route::get('/{id}/delete', [BukuController::class, 'delete']);
    });

    Route::prefix('promo')->group(function(){
        Route::get('/', [AdminViewController::class,'promo']);
        Route::get('/add', [AdminViewController::class, 'addPromo']);
        Route::get('/{id}', [AdminViewController::class,'selectPromo']);
        Route::post('/add-promo', [HPromoController::class, 'store']);
        Route::get('/{id}/update', [AdminViewController::class, 'updatePromo']);
        Route::post('/{id}/update-promo', [HPromoController::class, 'cekUpdate']);
        Route::get('/{id}/delete', [HPromoController::class, 'deletePromo']);
    });

    Route::prefix('bukti-transfer')->group(function(){
        Route::get('/', [AdminViewController::class,'bukti_transfer']);
        Route::get('/{id}', [HTransController::class, 'adminBuktiTransfer']);
        Route::get('/{id}/accept', [HTransController::class, 'adminBuktiAccept']);
        Route::get('/{id}/reject', [HTransController::class, 'adminBuktiReject']);
    });

    Route::prefix('pengantaran')->group(function(){
        Route::get('/', [AdminViewController::class, 'pengantaran']);
        Route::get('/{id}', [HTransController::class, 'adminPengantaran']);
        Route::get('/{id}/accept', [HTransController::class, 'adminPengantaranAccept']);
        Route::get('/{id}/reject', [HTransController::class, 'adminPengantaranReject']);
    });

    Route::get('/retur', [AdminViewController::class,'retur']);
    Route::prefix('voucher')->group(function(){
        Route::get('/', [AdminViewController::class,'voucher']);
        Route::get('/add', [AdminViewController::class, 'addVoucher']);
        Route::get('/{id}', [AdminViewController::class,'selectVoucher']);
        Route::post('/add-voucher', [VoucherController::class, 'store']);
        Route::get('/{id}/update', [AdminViewController::class, 'updateVoucher']);
        Route::post('/{id}/update-voucher', [VoucherController::class, 'cekUpdate']);
        Route::get('/{id}/delete', [VoucherController::class, 'delete']);
    });
});
Route::get('/keAddAlamat', function()
{
    return view('user.addAlamat',[
        'title' => "Alamat",
        'alamat' => Alamat::all(),
        'kategori' => Kategori::all(),
    ]);
});
Route::post('/AddAlamat', [AlamatController::class,'prosesData']);
Route::get('/alamat', [AlamatController::class,'alamat']);
Route::get('/deletealamat/{id}', [AlamatController::class,'deletealamat']);
Route::get('/keupdatealamat/{id}', function()
{
    return view('user.updateAlamat',[
        'title' => "Alamat",
        'alamat' => Alamat::all(),
        'kategori' => Kategori::all(),
    ]);
});
Route::post('/updatealamat', [AlamatController::class,'updatealamat']);
// Route::get('tabledit', 'AlamatController@index');
// Route::post('tabledit/action', 'AlamatController@action')->name('tabledit.action');
