<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

Route::post('/customUrl', function(Request $request) {

    $characters = '2345789abcdefghkmnprstwxyzABCDEFGHJKMNPRSTWXYZ';
    $randomString = substr(str_shuffle($characters), 0, 5);

    DB::table('data')->where('key', $request->custom)->delete();
    DB::table('data')->insert([
        'key' => $request->custom,
        'url' => $request->url,
    ]);

    $shortUrl = $_SERVER['HTTP_HOST'] . '/' . $request->custom;
    return view('response', compact('shortUrl'));

});

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

Route::get('/{url?}', function ($any) {

    if (str_starts_with($any, 'https://') || str_starts_with($any, 'http://')){

        $characters = '2345789abcdefghkmnprstwxyzABCDEFGHJKMNPRSTWXYZ';
        $randomString = substr(str_shuffle($characters), 0, 5);

        DB::table('data')->insert([
            'key' => $randomString,
            'url' => $any,
        ]);

        $shortUrl = $_SERVER['HTTP_HOST'] . '/' . $randomString;

        return view('response', compact('shortUrl'));

    }else{

        $res = DB::select('SELECT * FROM data WHERE key = ?', [$any]);
        if(count($res) > 0) {
            return redirect($res[0]->url);
        }else{
            return view('response', ['shortUrl' => 'Not found']);
        }

    }

})->where('url', '(.*)');

