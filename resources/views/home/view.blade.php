@extends('layout.main')

@section('content')
<section class="section">
    <div class="container">
        <div class="row justify-content-between has-line">
            <div class="col-md-4 align-self-center mb-4 mb-md-0">
                <ul class="list-unstyled mt-4">
                    <li class="media">
                        <div class="circle-40 mr-3 mt-1"><i class="ti-gift"></i></div>
                        <div class="media-body">
                            <h6 class="mb-2">NIK</h6>
                            @foreach($employee as $e)
                            <p>{{$e->nik}}</p>
                            @endforeach
                        </div>
                    </li>
                    <li class="media">
                        <div class="circle-40 mr-3 mt-1"><i class="ti-face-smile"></i></div>
                        <div class="media-body">
                            <h6 class="mb-2">Nama</h6>
                            @foreach($employee as $e)
                            <p>{{$e->name}}</p>
                            @endforeach
                        </div>
                    </li>
                    <li class="media">
                        <div class="circle-40 mr-3 mt-1"><i class="ti-microphone"></i></div>
                        <div class="media-body">
                            <h6 class="mb-2">Grade</h6></h6>
                            @foreach($employee as $e)
                            <p>{{$e->grade_title}}</p>
                            @endforeach
                        </div>
                    </li>
                </ul>
            </div>
            <div class="col-md-4 col-lg-4">
                <ul class="list-unstyled mt-4">
                    <li class="media">
                        <div class="circle-40 mr-3 mt-1"><i class="ti-gift"></i></div>
                        <div class="media-body">
                            <h6 class="mb-2">Divisi</h6>
                            @foreach($employee as $e)
                            <p>{{$e->nama_divisi}}</p>
                            @endforeach
                        </div>
                    </li>
                    <li class="media">
                        <div class="circle-40 mr-3 mt-1"><i class="ti-face-smile"></i></div>
                        <div class="media-body">
                            <h6 class="mb-2">Departemen</h6>
                            @foreach($employee as $e)
                            <p>{{$e->nama_departemen}}</p>
                            @endforeach
                        </div>
                    </li>
                    <li class="media">
                        <div class="circle-40 mr-3 mt-1"><i class="ti-microphone"></i></div>
                        <div class="media-body">
                            <h6 class="mb-2">Job Title</h6>
                            @foreach($employee as $e)
                            <p>{{$e->nama_jobtitle}}</p>
                            @endforeach
                        </div>
                    </li>
                </ul>
            </div>
            <div class="col-md-4 col-lg-4">
                <ul class="list-unstyled mt-4">
                    <li class="media">
                        <div class="circle-40 mr-3 mt-1"><i class="ti-gift"></i></div>
                        <div class="media-body">
                            <h6 class="mb-2">Start Date</h6>
                            @foreach($pkwtLatest as $p)
                            <p>{{$p->start_date}}</p>
                            @endforeach
                        </div>
                    </li>
                    <li class="media">
                        <div class="circle-40 mr-3 mt-1"><i class="ti-face-smile"></i></div>
                        <div class="media-body">
                            <h6 class="mb-2">End Date</h6>
                            @foreach($pkwtLatest as $p)
                            <p>{{$p->end_date}}</p>
                            @endforeach
                        </div>
                    </li>
                    <li class="media">
                        <div class="circle-40 mr-3 mt-1"><i class="ti-microphone"></i></div>
                        <div class="media-body">
                            <h6 class="mb-2">PKWT ke</h6>
                            @foreach($pkwtLatest as $p)
                            <p>{{$p->pkwt_ke}}</p>
                            @endforeach
                        </div>
                    </li>
                </ul>
            </div>
        </div>
        <div class="container">
            <table id="dttable" class="table table-stripeds">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>PKWT No</th>
                        <th>Start Date</th>
                        <th>End Date</th>
                        <th>Durasi</th>
                        <th>Sign</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $number = 0;
                    @endphp

                    @foreach ($pkwt as $v)

                    @php
                    $date1 = $v->start_date;
                    $date2 = $v->end_date;

                    $ts1 = strtotime($date1);
                    $ts2 = strtotime($date2);

                    $year1 = date('Y', $ts1);
                    $year2 = date('Y', $ts2);

                    $month1 = date('m', $ts1);
                    $month2 = date('m', $ts2);

                    $diff = (($year2 - $year1) * 12) + ($month2 - $month1);
                    
                    $number++;
                    @endphp

                        <tr>
                            <td>{{ $number }}</td>
                            <td>{{ $v->pkwt_no }}</td>
                            <td>{{ $v->start_date }}</td>
                            <td>{{ $v->end_date }}</td>
                            <td>{{$diff}} Bulan</td>
                            <td>{{ $v->pkwt_sign }}</td>
                            <td>{{ $v->status }}</td>
                            <td>
                                <a data-toggle="modal" href="#modalEdit" class="openModalEdit"
                                data-id="{{$v->id}}"
                                data-sign="{{$v->pkwt_sign}}"
                                data-status="{{$v->status}}">
                                    <button class="btn btn-sm btn-primary">Edit</button>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</section>

<div class="modal fade" id="modalEdit" tabindex="-1" role="dialog" aria-labelledby="exportModalTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="modal-title" id="modal">Edit Sign & Status</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="/edit-statussign" method="post">
                {{-- <form id="editFormId"> --}}
                    @csrf
                    {{-- @method('PUT') --}}
                    {{-- {{ csrf_field() }} --}}
                    {{-- {{ method_field('PUT') }} --}}
                    <div class="col-md-6">
                        <input type="hidden" name="idEditStatus" id="idEditStatus" value="">
                        <div class="form-group pb-1">
                            <label for="ptk_amount"><b>Sign</b></label>
                            <select name="sign" id="sign" class="form-control">
                                <option value="Sudah">Sudah</option>
                                <option value="Belum">Belum</option>
                            </select>
                        </div>
                        <div class="form-group pb-1">
                            <label for="ptk_amount"><b>Status</b></label>
                            <select name="status" id="status" class="form-control">
                                <option value="Aktif">Aktif</option>
                                <option value="Tidak Aktif">Tidak Aktif</option>
                            </select>
                        </div>
                        <button class="btn btn-primary mt-3">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
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
<script>
    $(document).on("click", ".openModalEdit", function(){
        var id = $(this).data('id');
        var sign = $(this).data('sign');
        var status = $(this).data('status');

        $("#modalEdit #idEditStatus").val(id);
        $("#modalEdit #sign").val(sign);
        $("#modalEdit #status").val(status);
    })
</script>

{{-- <script>
    $('#editFormId').on('submit', function(e){
        e.preventDefault();

        var id = $('#modalEdit #idEditStatus').val();

        $.ajax({
            type: "PUT",
            url: "/edit-statussign",
            data: $('#editFormId').serialize(),
            success : function(response){

            console.log(response);
            $('#modalEdit').modal('hide');
            alert("Data Updated");
            
            },
            error : function(error){
                console.log(error);
            }
        });
    });
</script> --}}

@endsection
