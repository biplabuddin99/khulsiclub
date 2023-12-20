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
        Schema::table('our_members', function (Blueprint $table) {
            $table->string('nominee_name')->after('company')->nullable();
            $table->string('nominee_relation')->after('nominee_name')->nullable();
            $table->string('nominee_occupation')->after('nominee_relation')->nullable();
            $table->date('nominee_date_of_birth')->after('nominee_occupation')->nullable();
            $table->string('nominee_place')->after('nominee_date_of_birth')->nullable();
            $table->string('nominee_email')->after('nominee_place')->nullable();
            $table->string('nominee_phone')->after('nominee_email')->nullable();
            $table->string('nominee_nid_no')->after('nominee_phone')->nullable();
            $table->string('nominee_passport_no')->after('nominee_nid_no')->nullable();
            $table->string('nominee_photo')->after('nominee_passport_no')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('our_members', function (Blueprint $table) {
            $table->dropColumn('nominee_name');
            $table->dropColumn('nominee_relation');
            $table->dropColumn('nominee_occupation');
            $table->dropColumn('nominee_date_of_birth');
            $table->dropColumn('nominee_place');
            $table->dropColumn('nominee_email');
            $table->dropColumn('nominee_phone');
            $table->dropColumn('nominee_nid_no');
            $table->dropColumn('nominee_passport_no');
        });
    }
};
