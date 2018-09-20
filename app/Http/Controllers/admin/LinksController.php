<?php

namespace App\Http\Controllers\admin;

use App\Models\Links;
use Carbon\Carbon;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class LinksController extends Controller
{
    /**
     * 友情链接列表
     */
    public function index()
    {
        $links_list = Links::latest()->paginate(10);
        return view('admin/links/index', compact('links_list'));
    }

    /**
     * 创建友情链接页面
     */
    public function links_create()
    {
        return view('admin/links/create');
    }

    /**
     * 创建友情链接处理
     */
    public function store(Requests\LinkFormRequest $request)
    {
        $input = $request->all();

        $validator = \Validator::make($input, $request->messages());
        if($validator->passes()){
            $link = Links::create($input);
            if ($link){
                return back()->withErrors('友链创建成功！');
            }else{
                return back()->withErrors('数据填充失败！');
            }
        }else {
            return back()->withErrors($validator);
        }
    }

    /**
     * 修改友情链接
     */
    public function edit($id)
    {
        $edit_links = Links::find($id);
        return view('admin/links/edit', compact('edit_links'));
    }

    /**
     * 修改友情链接更新处理
     */
    public function update(Requests\LinkFormRequest $request, $id)
    {
        $update = Links::find($id);
        $update->update($request->all());
        if ($update){
            return back()->withErrors('更新成功！');
        }else{
            return back()->withErrors('数据更新失败！');
        }
    }

    /**
     * 删除友情链接
     */
    public function destroy($id)
    {
        $delete_links = Links::find($id)->delete();
        if ($delete_links){
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
