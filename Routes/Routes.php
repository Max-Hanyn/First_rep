<?php


//    Route::set('home','HomeController.index');
//
//
//Route::group("12",function (){
//    Route::test('1');
//});


Route::set('`profile/logout`', 'ProfileController.logout', RolesModel::ROLE_USER_ID);
//Route::set('profile', 'ProfileController.index', RolesModel::ROLE_USER_ID);
Route::set('profile/:id', 'ProfileController.index');
Route::set('verify', 'VerifyController.index');
Route::set('verify/:token', 'VerifyController.verify');
Route::set('profile/:id/:name', 'ProfileController.checkUser');
Route::set('profile/rere/rere/:id', 'ProfileController.index', RolesModel::ROLE_USER_ID);
Route::set('admin', 'AdminController.index', RolesModel::ROLE_ADMIN_ID);
//Route::set('profile', 'ProfileController.index', RolesModel::ROLE_USER_ID);

//
Route::set('admin', 'AdminController.index', RolesModel::ROLE_ADMIN_ID);
//
//
Route::set('login', 'LoginController.login');
//
Route::set('register', 'RegisterController.registration');

Route::check();