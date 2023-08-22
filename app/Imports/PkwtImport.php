<?php

namespace App\Imports;

use App\Models\Pkwt;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;
// use Illuminate\Support\Collection;
// use Maatwebsite\Excel\Concerns\ToCollection;

class PkwtImport implements ToModel, WithHeadingRow
{
    /**
    * @param Collection $collection
    */
    // public function collection(Collection $collection)
    // {
        
    // }
    public function model(array $row){
        return new Pkwt([
            'employee_id' => $row['employee_nik'],
            'pkwt_ke' => $row['pkwt_ke'],
            'pkwt_no' => $row['pkwt_no'],
            'start_date' => $row['start_date'],
            'end_date' => $row['end_date'],
            'pkwt_sign' => $row['sign'],
            'status' => $row['status'],
        ]);
    }

    public function rules():array{
        return [
            'employee_nik' => 'required',
            'pkwt_ke' => 'required',
            'pkwt_no' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'sign' => 'required',
            'status' => 'required',
        ];
    }
}
