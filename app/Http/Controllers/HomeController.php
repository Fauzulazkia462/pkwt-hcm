<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pkwt;

class HomeController extends Controller
{
    public function index()
    {
        $query = "SELECT a.*, b.nama_departemen, c.nama_divisi, d.nama_jobtitle, e.grade_title
        -- , f.start_date, f.end_date
        FROM employees AS a, departemen AS b, divisi AS c, jobtitle AS d, grade AS e
        -- , pkwt AS f
        WHERE a.departemen_id = b.id AND a.divisi_id = c.id AND a.jobtitle_id = d.id AND a.grade_id = e.id";
        // AND a.id = f.employee_id
        

        $datas = \DB::select($query);

        // $datas = \DB::table('employees')
        // ->leftjoin('departemen', 'employees.departemen_id', '=', 'departemen.id')
        // ->leftjoin('grade', 'employees.grade_id', '=', 'grade.id')
        // ->leftjoin('pkwt', 'employees.id', '=', 'pkwt.employee_id')
        // ->select('employees.*', 'departemen.*', 'grade.*', 'pkwt.*')
        // ->get();

        return view('home.index', compact(
            'datas'
        ));
    }

    public function view(Request $req)
    {
        $id = $req->idEmp;

        // $query = "SELECT a.*, b.nama_departemen, c.nama_divisi, d.nama_jobtitle, e.grade_title
        // FROM employees AS a, departemen AS b, divisi AS c, jobtitle AS d, grade AS e
        // WHERE a.departemen_id = b.id AND a.divisi_id = c.id AND a.jobtitle_id = d.id AND a.grade_id = e.id ";

        // $query = "SELECT pkwt.*, employees.*, departemen.*, divisi.*, grade.*, jobtitle.*

        //         WHERE pkwt.employee_id = $id AND employees.id = $id AND employees.departemen_id = departemen.id
        //         AND employees.divisi_id = divisi.id AND employees.grade_id = grade.id AND employees.jobtitle_id = jobtitle.id";

        // $datas = \DB::select($query);

        $pkwt = \DB::table('pkwt')
        ->select('pkwt.*')
        ->where('pkwt.employee_id', '=', $id)
        ->get();

        $pkwtLatest = \DB::table('pkwt')
        ->select('pkwt.*')
        ->where('pkwt.employee_id', '=', $id)
        ->orderBy('pkwt.created_at', 'DESC')
        ->limit(1)
        ->get();

        $employee = \DB::table('employees')
        ->leftjoin('departemen', 'employees.departemen_id', '=', 'departemen.id')
        ->leftjoin('divisi', 'employees.divisi_id', '=', 'divisi.id')
        ->leftjoin('jobtitle', 'employees.jobtitle_id', '=', 'jobtitle.id')
        ->leftjoin('grade', 'employees.grade_id', '=', 'grade.id')
        ->select('employees.*', 'departemen.*', 'divisi.*', 'jobtitle.*', 'grade.*')
        ->where('employees.nik', '=', $id)
        ->get();

        // return $id;
        return view('home.view', compact(
            'pkwt', 'employee', 'pkwtLatest'
        ));
    }

    public function editPkwtStatus(Request $req){

        

        $id = $req->idEditStatus;
        $model = Pkwt::find($id);
        $model->pkwt_sign = $req->sign;
        $model->status = $req->status;
        $model->save();

        
        return back()->with('message', [
            'type' => 'success',
            'msg' => 'Berhasil!!',
        ]);
    }
}
