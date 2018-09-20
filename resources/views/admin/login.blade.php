<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
    <link rel="stylesheet" href="{{ elixir('admin/css/all-login.css') }}">
    <title>JayFong's - 后台登录</title>
</head>
<body class="hold-transition login-page">
    <div class="login-box">
        <div class="login-box-body">
            <div class="login-logo" style="margin-top: 30px;">
                <a href="{{ route('index') }}"><b style="font-weight: 400; color: #f4645f">JayFong's</b></a>
            </div>
            @if($errors->any())
                <ul class="list-group">
                    @foreach($errors->all() as $error)
                        <li class="list-group-item list-group-item-danger">
                            {{ $error }}
                        </li>
                    @endforeach
                </ul>
                @elseif(session('msg'))
                <p style="color: red">{{ session('msg') }}</p>
            @endif
            {!! Form::open(['route' => 'loginPost']) !!}
                <div class="form-group has-feedback">
                    {!! Form::text('username', null, ['class' => 'form-control', 'placeholder' => '用户名']) !!}
                    <span class="glyphicon glyphicon glyphicon-user form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback">
                    {!! Form::password('password', ['class' => 'form-control', 'placeholder' => '密码']) !!}
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                </div>
                <div class="row">
                    <div class="col-xs-12">
                        {!! Form::button('立 即 登 录', ['type' => 'submit', 'class' => 'btn btn-primary btn-block btn-flat']) !!}
                    </div>
                    <div class="col-xs-12" style="margin: 15px 0 50px;">
                        <a href="{{ route('index') }}">返回首页</a>
                    </div>
                </div>
            {!! Form::close() !!}
        </div>
    </div>
</body>
</html>