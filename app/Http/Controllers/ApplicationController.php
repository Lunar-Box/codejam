<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Servers;

class ApplicationController extends Controller
{
    public function start($id) {
        $res = Http::post('http://127.0.0.1:5000/start');
        $server = Servers::findOrFail($id);

        return view('view')->with([
            'log' => $res->json()['data'],
            'server' => $server,
        ]);
    }

    public function restart() {
        $res = Http::post('http://127.0.0.1:5000/restart');

        return view('view')->with([
            'log' => $res->json()['data'],
        ]);
    }

    public function stop() {
        $res = Http::post('http://127.0.0.1:5000/stop');

        return view('view')->with([
            'log' => $res->json()['data'],
        ]);
    }

    public function kill() {
        $res = Http::post('http://127.0.0.1:5000/kill');

        return view('view')->with([
            'log' => $res->json()['data'],
        ]);
    }
}
