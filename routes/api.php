<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\AudioController;
use App\Http\Controllers\VideoController;
use App\Http\Controllers\FreevideoController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\AdController;
use App\Http\Controllers\MinivideoController;
use App\Http\Controllers\PosterController;
use App\Http\Controllers\UserCourseController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\StarController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['middleware' => 'auth:sanctum'], function () {
    //All secure URL's
    Route::post('logout', [UserController::class, "logout"])->name('api.logout');
    Route::get('user/current', [UserController::class, "current"]);
});

Route::post('comments/create', [CommentController::class, "create"]);
Route::post('stars/star', [StarController::class, "star"]);

Route::delete('comments/delete/{id}', [CommentController::class, "delete"]);
Route::delete('stars/delete/{ad_id}/{user_id}', [StarController::class, "delete"]);

Route::post('login/api', [UserController::class, "login"]);
Route::post('register/api', [UserController::class, "register"]);

Route::get('metta/get', [UserController::class, "getMetta"]);
Route::put('metta/update', [UserController::class, "updateMetta"]);
Route::get('users/get', [UserController::class, "total"]);
Route::get('users/get/{idOremail}', [UserController::class, "search"]);


Route::get('teachers/get', [TeacherController::class, "get"]);
Route::get('teacher/get/{id}', [TeacherController::class, "search"]);
Route::get('teachers/get/{role}', [TeacherController::class, "searchByRole"]);

Route::get('courses/get', [CourseController::class, "get"]);
Route::get('courses/get/{search}', [CourseController::class, "search"]);

Route::get('videos/get', [VideoController::class, "get"]);
Route::get('videos/get/{id}', [VideoController::class, "search"]);

Route::get('audio/get', [AudioController::class, "get"]);
Route::get('audio/get/{id}', [AudioController::class, "search"]);
// Route::get('getUrlsTitles/{id}', [AudioController::class, "searchUrlsTitles"]);

Route::get('freevideos/get', [FreevideoController::class, "get"]);
Route::get('freevideos/get/{id}', [FreevideoController::class, "search"]);

Route::get('books/get', [BookController::class, "get"]);
Route::get('books/get/{id}', [BookController::class, "search"]);

Route::get('genres/get', [GenreController::class, "get"]);

Route::get('ads/get', [AdController::class, "get"]);
Route::get('ads/get/{category}', [AdController::class, "search"]);
Route::get('ads/categories/pluck', [AdController::class, "pluckCategories"]);

Route::get('minivideos/get', [MinivideoController::class, "get"]);
Route::get('minivideos/get/{id}', [MinivideoController::class, "search"]);

Route::get('posters/get', [PosterController::class, "get"]);
Route::get('posters/get/{id}', [PosterController::class, "search"]);
Route::get('poster/first/{id}', [PosterController::class, "searchFirst"]);

Route::get('users/{course_id}', [UserCourseController::class, 'getUsers']);
Route::get('courses/{user_id}', [UserCourseController::class, 'getCourses']);
Route::get('courseIds/{user_id}', [UserCourseController::class, 'pluckCourseIds']);
Route::get('records/get', [UserCourseController::class, 'allRecords']);
Route::get('user_course/records/{user_id}/{course_id}', [UserCourseController::class, 'recordsByUserCourse']);

Route::get('comments/get', [CommentController::class, "get"]);
Route::get('stars/get', [StarController::class, "get"]);
Route::get('comments/get/ad/{id}', [CommentController::class, "getbyAd"]);
Route::get('stars/get/ad/{id}', [StarController::class, "getbyAd"]);
Route::get('comments/get/user/{id}', [CommentController::class, "getbyUser"]);
Route::get('stars/get/user/{id}', [StarController::class, "getbyUser"]);
Route::get('comments/get/{user_id}/{ad_id}', [CommentController::class, "getbyUserAndAd"]);
Route::get('stars/get/{user_id}/{ad_id}', [StarController::class, "getbyUserAndAd"]);
Route::get('stars/userStarredAds/{user_id}', [StarController::class, 'userStarredAds']);
Route::get('comments/userCommentedAds/{user_id}', [CommentController::class, 'userCommentedAds']);

Route::get('genres/pluck', [GenreController::class, "pluck"]);

Route::post('teacher/create', [TeacherController::class, "create"]);
Route::post('course/create', [CourseController::class, "create"]);
Route::post('video/create', [VideoController::class, "create"]);
Route::post('audio/create', [AudioController::class, "create"]);
Route::post('freevideo/create', [FreevideoController::class, "create"]);
Route::post('book/create', [BookController::class, "create"]);
Route::post('genre/create', [GenreController::class, "create"]);
Route::post('ad/create', [AdController::class, "create"]);
Route::post('minivideo/create', [MinivideoController::class, "create"]);
Route::post('poster/create', [PosterController::class, "create"]);

Route::post('allAccess', [UserCourseController::class, 'allAccess']);
Route::post('attach/{user_id}/{course_id}', [UserCourseController::class, 'attach']);
Route::post('detach/{user_id}/{course_id}', [UserCourseController::class, 'detach']);


Route::put('teacher/update', [TeacherController::class, "update"]);
Route::put('course/update', [CourseController::class, "update"]);
Route::put('video/update', [VideoController::class, "update"]);
Route::put('audio/update', [AudioController::class, "update"]);
Route::put('freevideo/update', [FreevideoController::class, "update"]);
Route::put('book/update', [BookController::class, "update"]);
Route::put('genre/update', [GenreController::class, "update"]);
Route::put('ad/update', [AdController::class, "update"]);
Route::put('minivideo/update', [MinivideoController::class, "update"]);
Route::put('poster/update', [PosterController::class, "update"]);

Route::delete('users/delete/{email}', [UserController::class, "delete"]);
Route::delete('books/delete/{id}', [BookController::class, "delete"]);
Route::delete('posters/delete/{id}', [PosterController::class, "delete"]);
