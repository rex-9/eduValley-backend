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
    Route::get('currentUser', [UserController::class, "current"]);

});

Route::post('comments/create', [CommentController::class, "create"]);
Route::post('stars/star', [StarController::class, "star"]);

Route::delete('comments/delete/{id}', [CommentController::class, "delete"]);
Route::delete('stars/delete/{ad_id}/{user_id}', [StarController::class, "delete"]);

Route::post('apilogin', [UserController::class, "login"]);
Route::post('apiregister', [UserController::class, "register"]);

Route::get('getMetta', [UserController::class, "getMetta"]);
Route::put('updateMetta', [UserController::class, "updateMetta"]);
Route::get('users/get', [UserController::class, "total"]);
Route::get('users/search/{email}', [UserController::class, "search"]);


Route::get('getTeachers', [TeacherController::class, "get"]);
Route::get('getTeachers/{id}', [TeacherController::class, "search"]);
Route::get('searchTeachers/{search}', [TeacherController::class, "searches"]);

Route::get('getCourses', [CourseController::class, "get"]);
Route::get('getCourses/{search}', [CourseController::class, "search"]);

Route::get('getVideos', [VideoController::class, "get"]);
Route::get('getVideos/{id}', [VideoController::class, "search"]);

Route::get('getAudio', [AudioController::class, "get"]);
Route::get('getAudio/{id}', [AudioController::class, "search"]);
// Route::get('getUrlsTitles/{id}', [AudioController::class, "searchUrlsTitles"]);

Route::get('getFreevideos', [FreevideoController::class, "get"]);
Route::get('getFreevideos/{id}', [FreevideoController::class, "search"]);

Route::get('getBooks', [BookController::class, "get"]);
Route::get('getBooks/{id}', [BookController::class, "search"]);

Route::get('getGenres', [GenreController::class, "get"]);

Route::get('getAds', [AdController::class, "get"]);
Route::get('getAds/{category}', [AdController::class, "search"]);
Route::get('pluckCategories', [AdController::class, "pluckCategories"]);

Route::get('getMinivideos', [MinivideoController::class, "get"]);
Route::get('getMinivideos/{id}', [MinivideoController::class, "search"]);

Route::get('getPosters', [PosterController::class, "get"]);
Route::get('getPosters/{id}', [PosterController::class, "search"]);
Route::get('getPosters/first/{id}', [PosterController::class, "searchFirst"]);

Route::get('getUsers/{course_id}', [UserCourseController::class, 'getUsers']);
Route::get('getCourses/{user_id}', [UserCourseController::class, 'getCourses']);
Route::get('pluckCourseIds/{user_id}', [UserCourseController::class, 'pluckCourseIds']);
Route::get('getRecords', [UserCourseController::class, 'getRecords']);
Route::get('user_courseRecords/{user_id}/{course_id}', [UserCourseController::class, 'user_courseRecords']);

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

Route::get('pluckGenres', [GenreController::class, "pluck"]);

Route::post('newTeacher', [TeacherController::class, "create"]);
Route::post('newCourse', [CourseController::class, "create"]);
Route::post('newVideo', [VideoController::class, "create"]);
Route::post('newAudio', [AudioController::class, "create"]);
Route::post('newFreevideo', [FreevideoController::class, "create"]);
Route::post('newBook', [BookController::class, "create"]);
Route::post('newGenre', [GenreController::class, "create"]);
Route::post('newAd', [AdController::class, "create"]);
Route::post('newMinivideo', [MinivideoController::class, "create"]);
Route::post('newPoster', [PosterController::class, "create"]);

Route::post('allAccess', [UserCourseController::class, 'allAccess']);
Route::post('attach/{user_id}/{course_id}', [UserCourseController::class, 'attach']);
Route::post('detach/{user_id}/{course_id}', [UserCourseController::class, 'detach']);


Route::put('updateTeacher', [TeacherController::class, "update"]);
Route::put('updateCourse', [CourseController::class, "update"]);
Route::put('updateVideo', [VideoController::class, "update"]);
Route::put('updateAudio', [AudioController::class, "update"]);
Route::put('updateFreevideo', [FreevideoController::class, "update"]);
Route::put('books/update', [BookController::class, "update"]);
Route::put('updateGenre', [GenreController::class, "update"]);
Route::put('updateAd', [AdController::class, "update"]);
Route::put('updateMinivideo', [MinivideoController::class, "update"]);
Route::put('updatePoster', [PosterController::class, "update"]);

Route::delete('users/delete/{email}', [UserController::class, "delete"]);
Route::delete('books/delete/{id}', [BookController::class, "delete"]);
