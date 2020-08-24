<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTenderdetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tenderdetails', function (Blueprint $table) {
            $table->id();
            $table->string('complaint_id');//1
            $table->string('state');//2
            $table->string('district');//3
            $table->string('panchayath_or_municipal');//4
            $table->string('city_or_village');//5
            $table->string('road_name');//6
            $table->string('road_number');//7
            $table->string('damage_level');//8
            $table->string('RoadSize_Length');//9
            $table->string('RoadSize_Breadth');//10
            $table->string('name_work');//11
            $table->string('estimationCost');//12
            $table->string('earnestMoney');//13
            $table->string('validityPeriod');//14
            $table->string('securityDeposit');//15
            $table->string('mode_of_sending_tender');//16
            $table->string('deadline');//17
            $table->string('mode_of_quality_rate');//18
            $table->string('tender_issue_date');//19
            $table->string('tender_receive_date');//20
            $table->string('Contracter');//21
            $table->string('buisness_full_address');//22
            $table->string('telephone_office');//23
            $table->string('telephone_residential');//24
            $table->string('residential_address');//25
            $table->string('income_tax_address');//26
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
        Schema::dropIfExists('tenderdetails');
    }
}
