<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLowlevelcomplaintsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lowlevelcomplaints', function (Blueprint $table) {
            $table->id();
            $table->string('complaint_id');
            $table->string('state');
            $table->string('district');
            $table->string('city_or_village');
            $table->string('RoadSize_Length');
            $table->string('RoadSize_Breadth');
            $table->string('damage_level');
            $table->string('road_name');
            $table->string('road_number');
            $table->string('roadType');
            $table->string('repairMethodology');
            $table->string('Estimatedamount');
            $table->string('Budjet');
            $table->string('FundScheme');
            $table->string('AccountNumber');
            $table->string('AccountName');
            $table->string('IFSC_Code');
            $table->string('Branch_name');
            $table->string('Bank_name');
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
        Schema::dropIfExists('lowlevelcomplaints');
    }
}
