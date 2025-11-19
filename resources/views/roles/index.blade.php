@extends('layouts.dashboard')

@section('title', 'Role')

@section('content')
<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <div class="mb-2 row">
                <div class="col-md-12">
                    <h4 class="card-title">Role</h4>
                    <a href="{{ route('roles.create') }}" class="float-right btn btn-success btn-sm"><i class="fa fa-plus"></i> Tambah Data</a>
                </div>
            </div>
            @include('roles.table')
        </div>
    </div>
</div>
@endsection
