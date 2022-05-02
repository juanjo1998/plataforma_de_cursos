<?php

use App\Http\Controllers\Instructor\CourseController;
use Illuminate\Support\Facades\Route;

/* esta ruta reirige a la de abajo */

Route::redirect('/','instructor/courses');

Route::resource('/courses',CourseController::class)->names('courses');


?>