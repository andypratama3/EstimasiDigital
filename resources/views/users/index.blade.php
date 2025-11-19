@extends('layouts.dashboard')

@section('title', 'User')

@section('content')
<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <div class="mb-2 row">
                <div class="col-md-12">
                    <h4 class="card-title">User</h4>
                    <a href="{{ route('users.create') }}" class="float-right btn btn-success btn-sm"><i class="fa fa-plus"></i> Tambah Data</a>
                </div>
            </div>
            @include('users.table')
        </div>
    </div>
</div>
@endsection
