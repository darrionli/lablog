<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests\Category\Store;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    // 分类列表
	public function index()
	{
		$category = Category::withTrashed()->get();
		$assign = compact('category');
		return view('backend.category.index', $assign);
	}

	// 添加分类
    public function create()
    {
        return view('backend.category.create');
    }

    // 添加分类
    public function store(Store $request)
    {
        $data = $request->except('_token');
        $result = Category::create($data);
        if($result){
            session()->flash('success', '添加成功');
        }else{
            session()->flash('danger', '添加失败');
        }
        return redirect()->route('back.cate.index');
    }

    // 更新分类
    public function edit($id)
    {
        $category = Category::withTrashed()->find($id);
        $assign = compact('category');
        return view('backend.category.edit', $assign);
    }

    // 更新分类
    public function update(Store $request, $id)
    {
        $data = $request->except('_token');
        $result = Category::where('id', $id)->update($data);
        if($result){
            session()->flash('success', '更新成功');
        }else{
            session()->flash('danger', '更新失败');
        }
        return redirect()->route('back.cate.index');
    }

    // 删除
    public function destroy(Category $category, $id)
    {
        $result = Category::where('id', $id)->delete();
        if ($result) {
            session()->flash('success', '删除成功');
        }else{
            session()->flash('danger', '删除失败');
        }
        return redirect()->back();
    }

    // 恢复
    public function restore(Category $category, $id)
    {
        $result = Category::where('id', $id)->restore();
        if ($result) {
            session()->flash('success', '恢复成功');
        }else{
            session()->flash('danger', '恢复失败');
        }
        return redirect()->back();
    }

}
