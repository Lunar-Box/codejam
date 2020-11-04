<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Servers;

class IndexController extends Controller
{
    public function index() {
        return view('index');
    }

    public function startup($id) {
        $server = Servers::findOrFail($id);
        return view('startup')->with([
            'server' => $server,
        ]);
    }

    public function deploy() {
        return view('deploy');
    }

    public function create(Request $request) {
        $server = new Servers();
        $server->owner = $request->owner;
        $server->uuid = $request->uuid;
        $server->uuidshort = $request->uuidshort;
        $server->name = $request->name;
        $server->description = $request->description;
        $server->cpu = $request->cpu;
        $server->memory = $request->memory;
        $server->disk = $request->disk;
        $server->node = $request->node;
        $server->ports = $request->port;
        $server->suspended = false;
        $server->image = $request->image;
        $server->startup = $request->startup;
    }
}
