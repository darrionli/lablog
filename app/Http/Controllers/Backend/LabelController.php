<?php

namespace App\Http\Controllers\Backend;

use App\Models\Label;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LabelController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * 列表页
     */
    public function index()
    {
        $label = Label::withTrashed()->get();
        $assign = compact('label');
        return view('backend.label.index', $assign);
    }

    /**
     * 添加标签
     */
    public function create()
    {
        return view('backend.label.create');
    }

    /**
     * 保存新标签
     */
    public function store(Request $request)
    {
        $data = $this->validate($request, [
            'name'=>'required'
        ]);
        $result = Label::create($data);
        if($result){
            session()->flash('success', '添加成功');
        }else{
            session()->flash('danger', '添加失败');
        }
        return redirect()->route('back.label.index');
    }

    /**
     * 编辑
     */
    public function edit($id)
    {
        $label = Label::withTrashed()->find($id);
        $assign = compact('label');
        return view('backend.label.edit', $assign);
    }

    /**
     * 确认编辑
     */
    public function update(Request $request, $id)
    {
        $data = $this->validate($request, [
            'name'=>'required'
        ]);
        $result = Label::where('id', $id)->update($data);
        if($result){
            session()->flash('success', '修改成功');
        }else{
            session()->flash('danger', '修改失败');
        }
        return redirect()->route('back.label.index');
    }

    /**
     * 删除标签
     */
    public function destroy($id)
    {
        $result = Label::where('id', $id)->delete();
        if ($result) {
            session()->flash('success', '删除成功');
        }else{
            session()->flash('danger', '删除失败');
        }
        return redirect()->back();
    }

    /**
     * 恢复被删除的标签
     */
    public function restore($id)
    {
        $result = Label::where('id', $id)->restore();
        if ($result) {
            session()->flash('success', '恢复成功');
        }else{
            session()->flash('danger', '恢复失败');
        }
        return redirect()->back();
    }

}
