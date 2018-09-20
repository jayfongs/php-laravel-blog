@extends('admin.layout.layout')

{{--Title--}}
@section('title') 修改友情链接 @endsection

@section('content')
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-danger">
                <div class="box-header with-border">
                    <h3 class="box-title">
                        修改友情链接
                    </h3>
                </div>
                {!! Form::model($edit_links, ['class' => 'form-horizontal', 'route' => ['update_links', $edit_links->id]]) !!}
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
                        {!! Form::label('links_name', '友链名称', ['class' => 'col-sm-1 control-label', 'style' => 'width: 88px']) !!}
                        <div class="col-sm-6">
                            {!! Form::text('links_name', null, ['class' => 'form-control', 'style' => 'border-radius: 4px', 'placeholder' => '友链名称']) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        {!! Form::label('links_url', '友链链接', ['class' => 'col-sm-1 control-label', 'style' => 'width: 88px']) !!}
                        <div class="col-sm-6">
                            {!! Form::text('links_url', null, ['class' => 'form-control', 'style' => 'border-radius: 4px', 'placeholder' => '友链链接']) !!}
                        </div>
                    </div>
                    <div class="box-footer">
                        {!! Form::button('更新友链', ['type' => 'submit', 'class' => 'btn btn-primary']) !!}
                    </div>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</section>
@endsection