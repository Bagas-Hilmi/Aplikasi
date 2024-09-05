<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SiswaController;

require base_path('routes/web_template.php');

Route::resource('siswa', SiswaController::class);

Route::get('/', function () {
    return view('welcome');
});


