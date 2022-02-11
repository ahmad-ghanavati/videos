<?php

use App\Models\Video;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\indexController;
use App\Http\Controllers\VideoController;
use App\Http\Controllers\CategoryVideoController;

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

Route::get('/',[indexController::class,'index'])->name('index');
Route::get('/videos/create',[VideoController::class,'create'])->name('videos.create');
Route::post('/videos',[VideoController::class,'store'])->name('videos');
Route::get('/videos/{video}',[VideoController::class,'show'])->name('videos.show');
Route::get('/videos/{video}/edit',[VideoController::class,'edit'])->name('videos.edit');
Route::post('/videos/{video}',[VideoController::class,'update'])->name('videos.update');
Route::get('/categories/{category:slug}/video',[CategoryVideoController::class,'index'])->name('categories.videos.index');

Route::get('factory', function(){
    Video::factory()->count(5)->create();
    echo "یک رکورد فکتوری به دیتابیس شما اضافه شد";
});

