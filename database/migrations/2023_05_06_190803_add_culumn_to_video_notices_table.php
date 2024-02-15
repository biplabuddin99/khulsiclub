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
            $table->string('video_caption')->after('title')->nullable();
            $table->string('image_caption')->after('video_caption')->nullable();
            $table->text('long_description')->after('image_caption')->nullable();
            $table->string('image')->after('long_description')->nullable();
            $table->string('notice_file')->after('image')->nullable();
            $table->string('publish_date')->after('notice_file')->nullable();
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
            $table->dropColumn('video_caption');
            $table->dropColumn('image_caption');
            $table->dropColumn('long_description');
            $table->dropColumn('image');
            $table->dropColumn('notice_file');
            $table->dropColumn('publish_date');
        });
    }
};
