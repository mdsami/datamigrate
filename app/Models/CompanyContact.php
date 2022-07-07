<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompanyContact extends Model
{
    use HasFactory;
    protected $table = 'company_contacts';
    protected $fillable = [
        'application_id',
        'tracking_no',
        'contact_name',
        'contact_address',
        'contact_phone',
        'contact_email',
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
