<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    @yield('file')
    <title>{{ config('blog.header') }} @yield('title')</title>
</head>
<body>
    {{--头部--}}
    <header class="header">
        <a href="{{ route('index') }}" class="logo">JayFong</a>
        <button type="button" class="navbar-toggle">
            <span class="button-line"></span>
            <span class="button-line"></span>
            <span class="button-line"></span>
        </button>
        <nav class="nav">
            <ul>
                <li><a href="{{ route('index') }}">首页</a></li>
                <li><a href="{{ route('about') }}">关于</a></li>
            </ul>
        </nav>
    </header>

    {{--动态主体内容--}}
    <section class="main">
        @yield('content')
    </section>

    {{--尾部--}}
    <footer class="footer">
        <main class="container">
            &copy; {{ config('blog.date') }} {{ config('blog.footer') }}
        </main>
    </footer>
</body>
</html>
<script>
    //    此方法现在只能针对IE6，7，8
    /*if (!+[1,]){
     alert("我是货真价实的IE浏览器!")
     }
     else{
     alert("我不是IE!")
     }*/
    //此方法针对所有IE
    /*if ((!window.VBArray)){
     alert("Not IE");
     } else{
     alert("IE");
     }*/
</script>
