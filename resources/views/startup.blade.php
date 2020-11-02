@extends('layouts.base')
@section('head')
<style>
    .contain {
            margin-top: 100px !important;
            background-color: rgba(0, 0, 0, 0.3);
            padding: 15px;
            height: 400px;
            width: 60%;
            margin: 0 auto;
            align-items: center;
            justify-content: center;
        }
        h1 {
            color: white;
            font-size: 32px;
            font-weight: 600;
        }
        label {
            color: white;
            font-size: 24px;
            font-weight: 500;
        }
        .startup_cmd {
            background-color: rgba(0, 0, 0, 0.3);
            color: white;
            padding: 10px;
            font-size: 16px;
            border-radius: 5px;
            border: none;
            width: 100%;
        }
        .submit {
            outline: none;
            display: block;
            margin: 15px auto;
            transition: all 0.16s ease-in;
            border-radius: 5px;
            border: rgba(0, 0, 0, 0.3) solid 1.75px;
            padding: 8px;
            background-color: rgba(0, 0, 0, 0.3);
            color: white;
            font-size: 18px;
            width: 85px;
            height: auto;
            cursor: pointer;
            float: left;
        }
        .submit:hover {
            transition: all 0.16s ease-in;
            background-color: rgba(0, 0, 0, 0.7);
            border: rgba(0, 0, 0, 0.7) solid 1.75px;
            color: white;
        }
        .form {
            margin: 90px;
        }
        .center {
            display: flex;
            align-items: center;
            justify-content: center;
        }
</style>
@endsection

@section('body')
<div style="background-color: rgba(0, 0, 0, 0.3);" class="navbar">
    <ul>
        <li><a href="/server/id/console"><i class="fas fa-terminal"></i>&nbsp;Console</a></li>
        <li><a href="/server/id/file-manager"><i class="fas fa-folder"></i>&nbsp;File Manager</a></li>
        <li><a href="/server/startup"><i class="fas fa-play"></i>&nbsp;Startup</a></li>
        <li><a href="/server/id/network"><i class="fas fa-network-wired"></i>&nbsp;Network</a></li>
    </ul>
</div>

<div>
    <div style="display: show;" id="main" class="border-rad contain">
    <h1 class="center">Startup</h1>
    <div class="form center">
        <form method="POST" action="/server/startup">
            <label for="startup_cmd">Startup:&nbsp;</label>
            <input class="startup_cmd" type="text" id="startup_cmd" name="startup_cmd" value="{{ $server->startup ?? '' }}" placeholder="python3 --version"><br>
            <input class="submit" type="submit" value="Apply">
        </form>
    </div>
    </div>
</div>

@endsection
