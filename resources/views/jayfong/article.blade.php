@extends('jayfong.layout.layout')
@section('file')
<link rel="stylesheet" href="{{ elixir('web/css/all-article.css') }}">
<script src="{{ elixir('web/js/all-article.js') }}"></script>
@endsection
@section('content')
<main class="container">
    <section class="main-content">
        <article class="jayfong-container">
            <h3 class="article-title">
                {{ $view_article->title }}
            </h3>
            <article class="article-container">
                {!! $endaEditor !!}
            </article>
            <ul class="article-info">
                <li>
                    <i class="icon-time"></i>
                    {{ $view_article->created_at->format('Y-m-d') }}
                </li>
                <li>
                    <i class="icon-tag"></i>
                    <a href="{{ route('index', ['tag' => $view_article->tag]) }}">{{ $view_article->tag }}</a>
                </li>
            </ul>
            <dl class="article-related">
                <dd>
                    上一篇：
                    @if($article['prev'])
                        <a href="{{ route('article', $article['prev']->id) }}">{{ $article['prev']->title }}</a>
                    @else
                        <span>没有上一篇啦！！！</span>
                    @endif
                </dd>
                <dd>
                    下一篇：
                    @if($article['next'])
                        <a href="{{ route('article', $article['next']->id) }}">{{ $article['next']->title }}</a>
                    @else
                        <span>没有下一篇啦！！！</span>
                    @endif
                </dd>
            </dl>
        </article>
        <section class="jayfong-container">
            <div class="ds-thread" data-thread-key="1" data-title="{{ $view_article->title }}" data-url="{{ route('article', $view_article->id) }}"></div>
        </section>
    </section>
    @include('jayfong.sidebar')
</main>
<script type="text/javascript">
    var duoshuoQuery = {short_name:"jayfong"};
    (function() {
        var ds = document.createElement('script');
        ds.type = 'text/javascript';ds.async = true;
        ds.src = (document.location.protocol == 'https:' ? 'https:' : 'http:') + '//static.duoshuo.com/embed.js';
        ds.charset = 'UTF-8';
        (document.getElementsByTagName('head')[0]
        || document.getElementsByTagName('body')[0]).appendChild(ds);
    })();
</script>
@endsection