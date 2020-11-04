<!DOCTYPE html>
<html lang="en">
<head>
    <script src="https://kit.fontawesome.com/19121f4509.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <meta charset="UTF-8">
    <meta content=#29333E name=msapplication-TileColor>
    <meta content=#29333E name=theme-color>
    <meta property="og:title" content="Lunar Box">
    <meta property="og:site_name" content="">
    <meta property="og:url" content="https://lunarbox.net">
    <meta property="og:description" content="Lunar Box is a place where you can find open source tools to manage docker containers, VPSs, and more!">
    <meta property="og:type" content="profile">
    <meta property="og:image" content="https://cdn.discordapp.com/attachments/771419285092171878/771731802657521694/Untitled-1.png">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @yield('head')
    <title>@yield('title')</title>
    @yield('style')
    <style>

        html, body {
            min-height: 100% !important;
            height: 100%;
        }
        body {
            margin: 0;
            padding: 0;
            background-color: #334352;
            font-family: 'Montserrat', sans-serif;
            height: calc(100% + 250px) !important;
        }
        .navbar {
            display: flex;
            align-items: center;
            justify-content: center;
            top: 0;
        }
        li {
            float: left;
            list-style-type: none;
            margin-right: 10px;
            margin-top: 10px;
            color: white;
            padding-bottom: 5px;
        }
        a {
            text-decoration: none;
            color: white;
            transition: all 0.1s ease-in;
        }
        a:hover {
            text-decoration: none;
            transition: all 0.1s ease-in;
            color: rgba(255, 255, 255, 0.8);
        }
        i {
            font-size: 16px;
            color: white;
        }
        .user {
            background-color: rgba(0, 0, 0, 0.3);
            border-radius: 15px;
            padding: 5px 15px 5px 15px;
            margin-top: 5px;
        }
        .border-rad {
            border-radius: 5px;
            /* border: #0967D3 solid 1.2px; */
        }
        .border-rad-top {
            border-top-left-radius: 5px;
            border-top-right-radius: 5px;
        }
        .border-rad-btm {
            border-bottom-left-radius: 5px;
            border-bottom-right-radius: 5px;
        }
    </style>
</head>
<body>
    <div class="navbar">
        <ul>
            <li><a href="/">Home</a></li>
            <li><a href="/servers">Servers</a></li>
            <li><a href="/support">Support</a></li>
            @auth
                <li class="user"><a href="/home"><i class="fas fa-user"></i>&nbsp;{{ Auth::user()->name }}</a></li>
            @else
                <li class="user"><a href="/login"><i class="fas fa-sign-in-alt"></i>&nbsp;Login</a></li>
            @endauth
        </ul>
    </div>
    @yield('body')
</body>
</html>
