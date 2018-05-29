<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    /**
     * 禁止被批量赋值的字段
     *
     * @var array
     */
    protected $guarded = [];

    /**
     *  添加文章
     */
    public function saveArticle($data)
    {
        if(empty($data)){
            session()->flash('danger', '暂无数据需要添加');
            return false;
        }
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
