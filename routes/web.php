<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Admin panel route
Route::get('/admin/submissions', function () {
    return view('admin.submissions');
});
