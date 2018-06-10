<?php

namespace App\Http\Controllers\Backend;

use App\Models\Friendship_link;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FriendshipController extends Controller
{
    // 列表业
    public function index()
    {
        $friend = Friendship_link::withTrashed()->get();
        $assign = compact('friend');
        return view('backend/friendship/index', $assign);
    }

    // 添加
    public function create()
    {
        return view('backend/friendship/create');
    }

    // 添加
    public function store(Request $request)
    {
        $data = $this->validate($request, [
            'name'=>'required',
            'url'=>'required'
        ]);
        $result = Friendship_link::create($data);
        if($result){
            session()->flash('success', '添加成功');
        }else{
            session()->flash('danger', '添加失败');
        }
        return redirect()->route('back.friend.index');
    }

    // 修改
    public function edit($id)
    {
        $friend = Friendship_link::withTrashed()->find($id);
        $assign = compact('friend');
        return view('backend.friendship.edit', $assign);
    }

    public function update(Request $request, $id)
    {
        $data = $this->validate($request, [
            'name'=>'required',
            'url'=>'required'
        ]);
        $result = Friendship_link::where('id', $id)->update($data);
        if($result){
            session()->flash('success', '修改成功');
        }else{
            session()->flash('danger', '修改失败');
        }
        return redirect()->route('back.friend.index');
    }

    // 删除
    public function destroy($id)
    {
        $result = Friendship_link::where('id', $id)->delete();
        if ($result) {
            session()->flash('success', '删除成功');
        }else{
            session()->flash('danger', '删除失败');
        }
        return redirect()->back();
    }

    // 恢复
    public function restore($id)
    {
        $result = Friendship_link::where('id', $id)->restore();
        if ($result) {
            session()->flash('success', '恢复成功');
        }else{
            session()->flash('danger', '恢复失败');
        }
        return redirect()->back();
    }

}
