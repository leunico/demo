<?php

use think\Route;

Route::get('admin/index', 'admin/index/index');

Route::get('admin/settings/index', 'admin/settings/index');

Route::get('admin/menu/create', 'admin/menu/create');
Route::get('admin/menu', 'admin/menu/index');
Route::post('admin/menu/save', 'admin/menu/save');

//Route::resource('menu','admin/menu');