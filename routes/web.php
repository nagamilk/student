<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;

Route::get('/', [StudentController::class, 'index']);
Route::get('add', [StudentController::class, 'showAdd']);
Route::post('addStudent', [StudentController::class, 'addStudent']);
Route::post('edit', [StudentController::class, 'editStudent']);
Route::post('update', [StudentController::class, 'updateStudent']);
Route::post('delete', [StudentController::class, 'deleteStudent']);
Route::get('filter', [StudentController::class, 'filterStudent']);
Route::get('search', [StudentController::class, 'searchStudent']);






