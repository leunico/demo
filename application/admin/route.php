<?php

use think\Route;

Route::get('admin/index', 'admin/index/index');

Route::get('admin/settings/index', 'admin/settings/index');

Route::resource('admin/menu', 'admin/menu');

Route::resource('admin/project', 'admin/project');

Route::post('admin/project/upload', 'admin/project/upload');