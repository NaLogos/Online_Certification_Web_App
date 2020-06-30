<?php

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('exam/categories/{category}', 'BrowseExamsController@category')->name('exam.category');
Route::get('exam/tags/{tag}', 'BrowseExamsController@tag')->name('exam.tag');
Route::get('/','BrowseExamsController@index')->name('browse');
// User
Route::group(['as' => 'client.', 'middleware' => ['auth']], function () {
    
    Route::get('home', 'HomeController@redirect');
    Route::get('dashboard', 'HomeController@index')->name('home');
    
    Route::get('change-password', 'ChangePasswordController@create')->name('password.create');
    Route::post('change-password', 'ChangePasswordController@update')->name('password.update');
    
 
    Route::post('registering','BrowseExamsController@registering')->name('registering');

    Route::get('test/{session}', 'TestsController@index')->name('test');
    Route::post('test', 'TestsController@store')->name('test.store');
    
    Route::get('results/{result_id}', 'ResultsController@show')->name('results.show');
    Route::get('send/{result_id}', 'ResultsController@send')->name('results.send');
});

Auth::routes();
// Admin

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth.admin']], function () {
    Route::get('/', 'HomeController@index')->name('home');
    // Permissions
    Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');
    Route::resource('permissions', 'PermissionsController');

    // Roles
    Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');
    Route::resource('roles', 'RolesController');

    // Users
    Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');
    Route::resource('users', 'UsersController');

    // Categories
    Route::delete('categories/destroy', 'CategoriesController@massDestroy')->name('categories.massDestroy');
    Route::resource('categories', 'CategoriesController');

    // Tags
    Route::delete('tags/destroy', 'TagsController@massDestroy')->name('tags.massDestroy');
    Route::resource('tags', 'TagsController');
    
    // Exams
    Route::delete('exams/destroy', 'ExamsController@massDestroy')->name('exams.massDestroy');
    Route::resource('exams', 'ExamsController');

    // Questions
    Route::delete('questions/destroy', 'QuestionsController@massDestroy')->name('questions.massDestroy');
    Route::resource('questions', 'QuestionsController');

    // Options
    Route::delete('options/destroy', 'OptionsController@massDestroy')->name('options.massDestroy');
    Route::resource('options', 'OptionsController');

    // Results
    Route::delete('results/destroy', 'ResultsController@massDestroy')->name('results.massDestroy');
    Route::resource('results', 'ResultsController');
});
