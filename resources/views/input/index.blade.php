@extends('layout.main')

@section('content')
<section class="section" id="input">
    <div class="container">
        <h6 class="display-4 has-line text-center">Input Data PKWT</h6>
        <p class="mb-5 pb-2 text-center">Hati - hati dalam input, periksa kembali sebelum submit!</p>

        <div class="row mb-4">
            <div class="col-md-6">
                <div class="row mb-4">
                    <div class="col-md-12">
                        <div class="form-group pb-1">
                            <label for="name"><b>Data Karyawan</b></label>
                            <form class="form-employee" action="/import-karyawan" method="post" enctype="multipart/form-data">
                                @csrf
                                <input type="file" name="file" class="form-control" required>
                                <button class="btn btn-primary mt-3">Import</button>
                            </form>
                            <form class="form-employee" action="/temp-dakar" method="get">
                                @csrf
                                <button class="btn btn-primary mt-3">Download Template</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="row mb-4">
                    <div class="col-md-12">
                        <div class="form-group pb-1">
                            <label for="name"><b>Data PKWT</b></label>
                            <form class="form-employee" action="/import-pkwt" method="post" enctype="multipart/form-data">
                                @csrf
                                <input type="file" name="file" class="form-control" required>
                                <button class="btn btn-primary mt-3">Import</button>
                            </form>
                            <form class="form-employee" action="/temp-pkwt" method="get">
                                @csrf
                                <button class="btn btn-primary mt-3">Download Template</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@section('script')

@endsection
