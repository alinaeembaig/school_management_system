<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SemesterController;
use App\Http\Controllers\CoursesController;
use App\Http\Controllers\SubjectsController;
use App\Http\Controllers\StudentsController;
use App\Http\Controllers\TeachersController;
use App\Http\Controllers\UserController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});
Route::middleware(['auth', 'verified'])->group(function () {
    Route::resource('/users', UserController::class);
    Route::resource('/students', StudentsController::class);
    Route::resource('/teachers', TeachersController::class);

    Route::resource('/semesters', SemesterController::class);

    Route::resource('/roles', RoleController::class);
    Route::resource('/courses', CoursesController::class);
    Route::resource('/subjects', SubjectsController::class);
    Route::resource('/permissions', PermissionController::class);
    Route::get('/assignTOStudent/{id}', [CoursesController::class, 'assignTOStudent'])->name('courses.assignTOStudent');    
    Route::post('/assignStudent', [CoursesController::class, 'assignStudent'])->name('courses.assignStudent');    
    Route::get('/myCourse', [StudentsController::class, 'myCourse'])->name('students.myCourse');    
    
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth','role:admin'])->group(function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
    
});

require __DIR__.'/auth.php';
