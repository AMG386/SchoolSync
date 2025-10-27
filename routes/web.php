<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;




Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {

    Route::get('/', 'App\Http\Controllers\HomeController@index');
    Route::get('/home', 'App\Http\Controllers\HomeController@index')->name('home');

    Route::resources([

        'employees'        => 'App\Http\Controllers\Operations\EmployeeController',
        'students'        => 'App\Http\Controllers\Operations\StudentController',
        'guardians'        => 'App\Http\Controllers\Operations\GuardianController',
        'schoolclasses' => 'App\Http\Controllers\Masters\SchoolClassController',
        'subjects' => 'App\Http\Controllers\Masters\SubjectController',
        'classsubjects' => 'App\Http\Controllers\Masters\ClassSubjectController',
        'standards' => 'App\Http\Controllers\Masters\StandardController',
        'calander' => 'App\Http\Controllers\Settings\CalanderController',
        'users' => 'App\Http\Controllers\Settings\UserController',
        'usergroups' => 'App\Http\Controllers\Settings\UserGroupController',
        
    ]);
    
Route::get('classsubjects/create/{schoolclass_id}', ['App\Http\Controllers\Masters\ClassSubjectController'::class, 'create'])->name('classsubjects.create');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    /*******************************************************/
    //users
    /*******************************************************/
    Route::post('/users/changeroles', 'App\Http\Controllers\Settings\UserController@changeRoles')->name('users.roles.change');
    Route::post('/usergroups/changeroles', 'App\Http\Controllers\Settings\UserGroupController@changeRoles')->name('usergroups.roles.change');
    Route::post('/usergroups/changespecialpermission', 'App\Http\Controllers\Settings\UserGroupController@changeSpecialPermissions')->name('usergroups.roles.changespecialpermissions');
    Route::post('/users/applygrouppermission', 'App\Http\Controllers\Settings\UserController@applyGroupPermission')->name('users.roles.applygrouppermission');
   
});

require __DIR__ . '/auth.php';
