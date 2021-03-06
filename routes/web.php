<?php

use App\Http\Controllers\CourseController;
use App\Http\Controllers\HomeController;
use App\Http\Livewire\CourseStatus;
use Illuminate\Support\Facades\Route;

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

Route::get('/',HomeController::class)->name('home');

/* cursos */
Route::get('cursos',[CourseController::class,'index'])->name('courses.index');

/* show */

Route::get('cursos/{course}',[CourseController::class,'show'])->name('courses.show');

/* course enrolled */
Route::post('cursos/{course}/enrolled',[CourseController::class,'enrolled'])->middleware('auth')->name('courses.enrolled');

/* course status */
Route::get('curso-status/{course}',CourseStatus::class)->name('courses.status')->middleware('auth');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
