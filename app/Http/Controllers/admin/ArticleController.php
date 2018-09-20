<?php

namespace App\Http\Controllers\admin;

use App\Models\Article;
use App\Models\Tag;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

class ArticleController extends Controller
{
    /**
     * 文章首页
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $article = Article::latest()->paginate(10);
        return view('admin/article/index')->with('article', $article);
    }

    /**
     * 文章创建
     */
    public function article_create()
    {
        $tags = Tag::orderBy('id', 'asc')->lists('tag', 'id')->all();
        return view('admin/article/create', compact('tags'));
    }
   
    /**
     * 发布文章
     */
    public function store(Requests\ArticelFormRequest $request)
    {
        $input = $request->all();

        $validator = \Validator::make($input, $request->messages());
        if ($validator->passes()){
            $article = Article::create($input);
            if ($article){
                return back()->withErrors('创建成功！');
            }else{
                return back()->withErrors('数据填充失败！');
            }
        }else {
            return back()->withErrors($validator);
        }
    }

    /**
     * 修改文章
     */
    public function edit($id)
    {
        $edit_article = Article::find($id);
        $tags = Tag::orderBy('id', 'asc')->lists('tag', 'id')->all();
        return view('admin/article/edit')->with(compact('edit_article', 'tags'));
    }

    /**
     * 更新文章处理
     */
    public function update(Requests\ArticelFormRequest $request, $id)
    {
        $update_article = Article::find($id);
        $update_article->update($request->all());
        if ($update_article) {
            return back()->withErrors('更新成功！');
        }else{
            return back()->withErrors('数据更新失败！');
        }

    }

    /**
     * 删除文章处理
     */
    public function destroy($id)
    {
        $delete_article = Article::findOrFail($id)->delete();
        if ($delete_article){
            $data = [
                'status' => 0,
                'msg' => '删除成功！'
            ];
        }else{
            $data = [
                'status' => 1,
                'msg' => '删除数据失败！'
            ];
        }
        return $data;
    }

    /**
     * 图片上传处理
     */
    public function upload()
    {
        $file = Input::file('Filedata');
        if ($file->isValid()){
            $entension = $file->getClientOriginalExtension(); //上传文件的后缀
            $newName = date('YmdHis').mt_rand(100, 999). '.' .$entension;
            $file->move(base_path().'/public/uploads',$newName); //移动文件后从命名
            $filePath = 'uploads/' . $newName;
            return $filePath;
        }
    }
}
