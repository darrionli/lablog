<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Article_label extends Model
{
    // 保存文章标签
    public function saveArticleLabel($article_id, $label_ids)
    {
        $this::where('article_id', $article_id)->delete();
        // 组合批量插入的数据
        $data = [];
        foreach ($label_ids as $k => $v) {
            $data[] = [
                'article_id' => $article_id,
                'label_id' => $v
            ];
        }
        $this->insert($data);
    }

}
