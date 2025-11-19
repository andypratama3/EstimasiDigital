@extends('layouts.dashboard')

@section('title', 'Tambah Jurnal')

@section('content')
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">
                        Tambah Jurnal Digital
                    </h4>
                    @include('adminlte-templates::common.errors')
                    {!! Form::open(['route' => 'jurnalDigitals.store', 'class' => 'forms-sample', 'files' => true]) !!}

                    <div class="row">
                        @include('jurnal_digitals.fields')
                    </div>

                    <a href="{{ route('jurnalDigitals.index') }}" class="btn btn-light">
                        Cancel
                    </a>

                    {!! Form::submit('Submit', ['class' => 'btn btn-primary mr-2']) !!}

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>


@endsection
