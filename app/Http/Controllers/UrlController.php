<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UrlController extends Controller
{
    public function createCustomUrl(Request $request)
    {
        $characters = '2345789abcdefghkmnprstwxyzABCDEFGHJKMNPRSTWXYZ';
        $randomString = substr(str_shuffle($characters), 0, 5);

        // Delete existing custom URL if exists
        DB::table('data')->where('key', $request->custom)->delete();

        // Insert new custom URL
        DB::table('data')->insert([
            'key' => $request->custom,
            'url' => $request->url,
        ]);

        $shortUrl = $_SERVER['HTTP_HOST'] . '/' . $request->custom;

        return view('response', compact('shortUrl'));
    }

    public function handleUrl(Request $request, $any = null)
    {
        if ($any && (str_starts_with($any, 'https://') || str_starts_with($any, 'http://'))) {
            $characters = '2345789abcdefghkmnprstwxyzABCDEFGHJKMNPRSTWXYZ';
            $randomString = substr(str_shuffle($characters), 0, 5);

            // Insert new random URL
            DB::table('data')->insert([
                'key' => $randomString,
                'url' => $any,
            ]);

            $shortUrl = $_SERVER['HTTP_HOST'] . '/' . $randomString;

            return view('response', compact('shortUrl'));
        } else {
            $res = DB::select("SELECT * FROM data WHERE `key` = ?", [$any]);

            if (count($res) > 0) {
                return redirect($res[0]->url);
            } else {
                return view('response', ['shortUrl' => 'Not found']);
            }
        }
    }
}
