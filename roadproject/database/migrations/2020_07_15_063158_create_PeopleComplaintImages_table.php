<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePeopleComplaintImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('PeopleComplaintImages', function (Blueprint $table) {
            $table->id();
            $table->string('state');
            $table->string('district');
            $table->string('city_or_village');
            $table->integer('pincode');
            $table->string('panchayath_or_municipal');
            $table->string('road_name');
            $table->string('damage_level');
            $table->string('additional_description');
            $table->string('complaintimage')->nullable();
            $table->string('approval_status')->nullable();
            $table->string('ri_approval_status')->nullable();
            $table->string('ae_approval_status')->nullable();
            $table->string('ee_approval_status')->nullable();
            $table->string('ce_approval_status')->nullable();
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
        Schema::dropIfExists('people__complaint__images');
    }
}
