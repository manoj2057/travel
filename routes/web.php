<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controller\AdminLoginController;

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

Route::prefix('/admin')->group(function(){
    Route::match(['get', 'post'], '/login','AdminLoginController@adminlogin')->name('adminlogin');
        
   Route::group(['middleware'=> ['admin']] ,function () {
    Route::get('/dashboard', [App\Http\Controllers\AdminLoginController::class, 'dashboard'])->name('adminDashboard');     
   });
   //Admin Profile
   Route::get('/profile', 'AdminProfileController@profile')->name('profile');
   //Admin Update
   Route::post('/profile/update/{id}', 'AdminProfileController@updateProfile')->name('updateProfile');
// Change password
Route::get('/profile/change_password', 'AdminProfileController@changePassword')->name('changePassword');
 // Check Current Password
 Route::post('/profile/check-password', 'AdminProfileController@chkUserPassword')->name('chkUserPassword');
 // Update Admin Password
 Route::post('/profile/update_password/{id}', 'AdminProfileController@updatePassword')->name('updatePassword');
 Route::get('/ Themesettings', 'ThemeController@theme')->name('theme');
//theme update
 Route::post('/Theme/update/{id}', 'ThemeController@updateTheme')->name('updateTheme');
 //sitesettings 
 Route::get('/sitesettings', 'SiteController@site')->name('site');
 //siteupdate
 Route::post('/update/sitesettings/{id}', 'SiteController@updatesite')->name('updateSite');
 //seosettings
 Route::get('/seosettings', 'SiteController@siteseo')->name('seosite');
 //seosettings update
 Route::post('/updateseosettings/{id}', 'SiteController@updateseo')->name('updateseo');
//socialsitesettings
Route::get('/socialsettings', 'SiteController@socialsite')->name('socialsite');
//socialsitesettings update
Route::post('/site/update_socialmediaSetting/{id}', 'SiteController@updateSocialmedia')->name('updateSocialmedia');

});

Route::get('/admin/logout','AdminLoginController@adminlogout')->name('adminlogout');
Route::match(['get', 'post'], '/forget-password', 'AdminLoginController@forgetPassword')->name('forgetPassword');
//slider
Route::get('/index','IndexController@index')->name('index');
Route::get('/create','SliderController@create')->name('create');
Route::post('/store','SliderController@store')->name('store');
Route::get('/slider','SliderController@slider')->name('slider');
Route::get('/edit/{id}','SliderController@edit')->name('edit');
Route::post('/update/{id}','SliderController@update')->name('update');
Route::get('/Delete/{id}','SliderController@delete')->name('delete');
Route::get('/table/slider', 'SliderController@dataTable')->name('tableSlider');
//tag
Route::get('/indextag','TagController@index')->name('indextag');
Route::get('/addtag','TagController@create')->name('addtag');
Route::post('/tagstore','TagController@store')->name('storetag');
Route::get('/edittag/{id}','TagController@edit')->name('edittag');
Route::post('/tagupdate/{id}','TagController@update')->name('updatetag');
Route::get('/tagdelete/{id}','TagController@delete')->name('deletetag');
Route::get('/table/tag', 'TagController@dataTable')->name('tagTable');
//categorty
Route::get('/Category', 'CategoryController@index')->name('category.index');
Route::get('/Category/add', 'CategoryController@addCategory')->name('addCategory');
Route::post('/Category/store', 'CategoryController@storeCategory')->name('storeCategory');
Route::get('/Category/edit/{id}', 'CategoryController@editCategory')->name('editCategory');
Route::post('/Category/update/{id}', 'CategoryController@updateCategory')->name('updateCategory');
Route::get('/Category/delete/{id}', 'CategoryController@deleteCategory')->name('deleteCategory');
Route::get('/table/Category', 'CategoryController@dataTable')->name('tableCategory');

//Routes For Blog
Route::get('/Blog', 'BlogController@index')->name('Blog.index');
Route::get('/Blog/add', 'BlogController@addBlog')->name('addBlog');
Route::post('/Blog/store', 'BlogController@storeBlog')->name('storeBlog');
Route::get('/Blog/edit/{id}', 'BlogController@editBlog')->name('editBlog');
Route::post('/Blog/update/{id}', 'BlogController@updateBlog')->name('updateBlog');
Route::get('/Blog/delete/{id}', 'BlogController@deleteBlog')->name('deleteBlog');
Route::get('/table/Blog', 'BlogController@dataTable')->name('tableBlog');
