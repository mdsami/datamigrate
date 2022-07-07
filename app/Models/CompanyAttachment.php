<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompanyAttachment extends Model
{
    use HasFactory;
    protected $table = 'company_attachments';

    protected $fillable = [
        'tracking_no',
        'application_id',
        'attachment_title',
        'attachment_title_en',
        'attachment_file',
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
