<?php

namespace App\Admin\Controllers;

use App\Models\LNMOnline;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class LnmonlineController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'LNMOnline';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new LNMOnline());

        $grid->column('id', __('Id'));
        $grid->column('CheckoutRequestID', __('CheckoutRequestID'));
        $grid->column('MerchantRequestID', __('MerchantRequestID'));
        $grid->column('ResultCode', __('ResultCode'));
        $grid->column('ResultDesc', __('ResultDesc'));
        $grid->column('Amount', __('Amount'));
        $grid->column('MpesaReceiptNumber', __('MpesaReceiptNumber'));
        $grid->column('Transaction', __('Transaction'));
        $grid->column('PhoneNumber', __('PhoneNumber'));
        $grid->column('created_at', __('Created at'));
        $grid->column('updated_at', __('Updated at'));

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
        $show = new Show(LNMOnline::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('CheckoutRequestID', __('CheckoutRequestID'));
        $show->field('MerchantRequestID', __('MerchantRequestID'));
        $show->field('ResultCode', __('ResultCode'));
        $show->field('ResultDesc', __('ResultDesc'));
        $show->field('Amount', __('Amount'));
        $show->field('MpesaReceiptNumber', __('MpesaReceiptNumber'));
        $show->field('Transaction', __('Transaction'));
        $show->field('PhoneNumber', __('PhoneNumber'));
        $show->field('created_at', __('Created at'));
        $show->field('updated_at', __('Updated at'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new LNMOnline());

        $form->text('CheckoutRequestID', __('CheckoutRequestID'));
        $form->text('MerchantRequestID', __('MerchantRequestID'));
        $form->text('ResultCode', __('ResultCode'));
        $form->text('ResultDesc', __('ResultDesc'));
        $form->text('Amount', __('Amount'));
        $form->text('MpesaReceiptNumber', __('MpesaReceiptNumber'));
        $form->text('Transaction', __('Transaction'));
        $form->text('PhoneNumber', __('PhoneNumber'));

        return $form;
    }
}
