<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });  

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');


Route::get('/dashboard', [TaskController::class, 'pendingTasks'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');
    

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    //Permissions Routes
    Route::get('/permissions', [PermissionController::class, 'index'])->name('permissions.index');
    Route::get('/permissions/create', [PermissionController::class, 'create'])->name('permissions.create');
    Route::post('/permissions', [PermissionController::class, 'store'])->name('permissions.store');
    Route::get('/permissions/{id}/edit', [PermissionController::class, 'edit'])->name('permissions.edit');
    Route::post('/permissions/{id}', [PermissionController::class, 'update'])->name('permissions.update');
    Route::delete('/permissions', [PermissionController::class, 'destroy'])->name('permissions.destroy');

    //Roles routes
    Route::get('/roles', [RoleController::class, 'index'])->name('roles.index');
    Route::get('/roles/create', [RoleController::class, 'create'])->name('roles.create');
    Route::post('/roles', [RoleController::class, 'store'])->name('roles.store');    
    Route::get('/roles/{id}/edit', [RoleController::class, 'edit'])->name('roles.edit');    
    Route::post('/roles/{id}', [RoleController::class, 'update'])->name('roles.update');    
    Route::delete('/roles', [RoleController::class, 'destroy'])->name('roles.destroy');  
    
    //Tasks routes
    Route::get('/tasks', [TaskController::class, 'index'])->name('tasks.index');
    Route::get('/tasks/create', [TaskController::class, 'create'])->name('tasks.create');
    Route::post('/tasks', [TaskController::class, 'store'])->name('tasks.store');    
    Route::get('/tasks/{id}/edit', [TaskController::class, 'edit'])->name('tasks.edit');    
    Route::post('/tasks/{id}', [TaskController::class, 'update'])->name('tasks.update');    
    Route::delete('/tasks', [TaskController::class, 'destroy'])->name('tasks.destroy');  
    Route::get('/task/{id}', [TaskController::class, 'viewTask'])->name('task.view');  

    
    Route::get('/users', [UserController::class, 'index'])->name('users.index');
    Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
    Route::post('/users', [UserController::class, 'store'])->name('users.store');    
    Route::get('/users/{id}/edit', [UserController::class, 'edit'])->name('users.edit');    
    Route::post('/users/{id}', [UserController::class, 'update'])->name('users.update');    
    Route::delete('/users', [UserController::class, 'destroy'])->name('users.destroy');  
    Route::get('/changeUserStatus/{status}/{id}', [UserController::class, 'changeStatus'])->name('users.changeStatus');  


    Route::post('/tasks/update-status/{id}', [TaskController::class, 'updateStatus'])->name('tasks.updateStatus');

});

require __DIR__.'/auth.php';
