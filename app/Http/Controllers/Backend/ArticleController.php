<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests\Article\Store;
use App\Models\Article;
use App\Models\Category;
use App\Models\Label;
use App\Models\Article_label;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ArticleController extends Controller
{
    // 文章列表页
    public function index()
    {
        $article = Article::withTrashed()
                    ->with('category')
                    ->orderBy('created_at', 'desc')
                    ->paginate(10);
        $assign = compact('article');
        return view('backend.article.index', $assign);
    }

    // 添加文章
    public function create()
    {
        $category = Category::all();
        $label = Label::all();
        $assign = compact('category', 'label');
        return view('backend.article.create', $assign);
    }

    // 添加文章
    public function store(Store $request, Article $article)
    {
        $data = $request->except('_token');
        $data['content'] = $data['content-html-code'];
        $data['markdown'] = $data['content-markdown-doc'];
        unset($data['content-html-code'], $data['content-markdown-doc']);

        // 如果文章描述未填写，则提取正文内容
        if(empty($data['describe'])){
            $description = preg_replace(array('/[~*>#-]*/', '/!?\[.*\]\(.*\)/', '/\[.*\]/'), '', $data['markdown']);
            $data['describe'] = mb_substr($description, 0, 200);
        }

        $result = $article::create($data);
        if($result){
            session()->flash('success', '添加成功');
        }else{
            session()->flash('danger', '添加失败');
        }
        return redirect()->route('back.art.index');
    }

    // 获取content
    public function markdown($id)
    {
        $article = Article::select('markdown')->find($id);
        return $article->markdown;
    }


    // 编辑文章
    public function edit(Request $request, $id)
    {
        $article = Article::withTrashed()->find($id);
        $category = Category::all();
        $assign = compact('article', 'category');
        return view('backend.article.edit', $assign);
    }

    // 编辑文章
    public function update(Store $request, Article $article, Article_label $article_label, $id)
    {
        $data = $request->except('_token');
        $data['content'] = $data['content-html-code'];
        $data['markdown'] = $data['content-markdown-doc'];
        unset($data['content-html-code'], $data['content-markdown-doc']);
        // 如果文章描述未填写，则提取正文内容
        if($data['markdown']){
            $description = preg_replace(array('/[~*>#-]*/', '/!?\[.*\]\(.*\)/', '/\[.*\]/'), '', $data['markdown']);
            $data['describe'] = mb_substr($description, 0, 200);
        }
        $result = $article->where('id', $id)->update($data);
        if ($result) {
            session()->flash('success', '修改成功');
        }else{
            session()->flash('danger', '修改失败');
        }
        return redirect()->back();
    }

    // 软删除
    public function destroy(Article $article, $id)
    {
        $result = Article::where('id', $id)->delete();
        if ($result) {
            session()->flash('success', '删除成功');
        }else{
            session()->flash('danger', '删除失败');
        }
        return redirect()->back();
    }

    // 恢复软删除
    public function restore(Article $article, $id)
    {
        $result = Article::where('id', $id)->restore();
        if ($result) {
            session()->flash('success', '恢复成功');
        }else{
            session()->flash('danger', '恢复失败');
        }
        return redirect()->back();
    }
}
