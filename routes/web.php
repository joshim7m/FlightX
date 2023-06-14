<?php

use Illuminate\Support\Facades\Route;




Route::view('/{any?}', 'home')->name('home')->where('any', '.*');
