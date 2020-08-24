<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EditEstimationDetail extends Model
{
     protected $table = "editestimationdetails";
    protected $fillable = ['mazon', 'mcost', 'mazdoor', 'macost', 'equipment', 'equipment_quantity', 'equipment_cost', 'roadfurnitures', 'roadfurnitures_quantity', 'roadfurnitures_cost', 'complaint_id', 'state', 'district', 'city_or_village', 'RoadSize_Length', 'RoadSize_Breadth', 'damage_level', 'total_estimation_cost', 'road_name', 'road_number', ];
    protected $casts =[
        'equipment' => 'array',
        'equipment_quantity' => 'array',
        'equipment_cost' => 'array',
        'roadfurnitures' => 'array',
        'roadfurnitures_quantity' => 'array',
        'roadfurnitures_cost' => 'array'
    ];
}
