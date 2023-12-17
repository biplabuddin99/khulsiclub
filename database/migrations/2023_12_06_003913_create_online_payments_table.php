<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('online_payments', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('member_id')->nullable();
            $table->string('currency')->nullable();
            $table->string('currency_code')->nullable();
            $table->decimal('amount',10,2)->nullable();
            $table->decimal('currency_value',10,2)->nullable();
            $table->string('method')->nullable();
            $table->string('txnid')->nullable();
            $table->text('invoice_id')->nullable();
            $table->integer('status')->default(0)->comment('0 pending, 1 successfull, 2 fail');
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
        Schema::dropIfExists('online_payments');
    }
};
