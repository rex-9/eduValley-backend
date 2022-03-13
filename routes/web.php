<?php

use Illuminate\Support\Facades\Route;

use App\Mail\JustTesting;
use Illuminate\Support\Facades\Mail;

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

Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/charts', function () {
        return view('charts');
    })->name('charts');

    Route::get('/students', function () {
        return view('students');
    })->name('students');

    Route::get('/teacher', function () {
        return view('teacher');
    })->name('teacher');

    Route::get('/course', function () {
        return view('course');
    })->name('course');

    Route::get('/ad', function () {
        return view('ad');
    })->name('ad');
});

Route::get('/meetValley/{room}', function () {
    return view('meetValley');
})->name('meetValley');

Route::get('/send-mail', function () {

    Mail::to('newuser@example.com')->send(new JustTesting());

    return 'A message has been sent to Mailtrap!';

});

// Route::get('/forgot-password', function () {

//     Mail::to('newuser@example.com')->send(new JustTesting());

//     return 'A message has been sent to Mailtrap!';

// });

// Route::get('/reset-password', function () {

//     Mail::to('newuser@example.com')->send(new JustTesting());

//     return 'A message has been sent to Mailtrap!';

// });
