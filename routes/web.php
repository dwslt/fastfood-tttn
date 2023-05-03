<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\DashboardController;
use Symfony\Component\HttpFoundation\Request;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Auth;
use App\Mail\Welcome;
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

Route::get('/', function () {
    return view('welcome');
});
//                                  Frontend

Route::group([
    'prefix' => 'user',
    'namespace' => 'Frontend'
], function () {
    Route::get('/', 'HomeController@index');
    //logout
    Route::get('/logout', 'MemberController@logout');

    //register && login
    Route::get('/register', 'MemberController@index');
    Route::post('/register', 'MemberController@create');
    Route::get('/login', 'MemberController@showLogin');
    Route::post('/login', 'MemberController@postLogin');
    //account
    Route::get('/account', 'AccountController@index');
    Route::post('/account', 'AccountController@edit');
    //product
    Route::get('/my_product', 'ProductController@index');
    Route::get('/add_product', 'ProductController@create');
    Route::post('/add_product', 'ProductController@store');
    Route::get('/edit_product/{id}', 'ProductController@show');
    Route::post('/edit_product/{id}', 'ProductController@edit');
    Route::get('/delete_product/{id}', 'ProductController@destroy');
    //product detail
    Route::get('/product_detail/{id}', 'ProductController@detail');
    Route::get('/cart', 'CartController@index');

    Route::post('/ajax_add-to-cart', 'CartController@ajax_addtocart');
    Route::post('/ajax_up_product', 'CartController@ajax_up_product');
    Route::post('/ajax_down_product', 'CartController@ajax_down_product');
    Route::post('/ajax_delete_product', 'CartController@ajax_delete_product');
    //search advanced
    Route::get('/search', 'SearchController@search');
    Route::post('/search', 'SearchController@post_search');
    //search name
    Route::post('/search_name', 'SearchController@search_name');
    //search price
    Route::post('/ajax_search_price', 'SearchController@ajax_search_price');

    //search cate,brand
    Route::get('/cate/{id}', 'SearchController@search_cate');
    Route::get('/brand/{id}', 'SearchController@search_brand');
    //blog
    Route::get('/blog', 'BlogController@blog');
    Route::get('/blog-single/{id}', 'BlogController@blog_single')->name('blog-single/{id}');
    Route::post('/blog-single', 'BlogController@blog_singlePost')->name('blog-single.post');

    //checkout-sendmail
    Route::get('/checkout', 'CheckoutController@checkout');
    Route::post('/checkout', 'CheckoutController@post_checkout');

    //checkout
    // Route::get('/checkout', 'CartController@checkout');
    Route::get('/lichsumuahang', 'CartController@lichsumuahang');
    //  Route::post('/checkout', 'CheckoutController@post_checkout');

    //blog
    Route::get('/blog', 'BlogController@index');
    Route::get('/blog-single/{id}', 'BlogController@blog_single')->name('blog-single/{id}');
    Route::post('/blog-single', 'BlogController@blog_singlePost')->name('blog-single.post');


    //comment
    Route::post('/comment/{id}', 'BlogController@comment')->name('comment/{id}.post');
    Route::post('/rep_comment/{id}', 'BlogController@rep_comment')->name('comment/{id}.post');
        //  Route::get('/email',function(){
    //     return new Welcome();
    //  });

});


//                                  Backend
Auth::routes();
Route::group([
    'prefix' => 'admin',
    'namespace' => 'admin'

], function () {
    Route::get('/dashboard', 'DashboardController@index');
    //profile
    Route::get('/pages-profile', 'ProfileController@show');
    Route::post('/pages-profile', 'ProfileController@update');

    //country
    Route::get('/country', 'CountryController@index');
    Route::get('/add_country', 'CountryController@create');
    Route::post('/add_country', 'CountryController@store');
    Route::get('/edit_country/{id}', 'CountryController@show');
    Route::post('/edit_country/{id}', 'CountryController@edit');
    Route::get('/delete/{id}', 'CountryController@destroy');

    // brands
    Route::get('/brand', 'BrandController@index');
    Route::get('/add_brand', 'BrandController@create');
    Route::post('/add_brand', 'BrandController@store');
    Route::get('/delete_brand/{id}', 'BrandController@destroy');
    Route::get('/edit_brand/{id}', 'BrandController@show');
    Route::post('/edit_brand/{id}', 'BrandController@edit');
    //category
    Route::get('/category', 'CategoryController@index');
    Route::get('/edit_cat/{id}', 'CategoryController@edit');
    Route::post('/edit_cat/{id}', 'CategoryController@post_edit');
    Route::get('/add_category', 'CategoryController@insert');
    Route::post('/add_category', 'CategoryController@post_insert');
    Route::get('/delete_cat/{id}', 'CategoryController@delete_asd');

    //blog
    Route::get('/blog', 'BlogController@index');
    Route::get('/add_blog', 'BlogController@create');
    Route::post('/add_blog', 'BlogController@store');
    Route::get('/delete_blog/{id}', 'BlogController@destroy');
    Route::get('/edit_blog/{id}', 'BlogController@show');
    Route::post('/edit_blog/{id}', 'BlogController@edit');
    //comment
    Route::get('/comment','BlogController@comment');
    Route::get('/delete_comment/{id}', 'BlogController@delete_comment');

    //product
    Route::get('/product', 'ProductController@index');
    Route::get('/delete_product/{id}', 'ProductController@destroy');


    //history
    Route::get('/history', 'ProductController@history')->name('history');
    Route::get('/history/{id}', 'ProductController@history_detail')->name('history');

    //member
    Route::get('/member', 'MemberController@index');
    Route::get('/delete_member/{role}/{id}', 'MemberController@destroy');
    Route::get('/capquyen_admin/{role}/{id}', 'MemberController@update');
    // Route::get('/delete_admin/{id}','MemberController@delete_admin');
});


Route::get('/home', 'HomeController@index')->name('home');
