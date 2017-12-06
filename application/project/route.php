<?php

use think\Route;

Route::get('project/index/:id', 'project/index/index');

Route::get('project/api/:id', 'project/api/index');

Route::resource('project/api_group', 'project/api_group');