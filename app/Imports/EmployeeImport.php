<?php

namespace App\Imports;

use App\Models\Employee;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;
// use Illuminate\Support\Collection;
// use Maatwebsite\Excel\Concerns\ToCollection;

class EmployeeImport implements ToModel, WithHeadingRow, WithMultipleSheets
{
    /**
    * @param Collection $collection
    */
    // public function collection(Collection $collection)
    // {
        
    // }
    public function model(array $row){

        return new Employee([
            'nik' => $row['nik'],
            'name' => $row['nama'],
            'divisi_id' => $row['divisi_id'],
            'departemen_id' => $row['dept_id'],
            'jobtitle_id' => $row['jobtitle_id'],
            'grade_id' => $row['grade_id'],
        ]);
    }

    public function rules():array{
        return [
            'nik' => 'required',
            'nama' => 'required',
            'divisi_id' => 'required',
            'dept_id' => 'required',
            'jobtitle_id' => 'required',
            'grade_id' => 'required',
        ];
    }

    public function sheets(): array
    {
        return [
            'Input' => $this,
        ];
    }
}
