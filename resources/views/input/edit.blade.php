@extends('layouts.main')

@section('content')
<section class="section" id="input">
    <div class="container text-center">
        <h6 class="display-4 has-line">EDIT DATA PEMINJAMAN</h6>
        <p class="mb-5 pb-2 text-center">Hati - hati dalam input, periksa kembali sebelum submit!</p>

        <form method="POST" action="{{ url('input/'.$model->id) }}">
            <div class="container">
                <div class="row mb-4">
                    <div class="col-md-4">
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                        <div class="form-group pb-1">
                            <label for="inputer"><b>Admin</b></label>
                            <select name="inputer" id="inputer" class="form-control text-center" title="Kode Payroll" required>
                                @foreach ($admin as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row mb-4">
                    <div class="col-md-6">
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                        <div class="form-group pb-1">
                            <label for="name"><b>Nama</b></label>
                            <select name="name" id="name" class="form-control selectpicker" data-live-search="true" title="Nama" required>
                                @foreach ($employee as $item)
                                    <option value="{{ $item->id }}">{{ $item->nik.'-'.$item->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group pb-1">
                            <label for="payroll_code"><b>Kode Payroll</b></label>
                            <select name="payroll_code" id="payroll_code" class="form-control selectpicker" data-live-search="true" title="Kode Payroll" required>
                                @foreach ($payroll_code as $item)
                                    <option value="{{ $item->id }}">{{ $item->payroll_code }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group pb-1">
                            <label for="costcenter_code"><b>Kode Cost Center</b></label>
                            <input type="text" class="form-control" name="costcenter_code" id="costcenter_code" required placeholder="Kode Cost Center" value="{{ $model->costcenter_code }}" disabled>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group pb-1">
                            <label for="section"><b>Kode Bagian</b></label>
                            <input type="text" class="form-control" name="section" id="section" required placeholder="Kode Bagian" value="{{ $model->section_code }}" disabled>
                        </div>
                        <div class="form-group pb-1">
                            <label for="date"><b>Tanggal Peminjaman</b></label>
                            <input type="date" class="form-control" name="date" id="date" required placeholder="Tanggal" value="{{ $model->loan_date }}">
                        </div>
                        <div class="form-group pb-1">
                            <label for="time"><b>Jumlah Menit Bekerja</b></label>
                            <input type='text' onkeypress='validate(event)' class="form-control" name="time" id="time" required placeholder="Jumlah Menit Bekerja" value="{{ $model->duration }}">
                        </div>
                        <div class="text-right">
                            <input type="submit" class="btn btn-primary mt-3" value="Submit">
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</section>
@endsection

@section('script')
<script>
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

var id_employee = "{{ $model->employee_id }}";
var id_payroll = "{{ $model->payroll_id }}";
$('select[name=name]').val(id_employee);
$('select[name=payroll_code]').val(id_payroll);
$('.selectpicker').selectpicker('refresh')

$('select[name=payroll_code]').on('change', function(){
    var payroll_code = $(this).val();
    $.ajax({
        type: "POST",
        url: "{{ route('get.code') }}",
        data: {'payroll_code':payroll_code},
        dataType: 'json',
        success : function(data) {
            $('#costcenter_code').val(data.costcenter_code);
            $('#section').val(data.section_code + " (" + data.section_name + ")");
        },
        error: function(response) {
            alert(response.responseJSON.message);
        }
    });
});
</script>
@endsection
