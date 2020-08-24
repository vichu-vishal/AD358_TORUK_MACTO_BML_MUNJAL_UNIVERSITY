<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LowLevelComplaint extends Model
{
     protected $table = 'lowlevelcomplaints';
    protected $fillable = ['complaint_id', 'state', 'district', 'city_or_village', 'RoadSize_Length', 'RoadSize_Breadth', 'damage_level', 'road_name', 'road_number', 'roadType', 'repairMethodology', 'Estimatedamount', 'Budjet', 'FundScheme', 'AccountNumber', 'AccountName', 'IFSC_Code', 'Branch_name', 'Bank_name'];
}
