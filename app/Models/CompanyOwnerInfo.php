<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompanyOwnerInfo extends Model
{
    use HasFactory;
    protected $table = 'company_owner_infos';
    protected $fillable = [
        'application_id',
        'tracking_no',
        'owner_name',
        'owner_nid',
        'owner_dob',
        'owner_designation_id',
        'owner_address',
        'owner_parmanent_address',
        'owner_phone',
        'owner_email',
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
