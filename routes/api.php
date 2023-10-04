<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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


Route::post('/task/api/summary', 'API\TaskAPI@api_task_summary')->name('api-task-summary');
Route::post('/task/api/create', 'API\TaskAPI@api_task_create')->name('api-task-create');
Route::post('/task/api/detail', 'API\TaskAPI@api_task_detail')->name('api-task-detail');
Route::post('/task/api/update', 'API\TaskAPI@api_task_update')->name('api-task-update');
Route::post('/task/api/delete', 'API\TaskAPI@api_task_delete')->name('api-task-delete');