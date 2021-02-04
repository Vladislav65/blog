<?php

// Массив маршрутов сайта
return [
    '^/*$' => 'Main/index',
    'registration' => 'User/registration',
    'auth' => 'User/auth',
    'admin' => 'Admin/account',
    'reader' => 'Reader/account',
    'logout' => 'User/logout',
    'catalog' => 'News/catalog/catalog',
    'item([0-9]+)' => 'News/getNewsItem/$1',
    'dateSort' => 'News/catalog/date',
    'viewsSort' => 'News/catalog/views',
    'edit([0-9]+)' => 'Admin/editItem/$1',
    'add' => 'Admin/add'
];