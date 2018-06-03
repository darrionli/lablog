<?php

namespace App\Models;


class Config extends Base
{
    /**
     * 批量更新
     */
    public function updatePatch($data)
    {
        foreach ($data as $k=>$v){
            if($v != null){
                $this->where('name', $k)->update(['val'=>$v]);
            }
        }
        return true;
    }
}
