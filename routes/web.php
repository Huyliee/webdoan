<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\OrderShip;
use App\Http\Controllers\PayController;
use App\Http\Controllers\UserController;
use App\Models\User;
use Facade\FlareClient\View;
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
//DInh nghia admin
// Route::get('/admin',function(){
//     return View('admin.index');
// });

Route::prefix('admin')->group(function(){
 Route::get('',[HomeController::class,'index'])->middleware('adminDangnhap');
Route::get('/category',[CategoryController::class,'index'])->middleware('adminDangnhap');
Route::get('/category/create',[CategoryController::class,'create']);
Route::post('/category/store',[CategoryController::class,'store']); 
Route::get('/category/edit/{id}',[CategoryController::class,'edit']);
Route::put('/category/edit/{id}',[CategoryController::class,'update']); 
Route::delete('/category/destroy/{id}',[CategoryController::class,'destroy']);
Route::get('/product',[ProductController::class,'index'])->middleware('adminDangnhap');
Route::get('/product/create',[ProductController::class,'create']);
Route::get('/product/createImg',[HomeController::class,'createImg']);
Route::post('/product/storeImg',[HomeController::class,'store']);
Route::post('/product/store',[ProductController::class,'store']);   
Route::get('/product/edit/{id}',[ProductController::class,'edit']);
Route::put('/product/edit/{id}',[ProductController::class,'update']); 
Route::delete('/product/destroy/{id}',[ProductController::class,'destroy']);
Route::get('/users',[UserController::class,'index'])->middleware('adminDangnhap');
Route::delete('/users/destroy/{id}',[UserController::class,'destroy']);
Route::get('/order',[OrderController::class,'index']);
Route::put('/order/check/{id}',[OrderController::class,'order_check']);
Route::put('/order/check1/{id}',[OrderController::class,'order_check1']);
Route::delete('/order/destroy/{id}',[OrderController::class,'destroy']);
});






//DInh nghia user
route::get('/', function(){
    return View('home.trang-chu');
});

route::get('/loai-sp/{masp}', [HomeController::class, 'cat']);

Route::prefix('home')->group(function(){

Route::prefix('user')->group(function(){
    route::get('shop',[ProductController::class,'indexuser']);
    route::get('shop',[ProductController::class,'timkiem']);
    route::get('danh-muc/{madanhmuc}',[HomeController::class,'danhmuc']);
    route::get('shop-detail/{masp}',[HomeController::class,'sanpham']);
     Route::get('about',[HomeController::class,'about']);
    Route::get('contact',[HomeController::class,'contact']);
    Route::get('/login',[LoginController::class,'user_login']);
    Route::post('/login',[LoginController::class,'user_login1']);
    
    Route::get('/register',[LoginController::class,'register']);
    Route::post('/register',[LoginController::class,'registeruser']);
    Route::post('/chekout/vnpay',[PayController::class,'vnpay_payment']);
    Route::post('/checkout/vnpay/success',[PayController::class,'success']);
    Route::get('/checkout/vnpay/success',[PayController::class,'success']);
    Route::get('order-detail',[CartController::class,'user_checkout'])->middleware('useDangnhap');
    Route::post('order-detail',[CartController::class,'user_checkout1'])->middleware('useDangnhap');
    Route::get('finish',[CartController::class,'finish']);
    Route::get('/logout',[LoginController::class,'user_logout']);
    Route::get('/profile',[UserController::class,'profile']);
    Route::get('/profile-order',[UserController::class,'index_order']);
    Route::get('/profile_order_detail/{id}',[UserController::class,'index_detail_order']);
    Route::get('/changePass',[UserController::class,'index_changePass']);

    Route::post('/changePass',[UserController::class,'changePassword']);
    });
    
   
});









route::get('/login',[LoginController::class,'index']);
route::post('/login',[LoginController::class,'login']);
route::get('/logout',[LoginController::class,'logout']);

//Cart
route::get('/cart',[CartController::class,'index'])->middleware('useDangnhap');
route::get('/test1',[CartController::class,'index'])->middleware('useDangnhap');
route::get('/cart/add/{id}',[CartController::class,'addd'])->middleware('useDangnhap');;

route::post('/cart/add/{id}',[CartController::class,'add'])->middleware('useDangnhap');;
route::get('/cart/remove/{id}',[CartController::class,'remove']);


//sendmail
route::get('/send-mail',[OrderShip::class,'demo1']);






