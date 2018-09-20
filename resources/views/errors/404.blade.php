<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>404,页面找不到</title>
    <style>
        body, div {
            margin: 0;
            padding: 0;
        }
        body {
            background: #67ACE4;
        }
        .container {
            margin: 0 auto;
            padding-top: 50px;
            text-align: center;
            width: 560px;
        }
        .container img {
            border: medium none;
            margin-bottom: 50px;
        }
        .container .msg {
            margin-bottom: 65px;
        }
        .cloud {
            background: url("{{ asset('build/web/images/error_cloud.png') }}") repeat-x scroll 0 0 transparent;
            bottom: 0;
            height: 170px;
            position: absolute;
            width: 100%;
        }
    </style>
</head>
<body>
    <div class="container">
        <img class="png" src="{{ asset('build/web/images/404.png') }}" />
        <img class="png msg" src="{{ asset('build/web/images/404_msg.png') }}" />
        <p>
            <a href="{{ route('index') }}">
                <img class="png" src="{{ asset('build/web/images/404_to_index.png') }}" />
            </a>
        </p>
    </div>
    <div class="cloud"></div>
</body>
</html>