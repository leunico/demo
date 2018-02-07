<?php

use think\Route;

# index控制器模块
Route::get('project/:id/index', 'project/index/index');
Route::get('project/:id/api', 'project/index/api');
Route::get('project/:id/code', 'project/index/code');
Route::get('project/:id/doc', 'project/index/doc');
Route::get('project/:id/team', 'project/index/team');
Route::get('project/:id/log', 'project/index/log');

# group控制器模块
Route::resource('project/project_group', 'project/project_group');

# api控制器模块
Route::put('project/api/order/:id', 'project/api/order');
Route::delete('project/api/destroy/:id', 'project/api/destroy');
Route::delete('project/api/all_destroy/:id', 'project/api/all_destroy');
Route::get('project/api/reset/:id', 'project/api/reset');
Route::post('project/api/reset', 'project/api/group');
Route::resource('project/api', 'project/api');

# code控制器模块
Route::resource('project/code', 'project/code');
Route::put('project/code/order/:id', 'project/code/order');

# doc控制器模块
Route::resource('project/doc', 'project/doc');
Route::put('project/doc/order/:id', 'project/doc/order');

# team控制器模块
Route::get('project/team/:id', 'project/team/index');
Route::post('project/team/search', 'project/team/search');
Route::post('project/team/add', 'project/team/add');
Route::put('project/team/set', 'project/team/set');
Route::put('project/team/remark', 'project/team/remark');

# log控制器模块
Route::get('project/log/:id', 'project/log/index');