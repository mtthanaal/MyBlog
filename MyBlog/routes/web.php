<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ReviewController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'homepage'])->name('home.homepage');

Route::get('/home', [HomeController::class, 'index'])->middleware('auth')->name('home');

Route::middleware('auth')->group(function () {

    Route::get('/post_page', [AdminController::class, 'post_page']);
    Route::post('/add_post', [AdminController::class, 'add_post']);
    Route::get('/show_post', [AdminController::class, 'show_post']);
    Route::get('/delete_post/{id}', [AdminController::class, 'delete_post']);
    Route::get('/edit_page/{id}', [AdminController::class, 'edit_page']);
    Route::post('/update_post/{id}', [AdminController::class, 'update_post']);
    Route::get('/accept_post/{id}', [AdminController::class, 'accept_post']);
    Route::get('/reject_post/{id}', [AdminController::class, 'reject_post']);

    Route::get('/create_post', [HomeController::class, 'create_post']);
    Route::post('/user_post', [HomeController::class, 'user_post']);
    Route::get('/my_post', [HomeController::class, 'my_post']);
    Route::get('/my_post_del/{id}', [HomeController::class, 'my_post_del']);
    Route::get('/post_update_page/{id}', [HomeController::class, 'post_update_page']);
    Route::post('/update_post_data/{id}', [HomeController::class, 'update_post_data']);
    Route::post('/submit_review', [HomeController::class, 'store_review'])->name('submit_review');
    Route::get('/approved_comments', [HomeController::class, 'approvedComments'])->name('approved_comments');
    
    Route::get('admin/reviews', [ReviewController::class, 'manageReviews'])->name('admin.reviews');
    Route::post('admin/review/{id}/approve', [ReviewController::class, 'approveReview']);
    Route::post('admin/review/{id}/reject', [ReviewController::class, 'rejectReview']);

    Route::get('/users', [AdminController::class, 'users'])->name('admin.users');
    Route::get('/deleteuser/{id}', [AdminController::class, 'delete'])->name('deleteuser');

    Route::get('/editUser/{id}', [AdminController::class, 'showEditUserForm'])->name('editUser');
    Route::put('/updateUser/{id}', [AdminController::class, 'updateUser'])->name('updateUser');

    Route::post('/submit_reply', [HomeController::class, 'store_reply'])->name('submit_reply');
    Route::put('/update_review/{review}', [HomeController::class, 'updateReview'])->name('update_review');
    Route::delete('/delete_review/{review}', [HomeController::class, 'destroyReview'])->name('delete_review');

    Route::get('/users', [AdminController::class, 'users'])->name('users');
    Route::get('/admin/users', [AdminController::class, 'users'])->name('admin.users');


});

Route::get('/post_details/{id}', [HomeController::class, 'post_details'])->name('post_details');

require __DIR__.'/auth.php';
