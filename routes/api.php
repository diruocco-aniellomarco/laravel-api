<?php

use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ProjectController;
use App\Http\Controllers\Api\TypeController;
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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
// Route::get("/projects", function() {
//     $projects = Project::paginate(10);
//     // return response()->json([
//     //     "projects" => $projects
//     // ]);
//     return response()->json($projects);
// });

Route::apiResource("projects", ProjectController::class)->only('index','show');
Route::get('/project-type/{type_id}', [ProjectController::class,'projectsByType']);

Route::apiResource("types", TypeController::class)->only('show');