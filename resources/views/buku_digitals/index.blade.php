@extends('layouts.dashboard')

@section('title', 'Buku Digital')

@section('content')
<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <div class="mb-2 row">
                <div class="col-md-12">
                    <h4 class="card-title">Buku Digital</h4>
                    <a href="{{ route('bukuDigitals.create') }}" class="float-right btn btn-success btn-sm"><i class="fa fa-plus"></i> Tambah Data</a>
                </div>
            </div>
            @include('buku_digitals.table')
        </div>
    </div>
</div>
@endsection
