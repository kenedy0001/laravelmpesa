<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateB2cpaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('b2cpayments', function (Blueprint $table) {
            $table->id();
            $table->string('FirstName')->nullable();
            $table->string('MiddleName')->nullable();
            $table->string('LastName')->nullable();
            $table->string('TransactionType')->nullable();
            $table->string('TransID')->nullable();
            $table->string('TransTime')->nullable();
            $table->string('BusinessShortCode')->nullable();
            $table->string('BillRefNumber')->nullable();
            $table->string('InvoiceNumber')->nullable();
            $table->string('ThirdPartyTransID')->nullable();
            $table->string('MSISDN')->nullable();
            $table->decimal('TransAmount', 8,2)->nullable();
            $table->decimal('OrgAccountBalance', 8,2)->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('b2cpayments');
    }
}