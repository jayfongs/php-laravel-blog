<?php

namespace App\Http\Controllers\admin;

use App\Models\Tag;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class TagController extends Controller
{
    /**
     * tag首页
     * @return mixed
     */
    public function index()
    {
        $tags = Tag::latest()->paginate(10);
        return view('admin/tag/index', compact('tags'));
    }

    /**
     * 创建tag页面
     * @return mixed
     */
    public function create()
    {
        return view('admin/tag/create');
    }

    /**
     * 创建tag处理
     * @param Requests\TagFormRequest $request
     * @return $this
     */
    public function store(Requests\TagFormRequest $request)
    {
        $input = $request->all();

        $validator = \Validator::make($input, $request->messages());
        if ($validator->passes()){
            $tag = Tag::create($input);
            if ($tag){
                return back()->withErrors('创建成功！');
            }else{
                return back()->withErrors('数据填充失败！');
            }
        }else {
            return back()->withErrors($validator);
        }
    }

    /**
     * 修改tag
     * @param $id
     * @return mixed
     */
    public function edit($id)
    {
        $tag = Tag::find($id);
        return view('admin/tag/edit', compact('tag'));
    }

    /**
     * 更新tag处理
     * @param Requests\TagFormRequest $request
     * @param $id
     * @return mixed
     */
    public function update(Requests\TagFormRequest $request, $id)
    {
        $tags = Tag::find($id);
        $tags->update($request->all());
        if ($tags) {
            return back()->withErrors('更新成功！');
        }else{
            return back()->withErrors('数据更新失败！');
        }
    }

    /**
     * 删除tag处理
     * @param $id
     * @return array
     */
    public function destroy($id)
    {
        $del_tag = Tag::findOrFail($id)->delete();
        if ($del_tag){
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
}
