<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompanyLandInfo extends Model
{
    use HasFactory;
    protected $table = 'company_land_infos';
    protected $fillable = [
        'application_id',
        'tracking_no',
        'land_name',
        'land_nid',
        'land_dob',
        'land_present_address',
        'land_parmanent_address',
        'land_phone',
        'land_email',
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
