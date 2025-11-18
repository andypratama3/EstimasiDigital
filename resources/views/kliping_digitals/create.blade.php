@extends('layouts.dashboard')

@section('title', 'Tambah Kliping')

@section('content')
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">
                        Tambah Kliping Digital
                    </h4>
                    @include('adminlte-templates::common.errors')
                    {!! Form::open(['route' => 'klipingDigitals.store', 'class' => 'forms-sample']) !!}

                    <div class="row">
                        @include('kliping_digitals.fields')
                    </div>

                    <a href="{{ route('klipingDigitals.index') }}" class="btn btn-light">
                        Cancel
                    </a>

                    {!! Form::submit('Submit', ['class' => 'btn btn-primary mr-2']) !!}

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>


@endsection
