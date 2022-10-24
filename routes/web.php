<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\admin\infoController;
use App\Http\Controllers\admin\adminController;
use App\Http\Controllers\Auth\adminLoginController;
use App\Http\Controllers\admin\productController;
use App\Http\Controllers\admin\photoController;
use App\Http\Controllers\admin\categoryController;
use App\Http\Controllers\pageController;
use App\Http\Controllers\admin\userController;
use App\Http\Controllers\admin\addressController;
use App\Http\Controllers\admin\analyticsController;
use App\Http\Controllers\admin\directorController;
use App\Http\Controllers\admin\accessController;
use App\Http\Controllers\mailController;
use App\Http\Controllers\admin\subcategoryController;
use App\Http\Controllers\admin\shiftController;
use App\Http\Controllers\postController;
use App\Http\Controllers\profileController;


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


Route::get('/lang/{locale}', function ($lang) {

    Session::put('locale', $lang);
    Cache::put('locale', $lang);

    return redirect()->route('index');
})->name('lang');

$company = '';
Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// PAGE CONTROLLER
Route::get('/',                                                 [pageController::class, 'index'])->name('index');


// ADMİN INDEX CONTROLLER
Route::get('/admin/home',                                            [adminController::class, 'index'])->name('admin.index')->middleware('admin');
Route::get('/admin-giris',                                      [adminController::class, 'login'])->name('admin.login');
Route::post('/admin-kontrol',                                   [adminLoginController::class, 'admin'])->name('admin.admin');

// ADMİN DIRECTOR CONTROLLER
Route::get('/panel/direktor/roller',                                  [directorController::class, 'index'])->name('director.index')->middleware('admin');
Route::get('/panel/direktor/roller/duzenle/{id?}',                    [directorController::class, 'show'])->name('director.edit')->middleware('admin');
Route::post('/panel/direktor/roller/guncelle/{id?}',                   [directorController::class, 'update'])->name('director.update')->middleware('admin');
Route::post('/panel/direktor/roller/sil',                               [directorController::class, 'destroy'])->name('director.destroy')->middleware('admin');
Route::get('/panel/direktor/roller/olustur',                          [directorController::class, 'create'])->name('director.create')->middleware('admin');
Route::get('/panel/direktor/yetkilendirme',                           [accessController::class, 'index'])->name('access.index')->middleware('admin');
Route::post('/panel/direktor/yetkilendirme/guncelle',                           [accessController::class, 'update'])->name('access.update')->middleware('admin');

// ADMİN İNFO CONTROLLERs
Route::get('/admin/site-ayarlari',                              [infoController::class, 'index'])->name('infos.index')->middleware('admin');
Route::post('/admin/site-ayarlari/{id?}',                       [infoController::class, 'update'])->name('infos.update')->middleware('admin');

//  ADMIN SHIFT CONTROLLER

Route::get('/panel/shifts',                                     [shiftController::class, 'index'])->name('shift.index')->middleware('admin');


// ADMİN PRODUCT CONTROLLER
Route::get('/panel/katalog/sirketler',                               [productController::class, 'index'])->name('product.index')->middleware('admin');
Route::post('/panel/katalog/sirketler-eklendi',                      [productController::class, 'create'])->name('product.create')->middleware('admin');
Route::get('/panel/katalog/sirketler-ekle',                          [productController::class, 'add'])->name('product.add')->middleware('admin');
Route::post('/panel/katalog/urun-sirala',                          [productController::class, 'order'])->name('product.order');
Route::get('/panel/katalog/sirketler-sil/{id?}',                     [productController::class, 'destroy'])->name('product.destroy')->middleware('admin');
Route::get('/panel/katalog/sirketler-duzenle/{id?}',                 [productController::class, 'edit'])->name('product.edit')->middleware('admin');
Route::post('/panel/katalog/sirketler-guncelle/{id?}',               [productController::class, 'update'])->name('product.update')->middleware('admin');
Route::get('/panel/katalog/sirketler-filtrele',                      [productController::class, 'filter'])->name('product.filter')->middleware('admin');
Route::post('/panel/katalog/sirketler/deleteCategory',               [productController::class, 'deleteCategoryValue'])->middleware('admin');
Route::post('/panel/katalog/sirketler-guncellendi',                  [productController::class, 'collectiveUpdate'])->name('product.collectiveUpdate')->middleware('admin');
Route::post('/panel/katalog/sirketler-toplu-silindi',                [productController::class, 'collectiveDelete'])->name('product.collectiveDelete')->middleware('admin');
Route::get('/panel/katalog/sirala',                                [productController::class, 'sort'])->name('product.sort');


// ADDRESS CONTROLLER
Route::post('/adres-ekle-ajax',                                  [addressController::class, 'createAjax'])->name('address.create_ajax');
Route::get('/adres-sil-{id?}',                                  [addressController::class, 'destroy'])->name('address.destroy');


// ADMİN PHOTOS CONTROLLER
Route::post('/photo-create/{id?}/{iswatermark?}',     [photoController::class, 'create'])->name('photo.create');

// ADMİN CATEGORY CONTROLLER
Route::get('panel/katalog/kategoriler',                            [categoryController::class, 'index'])->name('category.index')->middleware('admin');
Route::post('panel/katalog/kategoriler/{id?}',                            [categoryController::class, 'create'])->name('category.create')->middleware('admin');
Route::post('panel/katalog/kategoriler-sirala',                       [categoryController::class, 'order'])->name('category.order')->middleware('admin');
Route::get('panel/katalog/kategoriler-sil/{id?}',                     [categoryController::class, 'destroy'])->name('category.destroy')->middleware('admin');
Route::get('panel/katalog/kategoriler-duzenle/{id?}',                 [categoryController::class, 'edit'])->name('category.edit')->middleware('admin');
Route::post('panel/katalog/kategoriler-guncelle/{id?}',               [categoryController::class, 'update'])->name('category.update')->middleware('admin');
Route::get('panel/katalog/categori-sirala',                        [categoryController::class, 'sort'])->name('category.sort');

//ADMİN SUBCATEGORY CONTROLLER
Route::get('panel/katalog/alt-kategoriler',                        [subcategoryController::class, 'index'])->name('subcategory.index')->middleware('admin');
Route::post('panel/katalog/alt-kategoriler/ekle/{id?}',            [subcategoryController::class, 'create'])->name('subcategory.create')->middleware('admin');
Route::post('panel/katalog/alt-kategoriler/sirala',                [subcategoryController::class, 'order'])->name('subcategory.order')->middleware('admin');
Route::get('panel/katalog/alt-kategoriler/sil/{id?}',              [subcategoryController::class, 'destroy'])->name('subcategory.destroy')->middleware('admin');
Route::get('panel/katalog/alt-kategoriler/duzenle/{id?}',          [subcategoryController::class, 'edit'])->name('subcategory.edit')->middleware('admin');
Route::post('panel/katalog/alt-kategoriler/guncelle/{id?}',        [subcategoryController::class, 'update'])->name('subcategory.update')->middleware('admin');
Route::get('panel/katalog/alt-category-sirala',                    [subcategoryController::class, 'sort'])->name('subcategory.sort')->middleware('admin');


//ADMİN ANALYTİCS CONTROLLER
Route::get('panel/raporlar/istatistikler/{startDate?}/{endDate?}',  [analyticsController::class, 'index'])->name('analytics.index')->middleware('admin');

// ADMİN USER CONTROLLER
Route::get('panel/uyeler',                                          [userController::class, 'index'])->name('user.index')->middleware('admin');
Route::post('panel/uyeler-ekle/{id?}',                                 [userController::class, 'create'])->name('user.create')->middleware('admin');
Route::post('panel/uyeler-sirala',                                     [userController::class, 'order'])->name('user.order')->middleware('admin');
Route::get('panel/uyeler-sil/{id?}',                                   [userController::class, 'destroy'])->name('user.destroy')->middleware('admin');
Route::get('panel/uyeler-duzenle/{id?}',                               [userController::class, 'edit'])->name('user.edit')->middleware('admin');
Route::post('panel/uyeler-guncelle/{id?}',                             [userController::class, 'update'])->name('user.update')->middleware('admin');
Route::get('panel/uyeler/filtrele',                                 [userController::class, 'filter'])->name('user.filter')->middleware('admin');
Route::get('/active/{mail?}/{token?}', 					            [userController::class, 'active'])					->name('active');
Route::post('/panel/uyeler/uyeler-toplu-silindi',                          [userController::class, 'collectiveDelete'])->name('user.collectiveDelete')->middleware('admin');
Route::get('panel/uyeler/sirala',                                   [userController::class, 'sort'])->name('user.sort')->middleware('admin');
Route::get('panel/uyeler/limit',                                    [userController::class, 'getLimitedUser'])->name('user.getLimitedUser')->middleware('admin');


// SUB CATEGORYİ ÇEKMEK İÇİN
Route::get('/getsubCategory',                                       [postController::class, 'getsubCategory'])->name('getsubCategory');

Route::get('/ajax/{id?}', [pageController::class, 'ajaxDropdown'])->name('ajax');
Route::post('/listData', [pageController::class, 'listData'])->name('listData');

Route::post('/sifremi-unuttum',                                 [mailController::class, 'resetPassword'])->name('resetPassword')->middleware('captcha');
Route::get('/sifre-yenile/{mail?}/{token?}',                    [profileController::class, 'createPassword'])->name('reset-password');
Route::post('/sifre-olustur',                                   [profileController::class, 'changePassword'])->name('create-password');