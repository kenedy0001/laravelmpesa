<?php

namespace App\Admin\Controllers;

use App\Models\b2cpayment;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class B2cController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'b2cpayment';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new b2cpayment());

        $grid->column('id', __('Id'));
        $grid->column('FirstName', __('FirstName'));
        $grid->column('MiddleName', __('MiddleName'));
        $grid->column('LastName', __('LastName'));
        $grid->column('TransactionType', __('TransactionType'));
        $grid->column('TransID', __('TransID'));
        $grid->column('TransTime', __('TransTime'));
        $grid->column('BusinessShortCode', __('BusinessShortCode'));
        $grid->column('BillRefNumber', __('BillRefNumber'));
        $grid->column('InvoiceNumber', __('InvoiceNumber'));
        $grid->column('ThirdPartyTransID', __('ThirdPartyTransID'));
        $grid->column('MSISDN', __('MSISDN'));
        $grid->column('TransAmount', __('TransAmount'));
        $grid->column('OrgAccountBalance', __('OrgAccountBalance'));
        $grid->column('deleted_at', __('Deleted at'));
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
        $show = new Show(b2cpayment::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('FirstName', __('FirstName'));
        $show->field('MiddleName', __('MiddleName'));
        $show->field('LastName', __('LastName'));
        $show->field('TransactionType', __('TransactionType'));
        $show->field('TransID', __('TransID'));
        $show->field('TransTime', __('TransTime'));
        $show->field('BusinessShortCode', __('BusinessShortCode'));
        $show->field('BillRefNumber', __('BillRefNumber'));
        $show->field('InvoiceNumber', __('InvoiceNumber'));
        $show->field('ThirdPartyTransID', __('ThirdPartyTransID'));
        $show->field('MSISDN', __('MSISDN'));
        $show->field('TransAmount', __('TransAmount'));
        $show->field('OrgAccountBalance', __('OrgAccountBalance'));
        $show->field('deleted_at', __('Deleted at'));
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
        $form = new Form(new b2cpayment());

        $form->text('FirstName', __('FirstName'));
        $form->text('MiddleName', __('MiddleName'));
        $form->text('LastName', __('LastName'));
        $form->text('TransactionType', __('TransactionType'));
        $form->text('TransID', __('TransID'));
        $form->text('TransTime', __('TransTime'));
        $form->text('BusinessShortCode', __('BusinessShortCode'));
        $form->text('BillRefNumber', __('BillRefNumber'));
        $form->text('InvoiceNumber', __('InvoiceNumber'));
        $form->text('ThirdPartyTransID', __('ThirdPartyTransID'));
        $form->text('MSISDN', __('MSISDN'));
        $form->decimal('TransAmount', __('TransAmount'));
        $form->decimal('OrgAccountBalance', __('OrgAccountBalance'));

        return $form;
    }
}
