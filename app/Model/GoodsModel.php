<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class GoodsModel extends Model
{

    /**
     * 与模型关联的表名
     *
     * @var string
     */
    protected $table = 'p_goods';

    /**
     * 重定义主键
     *
     * @var string
     */
    protected $primaryKey = 'goods_id';

    /**
     * 不可批量赋值的属性。
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * 指示是否自动维护时间戳
     *
     * @var bool
     */
    public $timestamps = false;


}
