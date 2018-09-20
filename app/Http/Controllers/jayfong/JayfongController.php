<?php

namespace App\Http\Controllers\jayfong;

use App\Models\Article;

use App\Http\Controllers\Controller;
use App\Models\Links;
use App\Models\Tag;
use Illuminate\Http\Request;
use YuanChao\Editor\EndaEditor;

class JayfongController extends Controller
{
    /**
     * 首页
     * @param Request $request
     * @return mixed
     */
    public function index(Request $request){
        $articles = Article::whereRaw('1=1');
        if ($request->tag) {
            $articles->where('tag', $request->tag);
        }
        //文章列表
        $articles = $articles->latest()->paginate(10);
        //友情链接
        $links = Links::all();
        //最热10篇文章
        $hot = Article::latest()->take(10)->get();
        //tag
        $tags = Tag::all();

        return view('jayfong/index')->with(compact(
            'articles',
            'links',
            'tags',
            'hot'
        ));
    }

    /**
     * 文章
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($id){
        $articles = new Article();
        //查看文章
        $view_article = $articles->find($id);
        //增加查看次数
        $view_article->increment('article_view');
        //最热10篇文章
        $hot = $articles->latest()->take(10)->get();
        //tag
        $tags = Tag::all();
        //友情链接
        $links = Links::all();
        //MarkDown
        $endaEditor = EndaEditor::MarkDecode($view_article->content);
        //上一篇文章
        $article['prev'] = $articles->where('id', '<', $id)->orderBy('id', 'desc')->first();
        //下一篇文章
        $article['next'] = $articles->where('id', '>', $id)->orderBy('id', 'asc')->first();

        return view('jayfong/article')->with(compact(
            'view_article',
            'endaEditor',
            'article',
            'links',
            'tags',
            'hot'
        ));
    }

    /**
     * 关于
     */
    public function about(){
        return view('jayfong/about');
    }
}
