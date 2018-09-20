@extends('admin.layout.layout')
@section('title') 更新文章 @endsection
@section('content')
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-danger">
                <div class="box-header with-border">
                    <h3 class="box-title">
                        发表文章
                    </h3>
                </div>
                {!! Form::model($edit_article, ['class' => 'form-horizontal', 'route' => ['update_article', $edit_article->id]]) !!}
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
                        {!! Form::label('articleTitle', '文章标题', ['class' => 'col-sm-1 control-label', 'style' => 'width: 9.1%']) !!}
                        <div class="col-sm-6">
                            {!! Form::text('title', null, ['class' => 'form-control', 'style' => 'border-radius: 4px', 'placeholder' => '文章标题']) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        {!! Form::label('file', '文章图片', ['class' => 'col-sm-1 control-label', 'style' => 'width: 88px']) !!}
                        <div class="col-sm-6">
                            {!! Form::file(null, ['id' => 'file_upload', 'multiple' => 'true']) !!}
                            {!! Form::text('article_img', null, ['class' => 'form-control', 'style' => 'display: none']) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-12">
                            <a href="" target="_blank">
                                <img src="/{{ $edit_article->article_img }}" class="show_upload_img" style="max-width: 180px; max-height: 120px" />
                            </a>
                        </div>
                    </div>
                    <div class="form-group">
                        {!! Form::label('author', '创始人', ['class' => 'col-sm-1 control-label', 'style' => 'width: 88px']) !!}
                        <div class="col-sm-6">
                            {!! Form::text('author', null, ['class' => 'form-control', 'style' => 'border-radius: 4px', 'placeholder' => '创始人']) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        {!! Form::label('tags', '文章Tag', ['class' => 'col-sm-1 control-label', 'style' => 'width: 88px']) !!}
                        <div class="col-sm-6">
                            {!! Form::select('tag', ['' => '选择Tag'] + $tags, null, ['class' => 'form-control']) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        {!! Form::label('article_classify', '文章描述', ['class' => 'col-sm-1 control-label', 'style' => 'width: 88px']) !!}
                        <div class="col-sm-6">
                            {!! Form::textarea('article_description', null, ['class' => 'form-control', 'style' => 'height: 80px;resize: none;']) !!}
                        </div>
                    </div>
                    <div class="form-group" style="padding: 0 15px;">
                        @include('editor::head')
                        <div class="editor">
                            {!! Form::textarea('content', null, ['id' => 'myEditor']) !!}
                        </div>
                    </div>
                    <div class="box-footer">
                        {!! Form::button('更新文章', ['type' => 'submit', 'class' => 'btn btn-primary']) !!}
                    </div>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</section>

<script type="text/javascript">
    /**
     * uploadify 上传图片
     */
    <?php $timestamp = time();?>
    $(function() {
        $('#file_upload').uploadify({
            'buttonText': '上传图片',
            'formData'     : {
                'timestamp' : '<?php echo $timestamp;?>',
                '_token'     : '{{ csrf_token() }}'
            },
            'swf'      : "{{ asset('build/admin/uploadify/uploadify.swf') }}",
            'uploader' : "{{ url('admin/article/upload') }}",
            'onUploadSuccess' : function (file, data) {
                var uploadImg = $('.show_upload_img');
                uploadImg.parents('.form-group').show();
                uploadImg.attr('src', '/'+data);
                uploadImg.parent().attr('href', '/'+data);
                $('input[name=article_img]').val(data);
            }
        });
    });
</script>
@endsection