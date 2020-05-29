<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Encore\Admin\Traits\AdminBuilder;
use Encore\Admin\Traits\ModelTree;

class CategoryModel extends Model
{

    use ModelTree, AdminBuilder;

    /**
     * 与模型关联的表名
     *
     * @var string
     */
    protected $table = 'p_category';

    /**
     * 重定义主键
     *
     * @var string
     */
    protected $primaryKey = 'cat_id';


    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);

        $this->setParentColumn('parent_id');
        $this->setOrderColumn('sort_order');
        $this->setTitleColumn('cat_name');
    }
}

