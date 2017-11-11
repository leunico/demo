<?php

use think\Route;

Route::get('admin/index', 'admin/index/index');

Route::get('admin/settings/index', 'admin/settings/index');

Route::get('admin/api/index', 'admin/api/index');

Route::resource('admin/menu','admin/menu');