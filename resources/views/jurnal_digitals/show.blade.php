@extends('layouts.dashboard')

@section('content')

<div class="content-wrapper">
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">
                                                    Detail Jurnal Digital
                                            </h4>

                    <div class="row">
                        @include('jurnal_digitals.show_fields')
                    </div>

                    <a class="btn btn-light" href="{{ route('jurnalDigitals.index') }}">
                                                    Kembali
                                            </a>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
