@extends('layouts.dashboard')

@section('content')
<div class="content-wrapper">
    <div class="page-header">
                    <h3 class="page-title">Roles</h3>
                <nav aria-label="breadcrumb">
            <a class="btn btn-primary"
                href="{{ route('roles.create') }}">
                                    Tambah Data
                            </a>
        </nav>
    </div>

    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                @include('flash::message')

                <div class="table-responsive">
                    @include('roles.table')
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
