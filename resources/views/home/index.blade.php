@extends('layout.main')

@section('content')
<section class="section" id="home">
    <div class="container text-center">
        <h6 class="display-4 has-line">Data Karyawan Kontrak</h6>
        <p class="mb-5 pb-2"> </p>
        <div class="container">
            <table id="dttable" class="table table-stripeds">
                <thead>
                    <tr>
                        <th>NIK</th>
                        <th>Nama</th>
                        {{-- <th>Divisi</th> --}}
                        <th>Departemen</th>
                        <th>Grade</th>
                        {{-- <th>Job Title</th> --}}
                        {{-- <th>Start Date</th> --}}
                        {{-- <th>End Date</th> --}}
                        {{-- <th>Durasi</th> --}}
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($datas as $value)
                        <tr>
                            <td>{{ $value->nik }}</td>
                            <td>{{ $value->name }}</td>
                            {{-- <td>{{ $value->nama_divisi }}</td> --}}
                            <td>{{ $value->nama_departemen }}</td>
                            <td>{{ $value->grade_title }}</td>
                            {{-- <td>{{ $value->nama_jobtitle }}</td> --}}
                            {{-- <td>{{ $value->start_date }}</td> --}}
                            {{-- <td>{{ $value->end_date }}</td> --}}
                            {{-- <td></td> --}}
                            <td>
                                <form action="{{ url('/view/'.$value->nik) }}" method="get">
                                    @csrf
                                    <input type="hidden" name="idEmp" value="{{ $value->nik }}">
                                    <button class="btn btn-sm btn-primary">View</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</section>
@endsection

@section('script')
<script>
$(document).ready(function() {
    $('#dttable').DataTable();
});

$('#dttable').dataTable( {
    //order: [[7, 'desc']],
    //"scrollX": true,
    //"bLengthChange": false,
    //"columnDefs": [
    //    { "targets": 1, "width": 100 },
    //    { "targets": 5, "width": 90 },
    //    { "targets": 7, "width": 90 },
    //]
});

</script>
@endsection
