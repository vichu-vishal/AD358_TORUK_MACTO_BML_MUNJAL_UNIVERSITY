<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RoadInspectionDetail extends Model
{
     protected $table = 'roadinspectiondetails';
    protected $fillable = ['state', 'district', 'panchayath_or_municipal', 'city_or_village', 'RoadSize_Length', 'RoadSize_Breadth', 'budget', 'totalCost', 'damage_level', 'additional_inspection_description', 'inspection_image', 'complaint_id', 'road_name', 'road_number', 'repairmethod', 'trafficintense' ];
}
