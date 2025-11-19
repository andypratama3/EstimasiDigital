@extends('layouts.dashboard')

@section('content')

<div class="content-wrapper">
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">
                                                    Detail User
                                            </h4>

                    <div class="row">
                        @include('users.show_fields')
                    </div>

                    <a class="btn btn-light" href="{{ route('users.index') }}">
                                                    Kembali
                                            </a>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
