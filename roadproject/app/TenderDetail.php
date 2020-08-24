<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TenderDetail extends Model
{
   protected $table = 'tenderdetails';
    protected $fillable = ['complaint_id','state', 'district', 'panchayath_or_municipal', 'city_or_village', 'road_name', 'road_number', 'damage_level', 'RoadSize_Length','RoadSize_Breadth', 'name_work', 'estimationCost', 'earnestMoney', 'validityPeriod', 'securityDeposit', 'mode_of_sending_tender', 'deadline', 'mode_of_quality_rate', 'tender_issue_date', 'tender_receive_date', 'Contracter', 'buisness_full_address', 'telephone_office', 'telephone_residential', 'residential_address', 'income_tax_address', 'ongoingstatus', 'ongoingstatusdescription']; 
}
 