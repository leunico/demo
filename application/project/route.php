<?php

use think\Route;

Route::get('project/:id/index', 'project/index/index');
Route::get('project/:id/api', 'project/index/api');
Route::get('project/:id/code', 'project/index/code');
Route::get('project/:id/doc', 'project/index/doc');
Route::get('project/:id/team', 'project/index/team');
Route::get('project/:id/log', 'project/index/log');

Route::resource('project/project_group', 'project/project_group');

Route::put('project/api/order/:id', 'project/api/order');
Route::delete('project/api/destroy/:id', 'project/api/destroy');
Route::delete('project/api/all_destroy/:id', 'project/api/all_destroy');
Route::get('project/api/reset/:id', 'project/api/reset');
Route::post('project/api/reset', 'project/api/group');
Route::resource('project/api', 'project/api');

Route::resource('project/code', 'project/code');
Route::put('project/code/order/:id', 'project/code/order');