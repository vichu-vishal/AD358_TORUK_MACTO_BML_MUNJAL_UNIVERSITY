<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFakecomplaintsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fakecomplaints', function (Blueprint $table) {
            $table->id();
            $table->string('complaint_id');
            $table->string('state');
            $table->string('district');
            $table->string('panchayath_or_municipal');
            $table->string('city_or_village');
            $table->string('damage_level');
            $table->string('additional_fake_complaint_description');
            $table->string('inspection_fake_image');
            $table->string('road_name');
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
        Schema::dropIfExists('fakecomplaints');
    }
}
