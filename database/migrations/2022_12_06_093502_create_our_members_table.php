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
        Schema::create('our_members', function (Blueprint $table) {
            $table->id();
            $table->string('full_name');
            $table->string('father_name')->nullable();
            $table->string('husban_name')->nullable();
            $table->string('mother_name')->nullable();
            $table->string('nominee')->nullable();
            $table->string('birth_date')->nullable();
            $table->string('nationality')->nullable();
            $table->string('profession')->nullable();
            $table->string('cell_number')->nullable();
            $table->string('tel_number')->nullable();
            $table->string('fax_number')->nullable();
            $table->string('email')->nullable();
            $table->string('blood_group')->nullable();
            $table->string('national_id')->nullable();
            $table->string('qualification')->nullable();
            $table->string('village')->nullable();
            $table->string('postoffice')->nullable();
            $table->string('upazila')->nullable();
            $table->string('district')->nullable();
            $table->text('present_address')->nullable();
            $table->text('office_address')->nullable();
            $table->string('others_date')->nullable();
            $table->string('signature_applicant')->nullable();
            $table->string('identify_president')->nullable();
            $table->string('member_no')->nullable();
            $table->string('mr_mis')->nullable();
            $table->string('other_address')->nullable();
            $table->string('signature_founder_president')->nullable();
            $table->string('signature_founder_vicepresident')->nullable();
            $table->string('remarks')->nullable();
            $table->string('update_incometax')->nullable();
            $table->string('emergency_contact')->nullable();
            $table->string('passport_notype')->nullable();
            $table->string('pdate_issue')->nullable();
            $table->string('issuing_authority')->nullable();
            $table->string('validity')->nullable();
            $table->string('name_spouse')->nullable();
            $table->string('occupation_spouse')->nullable();
            $table->string('membership_applied')->nullable();
            $table->string('childresns_name1')->nullable();
            $table->string('childresns_name2')->nullable();
            $table->string('childresns_name3')->nullable();
            $table->string('childresns_name4')->nullable();
            $table->string('childresns_name5')->nullable();
            $table->string('gender1')->nullable();
            $table->string('gender2')->nullable();
            $table->string('gender3')->nullable();
            $table->string('gender4')->nullable();
            $table->string('gender5')->nullable();
            $table->string('birth_date1')->nullable();
            $table->string('birth_date2')->nullable();
            $table->string('birth_date3')->nullable();
            $table->string('birth_date4')->nullable();
            $table->string('birth_date5')->nullable();
            $table->string('occupation1')->nullable();
            $table->string('occupation2')->nullable();
            $table->string('occupation3')->nullable();
            $table->string('occupation4')->nullable();
            $table->string('occupation5')->nullable();
            $table->string('proposed_name')->nullable();
            $table->string('membership_no')->nullable();
            $table->string('image')->nullable();
            $table->integer('show_font')->default(0)->nullable();
            $table->integer('order_b')->default(0)->nullable();
            $table->string('fb_link')->nullable();
            $table->string('twter_link')->nullable();
            $table->string('linkdin_link')->nullable();
            $table->string('youtube_link')->nullable();
            $table->integer('status')->default(0);
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
        Schema::dropIfExists('our_members');
    }
};
