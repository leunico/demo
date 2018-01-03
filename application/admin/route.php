<?php

use think\Route;

Route::post('admin/register', 'admin/admin/register');
Route::post('admin/login', 'admin/admin/login');
Route::post('admin/resetpwd', 'admin/admin/resetpwd');

Route::get('admin/index', 'admin/index/index');

Route::get('admin/settings/index', 'admin/settings/index');

Route::resource('admin/menu', 'admin/menu');

Route::resource('admin/project', 'admin/project');

Route::post('admin/project/upload', 'admin/project/upload');