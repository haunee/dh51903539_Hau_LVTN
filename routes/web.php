<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AttributeController;
use App\Http\Controllers\AttributeValueController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\HomeController;
use App\Models\Product;
use Illuminate\Support\Facades\Route;



//PAGE

Route::get('/', [HomeController::class, 'index']);
Route::get('/home', [HomeController::class, 'index']);

//ACCOUNT customer
//chuyển trang xác nhận  //xac nhận mã
Route::get('/verify', [CustomerController::class, 'verify']);
Route::post('/verify-token', [CustomerController::class, 'verifyToken']);


//đăng xuất
Route::get('/logout', [CustomerController::class, 'logout']);
//dăng nhap
Route::get('/login', [CustomerController::class, 'login']);
Route::post('/submit-login', [CustomerController::class, 'submit_login']);
//dăng kí
Route::get('/register', [CustomerController::class, 'register']);
Route::post('/submit-register', [CustomerController::class, 'submit_register']);
//xem tk
Route::get('/profile', [CustomerController::class, 'show_account_info'])->name('profile.show');

//sửa hồ sơ
Route::post('/profile', [CustomerController::class, 'edit_profile']);

//đoi mk
Route::get('/change-password', [CustomerController::class, 'change_password']);
Route::post('/submit-change-password', [CustomerController::class, 'submit_change_password']);
//chuyển trang quên mk
Route::get('/forgot-password', [CustomerController::class, 'forgot_password']);
//submit xác thực
Route::post('/submit-forgot-password', [CustomerController::class, 'submit_forgot_password']);

//submit reset password
Route::post('/submit-reset-password', [CustomerController::class, 'submit_reset_password'])->name('submit_reset_password');




//PRODUCT
Route::get('/store', [ProductController::class, 'show_all_product']);

Route::get('/shop-single/{idProduct}',[ProductController::class,'show_product_details']);



Route::get('/search',[ProductController::class, 'search'])->name('search');


Route::post('/search-suggestions',[ProductController::class, 'search_suggestions']);






//ADMIN


//ACCOUNT

Route::get('/admin', [AdminController::class, 'show_login'])->name('admin.login');

Route::post('/submit-admin-login', [AdminController::class, 'submit_admin_login'])->name('admin.submit_admin_login');

Route::get('/admin-logout', [AdminController::class, 'admin_logout'])->name('admin.logout');

Route::get('/my-adprofile',[AdminController::class, 'my_profile'])->name('admin.profile');

Route::get('/edit-profile', [AdminController::class, 'edit_profile']);
Route::post('/submit-edit-adprofile', [AdminController::class, 'submit_edit_adprofile'])->name('admin.submit_edit_adprofile');

Route::get('/change-adpassword', [AdminController::class, 'change_adpassword']);
Route::post('/submit-change-adpassword', [AdminController::class, 'submit_change_adpassword']);

Route::get('/admin-forgotpass', [AdminController::class, 'admin_forgotpass']);
Route::post('/send-reset-code', [AdminController::class, 'submit_send_mail']);
Route::post('/reset-password', [AdminController::class, 'submit_reset_Password']);

Route::get('/manage-customers', [AdminController::class, 'manage_customers']);




//BRAND

Route::get('/manage-brand', [BrandController::class, 'manage_brand'])->name('admin.manage_brand');

Route::get('/add-brand', [BrandController::class, 'add_brand'])->name('admin.add_brand');
Route::post('/submit-add-brand', [BrandController::class, 'submit_add_brand']);

Route::get('/edit-brand/{idBrand}', [BrandController::class, 'edit_brand'])->name('admin.edit_brand');
Route::post('/submit-edit-brand/{idBrand}', [BrandController::class, 'submit_edit_brand']);

Route::get('/delete-brand/{idBrand}', [BrandController::class, 'delete_brand']);


//DANH MỤC
Route::get('/add-category', [CategoryController::class, 'add_category'])->name('admin.add_category');
Route::post('/submit-add-category', [CategoryController::class, 'submit_add_category']);

Route::get('/manage-category', [CategoryController::class, 'manage_category'])->name('admin.manage_category');

Route::get('/edit-category/{idCategory}', [CategoryController::class, 'edit_category'])->name('admin.edit_category');
Route::post('/submit-edit-category/{idCategory}', [CategoryController::class, 'submit_edit_category']);

Route::get('/delete-category/{idCategory}', [CategoryController::class, 'delete_category']);



//Attribute-value

Route::get('/add-attri-value', [AttributeValueController::class, 'add_attri_value'])->name('admin.add_attrival');
Route::post('/submit-add-attri-value', [AttributeValueController::class, 'submit_add_attrival']);

Route::get('/manage-attri-value', [AttributeValueController::class, 'manage_attri_value'])->name('admin.manage_attrival');

Route::get('/edit-attri-value/{idAttriValue}', [AttributeValueController::class, 'edit_at_value'])->name('admin.edit_attrival');
Route::post('/submit-edit-attri-value/{idAttriValue}', [AttributeValueController::class, 'submit_edit_attri_value']);

Route::get('/delete-attri-value/{idAttriValue}', [AttributeValueController::class, 'delete_attr_value']);






//Attribute

Route::get('/add-attribute', [AttributeController::class, 'add_attribute'])->name('admin.add_attribute');
Route::post('/submit-add-attribute', [AttributeController::class, 'submit_add_attribute']);

Route::get('/manage-attribute', [AttributeController::class, 'manage_attribute'])->name('admin.manage_attribute');

Route::get('/edit-attribute/{idAttribute}', [AttributeController::class, 'edit_attribute'])->name('admin.edit_attribute');
Route::post('/submit-edit-attribute/{idAttribute}', [AttributeController::class, 'submit_edit_attribute']);

Route::get('/delete-attribute/{idAttribute}', [AttributeController::class, 'delete_attribute']);

Route::post('/select-attribute', [AttributeController::class, 'select_attribute']);




//PRODUCT

Route::get('/add-product', [ProductController::class, 'add_product']);
Route::post('/submit-add-product', [ProductController::class, 'submit_add_product']);

Route::get('/manage-product', [ProductController::class, 'manage_product']);

Route::get('delete-product/{idProduct}', [ProductController::class, 'delete_product']);


Route::get('/edit-product/{idProduct}', [ProductController::class, 'edit_product']);
Route::post('/submit-edit-product/{idProduct}', [ProductController::class, 'submit_edit_product']);



