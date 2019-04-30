<?php
Route::get('/', function () { return redirect('/admin/home'); });

// Authentication Routes...
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login')->name('auth.login');
Route::post('logout', 'Auth\LoginController@logout')->name('auth.logout');

// Change Password Routes...
Route::get('change_password', 'Auth\ChangePasswordController@showChangePasswordForm')->name('auth.change_password');
Route::patch('change_password', 'Auth\ChangePasswordController@changePassword')->name('auth.change_password');

// Password Reset Routes...
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('auth.password.reset');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('auth.password.reset');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset')->name('auth.password.reset');

Route::group(['middleware' => ['auth'], 'prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::get('/home', 'HomeController@index');
    
    Route::resource('permissions', 'Admin\PermissionsController');
    Route::post('permissions_mass_destroy', ['uses' => 'Admin\PermissionsController@massDestroy', 'as' => 'permissions.mass_destroy']);
    Route::resource('roles', 'Admin\RolesController');
    Route::post('roles_mass_destroy', ['uses' => 'Admin\RolesController@massDestroy', 'as' => 'roles.mass_destroy']);
    Route::resource('users', 'Admin\UsersController');
    Route::post('users_mass_destroy', ['uses' => 'Admin\UsersController@massDestroy', 'as' => 'users.mass_destroy']);
    Route::resource('contact_companies', 'Admin\ContactCompaniesController');
    Route::post('contact_companies_mass_destroy', ['uses' => 'Admin\ContactCompaniesController@massDestroy', 'as' => 'contact_companies.mass_destroy']);
    Route::resource('contacts', 'Admin\ContactsController');
    Route::post('contacts_mass_destroy', ['uses' => 'Admin\ContactsController@massDestroy', 'as' => 'contacts.mass_destroy']);
    Route::resource('user_actions', 'Admin\UserActionsController');
    Route::resource('gittests', 'Admin\GittestsController');
    Route::post('gittests_mass_destroy', ['uses' => 'Admin\GittestsController@massDestroy', 'as' => 'gittests.mass_destroy']);
    Route::post('gittests_restore/{id}', ['uses' => 'Admin\GittestsController@restore', 'as' => 'gittests.restore']);
    Route::delete('gittests_perma_del/{id}', ['uses' => 'Admin\GittestsController@perma_del', 'as' => 'gittests.perma_del']);
    Route::resource('gittest2s', 'Admin\Gittest2sController');
    Route::post('gittest2s_mass_destroy', ['uses' => 'Admin\Gittest2sController@massDestroy', 'as' => 'gittest2s.mass_destroy']);
    Route::post('gittest2s_restore/{id}', ['uses' => 'Admin\Gittest2sController@restore', 'as' => 'gittest2s.restore']);
    Route::delete('gittest2s_perma_del/{id}', ['uses' => 'Admin\Gittest2sController@perma_del', 'as' => 'gittest2s.perma_del']);
    Route::resource('gittest3s', 'Admin\Gittest3sController');
    Route::post('gittest3s_mass_destroy', ['uses' => 'Admin\Gittest3sController@massDestroy', 'as' => 'gittest3s.mass_destroy']);
    Route::post('gittest3s_restore/{id}', ['uses' => 'Admin\Gittest3sController@restore', 'as' => 'gittest3s.restore']);
    Route::delete('gittest3s_perma_del/{id}', ['uses' => 'Admin\Gittest3sController@perma_del', 'as' => 'gittest3s.perma_del']);
    Route::resource('gittest_4s', 'Admin\Gittest4sController');
    Route::post('gittest_4s_mass_destroy', ['uses' => 'Admin\Gittest4sController@massDestroy', 'as' => 'gittest_4s.mass_destroy']);
    Route::post('gittest_4s_restore/{id}', ['uses' => 'Admin\Gittest4sController@restore', 'as' => 'gittest_4s.restore']);
    Route::delete('gittest_4s_perma_del/{id}', ['uses' => 'Admin\Gittest4sController@perma_del', 'as' => 'gittest_4s.perma_del']);
    Route::resource('gittest_5s', 'Admin\Gittest5sController');
    Route::post('gittest_5s_mass_destroy', ['uses' => 'Admin\Gittest5sController@massDestroy', 'as' => 'gittest_5s.mass_destroy']);
    Route::post('gittest_5s_restore/{id}', ['uses' => 'Admin\Gittest5sController@restore', 'as' => 'gittest_5s.restore']);
    Route::delete('gittest_5s_perma_del/{id}', ['uses' => 'Admin\Gittest5sController@perma_del', 'as' => 'gittest_5s.perma_del']);
    Route::resource('gittest_7s', 'Admin\Gittest7sController');
    Route::post('gittest_7s_mass_destroy', ['uses' => 'Admin\Gittest7sController@massDestroy', 'as' => 'gittest_7s.mass_destroy']);
    Route::post('gittest_7s_restore/{id}', ['uses' => 'Admin\Gittest7sController@restore', 'as' => 'gittest_7s.restore']);
    Route::delete('gittest_7s_perma_del/{id}', ['uses' => 'Admin\Gittest7sController@perma_del', 'as' => 'gittest_7s.perma_del']);



 
});
