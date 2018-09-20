@extends('jayfong.layout.layout')
@section('file')
<link rel="stylesheet" href="{{ elixir('web/css/all-index.css') }}">
<script src="{{ elixir('web/js/all-index.js') }}"></script>
@endsection
@section('content')
<main class="container">
    <section class="main-content">
        <ul class="article-list">
            @foreach($articles as $article)
            <li class="jayfong-container">
                <h3>
                    <a href="{{ route('article', $article->id) }}">{{ $article->title }}</a>
                </h3>
                <ul class="article-info">
                    <li>
                      <i class="icon-time"></i>
                       {{ $article->created_at->format('Y-m-d') }}
                    </li>
                    <li>
                        <i class="icon-tag"></i>
                        <a href="{{ route('index', ['tag' => $article->tag]) }}">{{ $article->tag }}</a>
                    </li>
                </ul>
                <dl class="article-content">
                    <dt>
                        <a href="{{ route('article', $article->id) }}">
                            <img src="{{ $article->article_img }}" title="{{ $article->title }}" />
                        </a>
                    </dt>
                    <dd>{{ $article->article_description }}</dd>
                </dl>
            </li>
            @endforeach
        </ul>

        @if($articles->lastPage() > 1)
        <ul class="paging">
            @if($articles->previousPageUrl())
            <li>
                <a href="{{ $articles->previousPageUrl() }}">上一页</a>
            </li>
            @endif
            <li class="paging-total">
                {{ $articles->currentPage() }}/{{ $articles->total() }}
            </li>
            @if($articles->nextPageUrl())
            <li>
                <a href="{{ $articles->nextPageUrl() }}">下一页</a>
            </li>
            @endif
        </ul>
        @endif

    </section>
    @include('jayfong.sidebar')
</main>
@endsection