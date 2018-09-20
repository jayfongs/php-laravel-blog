@extends('admin.layout.layout')

{{--Title--}}
@section('title') 修改Tag @endsection

@section('content')
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-danger">
                <div class="box-header">
                    <h3 class="box-title">Tag列表</h3>
                    <div class="box-tools">
                        <div class="input-group input-group-sm" style="width: 150px;">
                            <input type="text" name="table_search" class="form-control pull-right" placeholder="Search">
                            <div class="input-group-btn">
                                <button type="submit" class="btn btn-default"><i class="icon-search"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="box-body table-responsive no-padding">
                    <table class="table table-hover">
                        <tr>
                            <th>ID</th>
                            <th>tag名称</th>
                            <th>创建时间</th>
                            <th>操作</th>
                        </tr>
                        @foreach($tags as $tag)
                            <tr>
                                <td>{{ $tag->id }}</td>
                                <td>{{ $tag->tag }}</td>
                                <td>{{ $tag->created_at }}</td>
                                <td>
                                    <a href="{{ route('tag::edit', $tag->id) }}" class="btn btn-info">修改</a>
                                    <a href="{{ route('delete_tag', $tag->id) }}" class="btn btn-danger" data-class="delete_tag">删除</a>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                    <nav>
                        <ul class="pagination" style="float: right; margin-right: 30px">
                            {{ $tags->links() }}
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</section>
<script>
    $(function () {
        $('[data-class="delete_tag"]').on('click', function () {
            var _this = $(this);
            layer.confirm('确定删除此文章吗？', {
                btn: ['确定','取消']
            }, function(){
                $.ajax({
                    type: 'delete',
                    url: _this.attr('href'),
                    data: {
                        '_token': '{{ csrf_token() }}'
                    },
                    dataType: 'json'
                }).done(function (jayfong) {
                    $(_this).parents('tr').remove();
                    layer.msg(jayfong.msg, {icon: 1, time: 1000});
                }).fail(function (jayfong) {
                    layer.msg(jayfong.msg, {icon: 2, time: 1000});
                });
            });
            return false;
        });
    });
</script>
@endsection