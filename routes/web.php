<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\UrlController;

Route::post('/customUrl', [UrlController::class, 'createCustomUrl']);


Route::get('/', function () {
    return view('index');
});

Route::get('/css/{any}', function ($any) {
    return response()->file(resource_path('css/' . $any), [
        'Content-Type' => 'text/css'
    ]);
});

Route::get('/js/{any}', function ($any) {
    return response()->file(resource_path('js/' . $any), [
        'Content-Type' => 'application/javascript'
    ]);
});

Route::get('/{url?}', [UrlController::class, 'handleUrl'])->where('url', '(.*)');


