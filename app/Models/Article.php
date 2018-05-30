<?php

namespace App\Models;


class Article extends Base
{
    /**
     * 关联分类表
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    /**
     *  添加文章
     */
    public function saveArticle($data)
    {
        if(empty($data)){
            session()->flash('danger', '暂无数据需要添加');
            return false;
        }
        // 如果文章描述未填写，则提取正文内容
        if(empty($data['describe'])){
            $description = preg_replace(array('/[~*>#-]*/', '/!?\[.*\]\(.*\)/', '/\[.*\]/'), '', $data['markdown']);
            $data['describe'] = mb_substr($description, 0, 200);
        }

        // 将markdown转换成html
        $data['content'] = markdownToHtml($data['markdown']);

        $result = $this->create($data);
        if ($result) {
            session()->flash('success', '添加成功');
            return $result->id;
        }else{
            session()->flash('danger', '添加失败');
            return false;
        }
    }
}
