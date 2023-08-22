<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pkwt extends Model
{
    protected $table = 'pkwt';

    protected $fillable = [
        'employee_id', 'pkwt_ke', 'pkwt_no', 'start_date', 'end_date', 'pkwt_sign', 'status',
    ];
}
