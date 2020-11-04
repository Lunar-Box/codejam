<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Servers;

class ApplicationController extends Controller
{

    public function startup(Request $res, $id) {
        $server = Servers::findOrFail($id);

        $server->startup = $res->startup_cmd;
        $server->save();

        return redirect('/servers/startup/'.$id);
    }

    public function start($id) {
        $server = Servers::findOrFail($id);
        $res = Http::post('http://127.0.0.1:5000/start/'.$server->uuid.'/'.$server->startup);

        return view('view')->with([
            'log' => $res->json()['data'],
            'server' => $server,
        ]);
    }

    public function restart() {
        $res = Http::post('http://127.0.0.1:5000/restart/'.$server->uuid);

        return view('view')->with([
            'log' => $res->json()['data'],
        ]);
    }

    public function stop() {
        $res = Http::post('http://127.0.0.1:5000/stop/'.$server->uuid);

        return view('view')->with([
            'log' => $res->json()['data'],
        ]);
    }

    public function kill() {
        $res = Http::post('http://127.0.0.1:5000/kill/'.$server->uuid);

        return view('view')->with([
            'log' => $res->json()['data'],
        ]);
    }
}
