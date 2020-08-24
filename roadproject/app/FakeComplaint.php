<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FakeComplaint extends Model
{
    protected $table = 'fakecomplaints';
    protected $fillable = ['state', 'district', 'city_or_village', 'complaint_id', 'panchayath_or_municipal', 'damage_level', 'additional_fake_complaint_description', 'inspection_fake_image','road_name', ];
}
