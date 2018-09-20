@extends('admin.layout.layout')

{{--Title--}}
@section('title') 创建Tag @endsection

@section('content')
<section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-danger">
                    <div class="box-header with-border">
                        <h3 class="box-title">创建Tag</h3>
                    </div>
                    {!! Form::open(['class' => 'form-horizontal', 'route' => 'create_tag']) !!}
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
                            {!! Form::label('links_name', 'Tag名称', ['class' => 'col-sm-1 control-label', 'style' => 'width: 88px']) !!}
                            <div class="col-sm-6">
                                {!! Form::text('tag', null, ['class' => 'form-control', 'style' => 'border-radius: 4px', 'placeholder' => 'Tag名称']) !!}
                            </div>
                        </div>
                        <div class="box-footer">
                            {!! Form::button('创建Tag', ['type' => 'submit', 'class' => 'btn btn-primary']) !!}
                        </div>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </section>
@endsection