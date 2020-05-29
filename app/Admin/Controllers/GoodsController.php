<?php

namespace App\Admin\Controllers;

use App\Model\GoodsModel;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use App\Model\CategoryModel;                      //CategoryModel
use Encore\Admin\Controllers\ModelForm;

class GoodsController extends AdminController
{

    use ModelForm;
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = '商品管理系统';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new GoodsModel());

        $grid->column('goods_id', __('商品ID'))->sortable();
        $grid->column('cat_id', __('分类ID'));
        $grid->column('goods_sn', __('商品编号'));
        $grid->column('goods_name', __('商品名'));
        $grid->column('click_count', __('点击数'));
        $grid->column('goods_number', __('库存'));
        $grid->column('shop_price', __('售价'));
        $grid->column('keywords', __('关键字'));
        $grid->column('goods_desc', __('商品描述'));
        $grid->column('goods_img', __('商品图片'))->image('',100,100);
        $grid->column('add_time', __('添加时间'))->display(function ($time){
                return date('Y-m-d H:i:s',$time);
        });
        $grid->column('is_delete', __('是否删除'));
        $grid->column('sale_num', __('已售数量'));

        return $grid;
    }

    /**
     * Make a show builder.
     *
     * @param mixed $id
     * @return Show
     */
    protected function detail($id)
    {
        $show = new Show(GoodsModel::findOrFail($id));

        $show->field('goods_id', __('商品ID'));
        $show->field('cat_id', __('分类ID'));
        $show->field('goods_sn', __('Goods sn'));
        $show->field('goods_name', __('商品名'));
        $show->field('click_count', __('点击数'));
        $show->field('goods_number', __('库存'));
        $show->field('shop_price', __('售价'));
        $show->field('keywords', __('关键字'));
        $show->field('goods_desc', __('商品描述'));
        $show->field('goods_img', __('商品图片'));
        $show->field('add_time', __('添加时间'));
        $show->field('is_delete', __('是否删除'));
        $show->field('sale_num', __('已售数量'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new GoodsModel());

        //$form->number('goods_id', __('Goods id'));
        $form->display('goods_id', __('商品ID'));
        $form->select('cat_id', __('分类'))->options(CategoryModel::selectOptions());

        $form->text('goods_sn', __('商品编号'));
        $form->text('goods_name', __('商品名'));
        $form->display('click_count', __('点击数'));
        $form->number('goods_number', __('库存'));
        //$form->decimal('shop_price', __('售价'))->default(0.00);
        $form->currency('shop_price', __('售价'))->symbol('￥');
        $form->text('keywords', __('关键字'));
        $form->ckeditor('goods_desc', __('商品描述'));
        $form->image('goods_img', __('商品图片'));                  //图片上传
        $form->number('add_time', __('添加时间'));
        $form->switch('is_delete', __('是否删除'));
        $form->number('sale_num', __('已售数量'));

        return $form;
    }
}
