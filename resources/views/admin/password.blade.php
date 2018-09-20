@extends('admin.layout.layout')

{{--title--}}
@section('title') 修改密码 @endsection

@section('content')
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-danger">
                <div class="box-header with-border">
                    <h3 class="box-title">
                        修改密码
                    </h3>
                </div>
                {!! Form::open(['class' => 'form-horizontal', 'route' => 'passPost']) !!}
                <div class="box-body">
                    @if($errors->any())
                        <ul class="list-group">
                            @foreach($errors->all() as $error)
                                <li class="list-group-item list-group-item-danger">
                                    {{ $error }}
                                </li>
                            @endforeach
                        </ul>
                    @endif
                    <div class="form-group">
                        {!! Form::label('password', '旧密码', ['class' => 'col-sm-1 control-label', 'style' => 'width: 11%']) !!}
                        <div class="col-sm-6">
                            {!! Form::password('password', ['class' => 'form-control', 'style' => 'border-radius: 4px', 'placeholder' => '旧密码']) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        {!! Form::label('new_password', '新密码', ['class' => 'col-sm-1 control-label', 'style' => 'width: 11%']) !!}
                        <div class="col-sm-6">
                            {!! Form::password('new_password', ['class' => 'form-control', 'style' => 'border-radius: 4px', 'placeholder' => '新密码', 'id' => 'new_password']) !!}
                        </div>
                    </div>
                        <div class="form-group">
                            {!! Form::label('confirm_new_password', '确认新密码', ['class' => 'col-sm-1 control-label', 'style' => 'width: 11%']) !!}
                            <div class="col-sm-6">
                                {!! Form::password('new_password_confirmation', ['class' => 'form-control', 'style' => 'border-radius: 4px', 'placeholder' => '确认新密码', 'id' => 'confirm_new_password']) !!}
                            </div>
                        </div>
                    <div class="box-footer">
                        {!! Form::button('确认修改', ['type' => 'submit', 'class' => 'btn btn-primary']) !!}
                    </div>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</section>
@endsection