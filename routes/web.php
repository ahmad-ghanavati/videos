<?php

use App\Jobs\otg;
use App\Models\User;
use App\Models\Video;
use App\Mail\VerifyEmail;
use App\Jobs\ProcessVideo;

use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Mail;
use App\Notifications\VideoProcessed;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\LikeController;
use Illuminate\Support\Facades\Response;
use App\Http\Controllers\indexController;
use App\Http\Controllers\VideoController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\DislikeController;
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
Route::post('videos/{video}/comments',[CommentController::class,'store'])->name('comments.store');
Route::get('{likeable_type}/{likeable_id}/like',[LikeController::class,'store'])->name('likes.store');
Route::get('{likeable_type}/{likeable_id}/disLike',[DislikeController::class,'store'])->name('dislikes.store');

Route::get('factory', function(){
    Video::factory()->count(5)->create();
    echo "یک رکورد فکتوری به دیتابیس شما اضافه شد";
});

// Route::get('file', function (){
    
    // return storage::download('contracts/pic.jpg',$ahmad,$header);
    
//    return response()->file(storage_path('app/contracts/pic.jpg'));
// });



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

// Route::get('/email', function(){
//     $user =  User::find(8);
//    return new VerifyEmail($user);
    
// });

Route::get('/verify/{id}',function(){
    dd(request()->hasValidSignature());
    echo"very";
})->name('verify');

Route::get('/genrate',function(){
    echo URL::temporarySignedRoute('verify',now()->addSeconds(5),['id'=>5]);
}); 


Route::get('/jobs',function(){
    ProcessVideo::dispatch();
});
Route::get('/jobs',function(){
    otg::dispatch();
});

Route::get('/notify', function(){
    $user=User::latest()->first();
    $video=Video::latest()->first();
    $user->notify(new VideoProcessed($video));
});



// Route::get('query', function (){
//     $video=Video::all();
    
//     foreach($video as $video)
//     dump($video->user->name);
// });