@extends('layouts.dashboard')

@section('title', 'Edit Kliping')

@section('content')

<div class="content-wrapper">
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">
                        Edit Kliping Digital
                    </h4>

                    {!! Form::model($klipingDigital, ['route' => ['klipingDigitals.update', $klipingDigital->id],
                    'method' => 'patch', 'class' => 'forms-sample','files' => true]) !!}

                    <div class="row">
                        @include('kliping_digitals.fields')
                    </div>

                    {!! Form::submit('Submit', ['class' => 'btn btn-primary mr-2']) !!}
                    <a href="{{ route('klipingDigitals.index') }}" class="btn btn-light">
                        Cancel </a>

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
