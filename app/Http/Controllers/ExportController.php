<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exports\PkwtExport;
use Maatwebsite\Excel\Facades\Excel;
use DB;

class ExportController extends Controller
{
    public function exportexcel(){
        return Excel::download(new PkwtExport, 'PKWT-'.date('d-m-Y').'.xlsx');
    }
}
