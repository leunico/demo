<?php

use think\Route;

Route::get('project/:id/index', 'project/index/index');

Route::get('project/:id/api', 'project/index/api');

Route::put('project/api/order/:id', 'project/api/order');

Route::resource('project/api_group', 'project/api_group');

Route::resource('project/api', 'project/api');