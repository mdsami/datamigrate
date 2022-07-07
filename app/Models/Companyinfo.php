<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Companyinfo extends Model
{
    use HasFactory;
    protected $table = 'companyinfo';

    protected $fillable = [
        'citizen_id',
        'community_member_radio_check',
        'community_member',
        'community_member_number',
        'company_name_bangla',
        'company_name',
        'business_web_url',
        'facebook_url',
        'company_land_info',
        'company_address_bangla',
        'company_address',
        'company_phone_no',
        'company_mobile_no',
        'company_email',
        'company_year',
        'ubid_business_category',
        'ubid_business_type',
        'company_trade_license',
        'company_trade_license_issue_name',
        'company_trade_license_renew_date',
        'company_registration_number',
        'company_registration_office',
        'company_bin',
        'company_tin',
        'company_other_details',
        'status',
        'application_id',
        'tracking_no',
        'com_user_id',
        'ubid',
        'issue_date',
        'note',
        'certificate_link',
        'commit_workflow',
        'n_doptor_user_id',
        'is_view'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'created_at', 'updated_at',
    ];
}
