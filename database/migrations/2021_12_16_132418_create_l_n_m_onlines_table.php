<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLNMOnlinesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('l_n_m_onlines', function (Blueprint $table) {
            $table->id();
            $table->string('CheckoutRequestID')->nullable();
            $table->string('MerchantRequestID')->nullable();
            $table->string("ResultCode")->nullable();
            $table->string('ResultDesc')->nullable();
            $table->string('Amount')->nullable();
            $table->string('MpesaReceiptNumber')->nullable();
            $table->string('Transaction')->nullable();
            $table->string('PhoneNumber')->nullable();
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
        Schema::dropIfExists('l_n_m_onlines');
    }
}