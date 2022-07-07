<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompanyApplicant extends Model
{
    use HasFactory;
    protected $table = 'company_applicants';
    protected $fillable = [
        'application_id',
        'tracking_no',
        'appliant_name',
        'appliant_nid',
        'appliant_dob',
        'appliant_designation_id',
        'appliant_phone',
        'appliant_email',
        'appliant_image',
        'is_owner',
        'appliant_present_flat',
        'appliant_present_house',
        'appliant_present_Road',
        'appliant_present_ward',
        'appliant_present_postOffice',
        'appliant_present_division',
        'appliant_present_address',
        'appliant_parmanent_flat',
        'appliant_parmanent_house',
        'appliant_parmanent_Road',
        'appliant_parmanent_ward',
        'appliant_parmanent_postOffice',
        'appliant_parmanent_division',
        'applicant_parmanent_address',
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
