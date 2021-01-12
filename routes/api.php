<?php

use App\Advertisement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use TCG\Voyager\Models\Page;
use \TCG\Voyager\Models\Post;
use App\Course;
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
// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::group(['prefix'=>'v1'], function() {
    Route::post('/login', 'UserController@login');
    Route::post('/register', 'UserController@register');
    Route::get('/logout', 'UserController@logout')->middleware('auth:api');
    Route::get('/pages', function() {
        $pages =  Page::all();
        return response()->json($pages)->header('Connection', 'keep-alive');
    });
    Route::get('/advertisements', function() {
        $advertisements =  Advertisement::all();
        return response()->json($advertisements)->header('Connection', 'keep-alive');
    });
    Route::get('/courses', function() {
        $courses =  Course::all();
        return response()->json($courses)->header('Connection', 'keep-alive');
    });
});


Route::get('/posts', function() {
    return Post::all();
});
