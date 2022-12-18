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
        Schema::create('photo_gallaries', function (Blueprint $table) {
            $table->id();
            $table->string('Caption')->nullable();
            $table->string('feature_image')->nullable();
            $table->date('publish_date')->nullable();
            $table->date('unpublish_date')->nullable();
            $table->string('status')->default(0);
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
        Schema::dropIfExists('photo_gallaries');
    }
};
