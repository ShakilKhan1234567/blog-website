<?php

use App\Http\Controllers\BannerController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\frontendController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SingleblogController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\TagviewController;
use App\Http\Controllers\UserAuthController;
use App\Http\Controllers\UserprofileController;
use App\Models\Category;
use Illuminate\Support\Facades\Route;

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

Route::get('/dashboard', [DashboardController::class, 'dashboard'])->middleware(['auth', 'verified'])->name('dashboard');

// frontend
Route::get('/', [frontendController::class, 'index'])->name('index');
Route::get('/lifestyle', [frontendController::class, 'lifestyle'])->name('lifestyle');

// banner
Route::get('/banner', [BannerController::class, 'banner'])->name('banner');
Route::post('/banner/store', [BannerController::class, 'banner_store'])->name('banner.store');
Route::get('/banner/status/{id}', [BannerController::class, 'banner_status'])->name('banner.status');
Route::get('/delete/banner/{id}', [BannerController::class, 'delete_banner'])->name('delete.banner');

// single blog
Route::get('/banner/blog/{id}', [SingleblogController::class, 'banner_blog'])->name('banner.blog');
Route::get('/single/blog/page/{id}', [SingleblogController::class, 'single_blog_page'])->name('single.blog.page');
Route::get('/single/trending/page/{id}', [SingleblogController::class, 'single_trending_page'])->name('single.trending.page');

// tag view
Route::get('/tag/view/{id}', [TagviewController::class, 'tag_view'])->name('tag.view');

// category through show
Route::get('/category/show/{id}', [CategoryController::class, 'category_show'])->name('category.show');

// frontend menu
Route::get('/menu', [frontendController::class, 'menu'])->name('menu');
Route::post('/menu/store', [frontendController::class, 'menu_store'])->name('menu.store');
Route::get('/delete/menu/{id}', [frontendController::class, 'delete_menu'])->name('delete.menu');

// comment
Route::get('/comment', [CommentController::class, 'comment'])->name('comment');
Route::post('/comment/store/{id}', [CommentController::class, 'comment_store'])->name('comment.store');
Route::get('/delete/comment/{id}', [CommentController::class, 'delete_comment'])->name('delete.comment');
Route::get('/comment/reply/{id}', [CommentController::class, 'comment_reply'])->name('comment.reply');
Route::post('/reply/store', [CommentController::class, 'reply_store'])->name('reply.store');

// search page
Route::get('/search/page', [frontendController::class, 'search_page'])->name('search.page');

// status update for notification
Route::get('/single/comment/{id}', [frontendController::class, 'single_comment'])->name('single.comment');
Route::get('/status/update/{id}', [frontendController::class, 'status_update'])->name('status.update');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

// user
Route::get('/user/profile', [UserprofileController::class, 'user_profile'])->name('user.profile');
Route::get('/user/list', [DashboardController::class, 'user_list'])->name('user.list');
Route::post('/user/profile/update', [UserprofileController::class, 'user_profile_profile'])->name('user.profile.update');
Route::post('/user/password/update', [UserprofileController::class, 'user_password_update'])->name('user.password.update');
Route::post('/user/photo/update', [UserprofileController::class, 'user_photo_update'])->name('user.photo.update');

// category
Route::get('/category', [CategoryController::class, 'category'])->name('category');
Route::post('/category/store', [CategoryController::class, 'category_store'])->name('category.store');
Route::get('/category/delete/{id}', [CategoryController::class, 'category_delete'])->name('category.delete');
Route::get('/category/edit/{id}', [CategoryController::class, 'category_edit'])->name('category.edit');
Route::post('/category/update/{id}', [CategoryController::class, 'category_update'])->name('category.update');

// blog
Route::get('/blog', [BlogController::class, 'blog'])->name('blog');
Route::post('/blog/store', [BlogController::class, 'blog_store'])->name('blog.store');
Route::get('/blog/list', [BlogController::class, 'blog_list'])->name('blog.list');
Route::get('/delete/blog/{id}', [BlogController::class, 'delete_blog'])->name('delete.blog');
Route::get('/edit/blog/{id}', [BlogController::class, 'edit_blog'])->name('edit.blog');
Route::post('/blog/update/{id}', [BlogController::class, 'blog_update'])->name('blog.update');

// subscriber
Route::post('/subscriber', [BlogController::class, 'subscriber'])->name('subscriber');

// tags
Route::get('/subscriber', [TagController::class, 'tag'])->name('tag');
Route::post('/tag/store', [TagController::class, 'tag_store'])->name('tag.store');
Route::get('/delete/tag/{id}', [TagController::class, 'delete_tag'])->name('delete.tag');
