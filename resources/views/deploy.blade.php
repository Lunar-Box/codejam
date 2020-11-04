@extends('layouts.base')
@section('title', 'Document')
@section('head')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
@endsection

@section('style')
    <script src="http://code.jquery.com/jquery-1.10.1.min.js"></script>
    <style>
        .item1 {
            grid-area: top;
            background-color: rgba(0, 0, 0, 0);
            font-size: 32px;
            margin-top: -65px;
        }

        .item2 {
            grid-area: left;
        }

        .grid-container {
            position: relative;
            margin-top: 50px !important;
            display: grid;
            grid-template-areas:
                'top top top top top top'
                'left left left left left left';
            grid-gap: 10px;
            background-color: rgba(0, 0, 0, 0.3);
            padding: 15px;
            height: 600px;
            width: 60%;
            margin: 0 auto;
            grid-auto-columns: 1fr;
            grid-auto-flow: column;
            align-items: center;
        }
        p {
            color: white;
            font-size: 18px;
        }

        h1 {
            color: white;
            font-size: 32px;
        }

        .center {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .top-txt {
            display: flex;
            justify-content: center;
            align-items: center;
            text-align: center;
            margin-top: -515px !important;
            width: 100%;
            margin: 0 auto;
        }

        .intro {
            display: flex;
            justify-content: center;
            align-items: center;
            width: 35%;
            margin: 0 auto;
            background-color: black;
        }

        .grid-container > div {
            text-align: center;
            padding: 20px;
            color: white;
            background-color:rgba(0, 0, 0, 0);
        }
        .a {
            display: block;
            margin: 0 auto;
            margin-bottom: -50px !important;
            margin-top: 200px !important;
            transition: all 0.16s ease-in;
            border-radius: 5px;
            border: rgba(0, 0, 0, 0.31) solid 1.75px;
            padding: 8px;
            background-color: rgba(0, 0, 0, 0.3);
            color: white;
            font-size: 18px;
            cursor: pointer;
            width: 75%;
        }
        .a:hover {
            transition: all 0.16s ease-in;
            background-color: rgba(0, 0, 0, 0.7);
            border: rgba(0, 0, 0, 0.7) solid 1.75px;
            color: white;
        }
        .down {
            position: absolute;
            right: 0;
            bottom: 0;
            padding: 0px 12.5px 5px 0px;
            cursor: pointer;
        }
        .fa-arrow-left, .fa-arrow-right {
            font-size: 24px;
            color: white;
        }
        .fab {
            font-size: 64px;
            color: white;
        }
        .langs > .lang {
            float: right;
            cursor: pointer;
        }
        .lang > p {
            font-weight: 500;
        }
        .langs {
            display: flex;
            margin: 0 auto;
            align-items: center;
            justify-content: center;
        }
        .onClick {
            color:rgba(255, 255, 255, 0.3)
        }
        .onClickMargin {
            margin-left: 35px;
        }
        select {
            color: white;
            background-color: rgba(0, 0, 0, 0.3);
            outline: none;
            border: none;
            border-radius: 5px;
            padding: 5px;
        }
        option {
            color: rgba(0, 0, 0, 0.9);
        }
        .dis {
            color: rgba(0, 0, 0, 0.3) !important;
        }
    </style>
@endsection

@section('body')

    <div style="display: show;" id="main" class="border-rad grid-container">
        <div class="item1">Deploy a box</div>
        <div style="text-align: center;" class="item2">
            <form method="POST" action="/deploy">
                <select name="lang">
                    <option value="nodejsv10">Node.js v10</option>
                    <option selected value="nodejsv12">Node.js v12</option>
                    <option value="nodejsv14">Node.js v14</option>
                    <option value="python3.5">Python3.5</option>
                    <option value="python3.7">Python3.7</option>
                    <option value="python3.8">Python3.8</option>
                    <option class="dis" disabled value="golang">Go [soon]</option>
                    <option class="dis" disabled value="rust">Rust [soon]</option>
                    <option class="dis" disabled value="java">Java [soon]</option>
                    <option class="dis" disabled value="ruby">Ruby [soon]</option>
                </select>
                <button type="submit" class="a" href="/register">Deploy!</button>
                @csrf
            </form>
        </div>
    </div>

@endsection
