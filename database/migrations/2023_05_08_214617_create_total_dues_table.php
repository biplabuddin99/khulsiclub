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
        Schema::create('total_dues', function (Blueprint $table) {
            $table->id();
            $table->string('member_type')->nullable();
            $table->string('member_name')->nullable();
            $table->string('membership_code')->nullable();
            $table->string('y2016')->nullable();
            $table->string('y2017')->nullable();
            $table->string('y2018')->nullable();
            $table->string('y2019')->nullable();
            $table->string('y2020')->nullable();
            $table->string('y2021')->nullable();
            $table->string('subscription_interest')->nullable();
            $table->string('land_interest')->nullable();
            $table->string('land_developmnet_fee')->nullable();
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
        Schema::dropIfExists('total_dues');
    }
};
