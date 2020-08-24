<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoadinspectiondetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('roadinspectiondetails', function (Blueprint $table) {
            $table->id();
            $table->string('complaint_id');
            $table->string('state');
            $table->string('district');
            $table->string('panchayath_or_municipal');
            $table->string('city_or_village');
            $table->string('road_name');
            $table->string('road_number');
            $table->string('RoadSize_Length');
            $table->string('RoadSize_Breadth');
            $table->string('budget');
            $table->string('totalCost');
            $table->string('damage_level');
            $table->string('additional_inspection_description');
            $table->string('inspection_image');
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
        Schema::dropIfExists('roadinspectiondetails');
    }
}
