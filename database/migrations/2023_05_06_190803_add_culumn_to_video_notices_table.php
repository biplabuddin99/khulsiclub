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
        Schema::table('video_notices', function (Blueprint $table) {
            $table->text('short_description')->after('title')->nullable();
            $table->text('long_description')->nullable();
            $table->string('image')->nullable();
            $table->string('notice_file')->nullable();
            $table->string('publish_date')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('video_notices', function (Blueprint $table) {
            //
        });
    }
};
