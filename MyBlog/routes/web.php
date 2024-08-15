<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ReviewController;


Route::get('/', [HomeController::class,'homepage'])->name('home.homepage');

Route::get('/home', [HomeController::class, 'index'])->middleware('auth')->name('home');

Route::middleware('auth')->group(function () {

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');

    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');

    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/post_page', [AdminController::class,'post_page']);

    Route::post('/add_post', [AdminController::class,'add_post']);

    Route::get('/show_post', [AdminController::class,'show_post']);

    Route::get('/delete_post/{id}', [AdminController::class,'delete_post']);

    Route::get('/edit_page/{id}', [AdminController::class,'edit_page']);

    Route::post('/update_post/{id}', [AdminController::class,'update_post']);

    Route::get('/accept_post/{id}', [AdminController::class,'accept_post']);

    Route::get('/reject_post/{id}', [AdminController::class,'reject_post']);

    Route::get('/create_post', [HomeController::class,'create_post']);

    Route::post('/user_post', [HomeController::class,'user_post']);

    Route::get('/my_post', [HomeController::class,'my_post']);

    Route::get('/my_post_del/{id}', [HomeController::class,'my_post_del']);

    Route::get('/post_update_page/{id}', [HomeController::class,'post_update_page']);

    Route::post('/update_post_data/{id}', [HomeController::class,'update_post_data']);

    Route::post('/submit_review', [HomeController::class, 'store_review'])->name('submit_review');

    Route::get('/approved_comments', [HomeController::class, 'approvedComments'])->name('approved_comments');

    Route::get('admin/reviews', [ReviewController::class, 'manageReviews'])->name('admin.reviews');

    Route::post('admin/review/{id}/approve', [ReviewController::class, 'approveReview']);

    Route::post('admin/review/{id}/reject', [ReviewController::class, 'rejectReview']);

    Route::get('/users', [AdminController::class, 'users'])->name('users');

    Route::get('/deleteuser/{id}', [AdminController::class, 'delete'])->name('deleteuser');
});

Route::get('/post_details/{id}', [HomeController::class,'post_details'])->name('post_details');

require __DIR__.'/auth.php';
