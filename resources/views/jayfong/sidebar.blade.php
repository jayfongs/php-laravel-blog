<section class="main-sidebar">
    {{--<div class="jayfong-container">
        <div class="sidebar-search">
            <input type="text" name="name" placeholder="搜索" />
            <i class="icon-search"></i>
        </div>
    </div>--}}
    <div class="jayfong-container">
        <h4>热门文章</h4>
        <ul class="sidebar-list">
            @foreach($hot as $value)
            <li>
                <a href="{{ route('article', $value->id) }}">{{ $value->title }}</a>
            </li>
            @endforeach
        </ul>
    </div>
    <div class="jayfong-container">
        <h4>热门标签</h4>
        <div id="canvasContainer">
            <canvas id="canvas" width="300" height="300">
                <ul>
                    @foreach($tags as $tag)
                    <li>
                        <a href="{{ route('index', ['tag' => $tag->tag]) }}">{{ $tag->tag }}</a>
                    </li>
                    @endforeach
                </ul>
          </canvas>
        </div>
    </div>
    <div class="jayfong-container">
        <h4>友情链接</h4>
        <ul class="sidebar-list links">
            @foreach($links as $link)
            <li>
                <a target="_blank" href="{{ $link->links_url }}">{{ $link->links_name }}</a>
            </li>
            @endforeach
        </ul>
    </div>
</section>
<script type="text/javascript">
    $(function(){

        /**
         * 标签云
         */
        if(!$('#canvas').tagcanvas({
                    textColour: '#333',
                    outlineMethod: 'block',
                    outlineColour: '#f4645f',
                    reverse: true,
                    depth: 0.8,
                    maxSpeed: 0.05,
                })) {
            // something went wrong, hide the canvas container
            $('#canvasContainer').hide();
        }
    });
</script>