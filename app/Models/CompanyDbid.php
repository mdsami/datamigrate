<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompanyDbid extends Model
{
    use HasFactory;
    protected $table = 'company_dbid';

    protected $fillable = [
        'application_id',
        'tracking_no',
        'n_doptor_nothi_user_id',
        'dbid',
        'issue_date',
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
