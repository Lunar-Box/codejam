<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Servers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ConsoleController extends Controller
{
    public function deploy(Request $res) {
        $user = Auth::user();
        $servers = Servers::all()->where('owner_id', $user->id);
        if($servers == null) {
            print($servers);
            return view('index');
        }
        $req = Http::post('http://127.0.0.1:5000/create/'.$res->lang);
        // $server = Servers::findOrFail('1');

        $server = new Servers();
        $server->owner_id = Auth::user()->id;
        $server->uuid = $req->json()['data']['uuid'];
        $server->uuid_short = $req->json()['data']['uuid_short'];
        $server->startup = $req->json()['data']['startup'];
        $server->save();

        return view('servers')->with([
            'servers' => $servers,
        ]);
    }

    public function file(Request $res) {
        $file = $res->file('uploadedFile');

        print($file->getClientOriginalName());
        print($file->getClientOriginalExtension());

        $path = $file->store('test/'.$file->getClientOriginalName(), 'containers');
    }

    public function file_manager($id) {
        $server = Servers::findOrFail($id);
        $path = $server->uuid.'/';
        $storage = Storage::disk('containers');

        $files = $storage->files($path);
        // $directories = $storage->allDirectories($path);

        return view('file-manager')->with([
            'server' => $server,
            'files' => $files,
            // 'directories' => $directories,
        ]);
    }
    
    public function file_upload(Request $res, $id) {
        $server = Servers::findOrFail($id);
        $path = $server->uuid.'/';

        $file = $res->file('uploadedFile');
        $filename = $file->getClientOriginalName();

        if($file->getClientOriginalExtension()) {
            $full = $path.$filename.'.'.$file->getClientOriginalExtension();
        } else {
            $full = $path.$filename;
        }

        $storedFile = $file->store($full, 'containers');

        $storage = Storage::disk('containers');

        $files = $storage->files($path);
        $directories = $storage->directories($path);

        return view('file-manager')->with([
            'server' => $server,
            'files' => $files,
            'directories' => $directories,
        ]);
    }

    public function get_servers() {
        $user = Auth::user();
        $servers = Servers::all()->where('owner_id', $user->id);

        return view('servers')->with([
            'servers' => $servers,
        ]);
    }

    public function index() {
        return view('servers');
    }
}
