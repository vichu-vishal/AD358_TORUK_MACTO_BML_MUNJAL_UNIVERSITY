<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PeopleComplaintImage extends Model
{
    protected $table = 'PeopleComplaintImages';
    protected $fillable = ['state', 'district', 'city_or_village', 'pincode', 'panchayath_or_municipal', 'road_name', 'damage_level', 'additional_description', 'complaintimage', 'approval_status', 'ri_approval_status', 'transactionstatus'];
}
