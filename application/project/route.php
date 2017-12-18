<?php

use think\Route;

Route::get('project/:id/index', 'project/index/index');

Route::get('project/:id/api', 'project/index/api');

Route::put('project/api/order/:id', 'project/api/order');

Route::delete('project/api/destroy/:id', 'project/api/destroy');

Route::get('project/api/reset/:id', 'project/api/reset');
Route::post('project/api/reset', 'project/api/reset');

Route::resource('project/api_group', 'project/api_group');

Route::resource('project/api', 'project/api');