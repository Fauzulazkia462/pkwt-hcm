<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $table = 'employees';

    protected $fillable = [
        'nik', 'name', 'divisi_id', 'departemen_id', 'jobtitle_id', 'grade_id',
    ];
}
