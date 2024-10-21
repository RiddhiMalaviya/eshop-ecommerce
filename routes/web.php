<?php

use App\Http\Controllers\AboutusController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PlaceOrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\SubscriptionController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AppController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CouponController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ShippingController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\WishlistController;
use App\Models\Comment;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/',[AppController::class,'index'])->name('app.index');
Route::get('/shop',[ShopController::class,'index'])->name('shop.index');
Route::get('/product/{slug}',[ShopController::class,'productDetails'])->name('shop.product.details');
Route::get('/cart-wishlist-count',[ShopController::class,'getCartAndWishlistCount'])->name('shop.cart.wishlist.count');
Route::get('/about-us',[AboutusController::class,'index'])->name('aboutus.index');
Route::get('/contact-us',[AboutusController::class,'contactus'])->name('contactus.index');
Route::post('/contact-us',[AboutusController::class,'submitForm'])->name('contactus.submit');

Route::get('/blog',[AboutusController::class,'blog'])->name('blog.index');
Route::get('/blog/{slug}',[AboutusController::class,'blogDetails'])->name('blog.details');



Route::get('/cart',[CartController::class,'index'])->name('cart.index');
Route::post('/cart/store',[CartController::class,'addToCart'])->name('cart.store');
Route::put('/cart/update',[CartController::class,'updateCart'])->name('cart.update');
Route::delete('/cart/delete',[CartController::class,'removeItem'])->name('cart.remove');
Route::delete('/cart/clear',[CartController::class,'clearCart'])->name('cart.clear');
Route::get('/checkout',[CartController::class,'checkout'])->name('cart.checkout');
Route::post('/process-checkout',[CartController::class,'processcheckout'])->name('cart.process.checkout');
Route::get('/thankyou',[CartController::class,'thankyou'])->name('cart.thankyou');
Route::post('/apply-coupon',[CartController::class,'applyCoupon'])->name('cart.applyCoupon');

Route::post('/place-order',[PlaceOrderController::class,'store'])->name('placeorder');

Route::post('/store-shipping',[ShippingController::class,'store'])->name('store.shipping');

Route::get('/wishlist',[WishlistController::class,'getWishlistedProduct'])->name('wishlist.list');
Route::post('/wishlist/add',[WishlistController::class,'addProducrToWishlist'])->name('wishlist.store');
Route::delete('/wishlist/remove',[WishlistController::class,'removeProductFromWishlist'])->name('wishlist.remove');
Route::delete('/wishlist/clear',[WishlistController::class,'clearWishlist'])->name('wishlist.clear');
Route::post('/wishlist/move-to-cart',[WishlistController::class,'moveToCart'])->name('wishlist.move.to.cart');

Route::post('/reviews',[ReviewController::class,'store'])->name('reviews.store');
Route::post('/subscribe',[SubscriptionController::class,'subscribe'])->name('subscribe');


Auth::routes();


Route::middleware('auth')->group(function(){
  Route::get('/my-account',[UserController::class,'index'])->name('users.index'); 
  Route::get('/profile',[UserController::class,'profile'])->name('users.profile');
  Route::post('/profile/update',[UserController::class,'update'])->name('profile.update');
  
});


Route::middleware(['auth','auth.admin'])->group(function(){
  Route::get('/admin',[AdminController::class,'index'])->name('admin.index');
  Route::resource('/admin/brands',BrandController::class);
  Route::resource('/admin/banner',BannerController::class);
  Route::resource('/admin/category',CategoryController::class);
  Route::resource('/admin/product',ProductController::class);
  Route::resource('/admin/coupon',CouponController::class);
  Route::resource('/admin/post',PostController::class);
  Route::resource('/admin/tag',TagController::class);
  Route::resource('/admin/comment',CommentController::class);
  
  Route::get('/admin/order',[OrderController::class,'index'])->name('admin.orders');
  Route::get('/admin/user',[AdminController::class,'user'])->name('admin.users');

  Route::get('/user/{id}/activate',[UserController::class,'activateUser'])->name('user.activate');
  Route::get('/user/{id}/deactivate',[UserController::class,'deactivateUser'])->name('user.deactivate');
  
  Route::get('/admin/subscriptions',[SubscriptionController::class,'index'])->name('subscribe.index');
  Route::get('/admin/post',[PostController::class,'index'])->name('admin.post');
  Route::get('/admin/tag',[TagController::class,'index'])->name('admin.tag');
  Route::get('/admin/comment',[CommentController::class,'index'])->name('admin.comment');
  Route::get('/admin/product',[ProductController::class,'index'])->name('admin.products');
  Route::get('/admin/category',[CategoryController::class,'index'])->name('admin.categories');
  Route::get('/admin/brand',[BrandController::class,'index'])->name('admin.brand');
  Route::get('/admin/banner',[BannerController::class,'index'])->name('admin.banners');
  Route::get('/admin/coupon',[CouponController::class,'index'])->name('admin.coupons');

  Route::get('/admin/review',[ReviewController::class,'index'])->name('admin.reviews');
  Route::get('/reviews/{review}/edit',[ReviewController::class,'edit'])->name('admin.reviews.edit');
  Route::patch('/reviews/{review}',[ReviewController::class,'update'])->name('admin.reviews.update');
  Route::get('/reviews/{review}',[ReviewController::class,'destroy'])->name('admin.reviews.destroy');

  Route::get('/admin/contactus',[AdminController::class,'contactus'])->name('admin.contactus');

});
