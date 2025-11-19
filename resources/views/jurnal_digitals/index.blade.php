@extends('layouts.dashboard')

@section('title', 'Jurnal Digital')

@section('content')
<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <div class="mb-2 row">
                <div class="col-md-12">
                    <h4 class="card-title">Jurnal Digital</h4>
                    <a href="{{ route('jurnalDigitals.create') }}" class="float-right btn btn-success btn-sm"><i class="fa fa-plus"></i> Tambah Data</a>
                </div>
            </div>
            @include('jurnal_digitals.table')
        </div>
    </div>
</div>
@endsection
