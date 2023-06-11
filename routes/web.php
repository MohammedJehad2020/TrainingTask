<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Users\UsersController;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use SimpleSoftwareIO\QrCode\Facades\QrCode;


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

Route::get('/', function () {
    return redirect('/login');
});

Route::group([
    'prefix' => LaravelLocalization::setLocale(),
], function () {

// Route::get('/users', function () {
//     return view('users');
// })->middleware(['auth', 'verified'])->name('users');

Route::middleware(['auth', 'checkUser'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::post('/profile/reset-password', [ProfileController::class, 'resetPassword'])->name('profile.resetPassword');


    Route::resource('users', UsersController::class);
    Route::post('/delete-users', [UsersController::class, "del_ids"])->name("users.del_ids");
    
    Route::get('qrcode-with-image', function () {
  
        $image = QrCode::format('png')
                         ->merge(public_path('images/1644463030.png'), 0.5, true)
                         ->size(500)
                         ->errorCorrection('H')
                         ->generate('A simple example of QR code!');
  
        return response($image)->header('Content-type','image/png');
});
    
});

require __DIR__.'/auth.php';


});
