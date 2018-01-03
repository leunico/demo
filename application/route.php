<?php

return [
    '__pattern__' => [
        'name' => '\w+',
    ],

//    '[hello]' => [
//        ':id'   => ['index/hello', ['method' => 'get'], ['id' => '\d+']],
//        ':name' => ['index/hello', ['method' => 'post']],
//    ],
    'index/login' => ['index/index/login', ['method' => 'get']],
    'index/register' => ['index/index/register', ['method' => 'get']],
    'index/resetpwd' => ['index/index/resetpwd', ['method' => 'get']],
];
