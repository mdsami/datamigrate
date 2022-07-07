<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ecab extends Model
{
    use HasFactory;
    protected $table = 'ecabs';
    protected $connection = 'mysql5';
}
