@extends('layouts.base')
@section('head')
<link href="https://fonts.googleapis.com/css2?family=Space+Mono:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">

<style>
    .center-console {
        background-color: rgba(0, 0, 0, 0.3);
        margin: 0 auto;
        width: 55%;
        margin-top: 25px;
        height: 550px;
        overflow-y: scroll;
        margin-bottom: 100px;
    }
    p {
        color: white;
    }
    .server-name-text {
        color: white;
        padding: 15px;
        margin: 0 !important;
    }
    .server-name {
        width: 100%;
        margin: 0 auto;
        background-color: rgba(0, 0, 0, 0.5);
        text-align: center;
    }
    .server-console-control {
        display: flex;
        justify-content: center;
        align-items: center;
        width: 55%;
        margin: 0 auto;
        background-color: rgba(0, 0, 0, 0.5);
        text-align: center;
        margin-top: -100px;
        height: 65px;
    }
    .console-btn {
        display: block;
        margin: 0 auto;
        transition: all 0.16s ease-in;
        border-radius: 5px;
        border: rgba(0, 0, 0, 0.31) solid 1.75px;
        padding: 8px;
        background-color: rgba(0, 0, 0, 0.3);
        color: white;
        font-size: 18px;
        width: 85px;
        float: left;
        height: 22px;
        cursor: pointer;
    }
    .console-btn:hover {
        transition: all 0.16s ease-in;
        background-color: rgba(0, 0, 0, 0.7);
        border: rgba(0, 0, 0, 0.7) solid 1.75px;
        color: white;
    }
    .console-text {
        font-family: 'Space Mono', monospace;
        font-size: 16;
        padding: 15px !important;
        margin: 0 !important;
    }
</style>
@endsection

@section('body')
<div style="background-color: rgba(0, 0, 0, 0.3);" class="navbar">
    <ul>
        <li><a href="/servers/view/{{ $server->id }}"><i class="fas fa-terminal"></i>&nbsp;Console</a></li>
        <li><a href="/servers/file-manager/{{ $server->id }}"><i class="fas fa-folder"></i>&nbsp;File Manager</a></li>
        <li><a href="/servers/startup/{{ $server->id }}"><i class="fas fa-play"></i>&nbsp;Startup</a></li>
        <li><a href="/servers/network/{{ $server->id }}"><i class="fas fa-network-wired"></i>&nbsp;Network</a></li>
    </ul>
</div>

<div>
    <div class="border-rad-top center-console">
        <div class="border-rad-top server-name">
            <p class="server-name-text">{{ $name ?? 'CONTAINER' }}</p>
        </div>
        <p class="console-text">{!! $log ?? 'EXITED (0)' !!}</p>
    </div>
    <div class="border-rad-btm server-console-control">
        <p class="console-btn"><a href="/servers/start/{{ $server->id }}">Start</a></p>
        <p class="console-btn"><a href="/server/restart">Restart</a></p>
        <p class="console-btn"><a href="/server/stop">Stop</a></p>
        <p class="console-btn"><a href="/server/kill">Kill</a></p>
    </div>
</div>

@endsection
