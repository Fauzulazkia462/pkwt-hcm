<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\Employee;
use App\Models\Pkwt;
use App\Imports\EmployeeImport;
use App\Imports\PkwtImport;
use Response;

class InputController extends Controller
{
    public function index()
    {
        return view('input.index');
    }

    public function tempdakar() {
        $filePath = public_path(). "/uploads/template/template-dakar.xlsx";
        return Response::download($filePath);
    }

    public function temppkwt() {
        $filePath = public_path(). "/uploads/template/template-pkwt.xlsx";
        return Response::download($filePath);
    }

    public function importemp(Request $req){
        Excel::import(new EmployeeImport, $req->file('file'));
        return back();
    }

    public function importpkwt(Request $req){
        Excel::import(new PkwtImport, $req->file('file'));
        return back();
    }
}
