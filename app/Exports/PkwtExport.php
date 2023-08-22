<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use App\Models\Pkwt;

class PkwtExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $query = "SELECT b.nik, b.name, c.nama_divisi, d.nama_departemen, e.grade_title, f.nama_jobtitle, a.pkwt_ke, a.pkwt_no, a.start_date, a.end_date, a.pkwt_sign, a.status
        FROM pkwt As a, employees As b, divisi As c, departemen As d, grade As e, jobtitle As f
        WHERE a.employee_id=b.nik 
        AND b.divisi_id=c.id
        AND b.departemen_id=d.id
        AND b.grade_id=e.id
        AND b.jobtitle_id=f.id";

        // $query = \DB::table('pkwt')
        // ->leftjoin('employees', 'pkwt.employee_id', '=', 'employees.id')
        // ->leftjoin('divisi', 'employees.divisi_id', '=', 'divisi.id')
        // ->leftjoin('departemen', 'employees.departemen_id', '=', 'departemen.id')
        // ->leftjoin('grade', 'employees.grade_id', '=', 'grade.id')
        // ->leftjoin('jobtitle', 'employees.jobtitle_id', '=', 'jobtitle.id')
        // ->select('employees.nik', 'employees.name', 'divisi.nama_divisi', 'departemen.nama_departemen', 'grade.grade_title', 'jobtitle.nama_jobtitle', 'pkwt.pkwt_ke', 'pkwt.pkwt_no', 'pkwt.start_date', 'pkwt.end_date', 'pkwt.pkwt_sign', 'pkwt.status')
        // ->get();

        return collect(\DB::select($query));
    }

    public function headings():array{
        return [
            'Nik',
            'Nama',
            'Divisi',
            'Departemen',
            'Grade',
            'Job Title',
            'Pkwt Ke',
            'Pkwt No',
            'Start Date',
            'End Date',
            'Sign',
            'Status',
        ];
    }
}
