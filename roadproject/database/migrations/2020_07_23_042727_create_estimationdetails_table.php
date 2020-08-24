<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEstimationdetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('estimationdetails', function (Blueprint $table) {
            $table->id();
            $table->string('complaint_id');
            $table->string('ee_approval_status')->nullable();
            $table->string('ce_approval_status')->nullable();
            $table->string('state');
            $table->string('district');
            $table->string('city_or_village');
            $table->string('road_name');
            $table->string('road_number');
            $table->string('RoadSize_Length');
            $table->string('RoadSize_Breadth');
            $table->string('damage_level');
            $table->string('mazon');
            $table->string('mazon_cost');
            $table->string('mazdoor');
            $table->string('mazdoor_cost');
            $table->string('total_estimation_cost');
            $table->json('equipment');
            $table->json('equipment_quantity');
            $table->json('equipment_cost');
            $table->json('roadfurnitures');
            $table->json('roadfurnitures_quantity');
            $table->json('roadfurnitures_cost');
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
        Schema::dropIfExists('estimationdetails');
    }
}
