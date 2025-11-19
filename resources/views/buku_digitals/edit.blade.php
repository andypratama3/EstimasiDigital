@extends('layouts.dashboard')

@section('title', 'Buku Digital')

@section('content')

<div class="content-wrapper">
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">
                        Edit Buku Digital
                    </h4>

                    {!! Form::model($bukuDigital, ['route' => ['bukuDigitals.update', $bukuDigital->id], 'method' =>
                    'patch', 'class' => 'forms-sample', 'files' => true]) !!}

                    <div class="row">
                        @include('buku_digitals.fields')
                    </div>

                    <a href="{{ route('bukuDigitals.index') }}" class="btn btn-light">
                        Cancel </a>

                    {!! Form::submit('Submit', ['class' => 'btn btn-primary mr-2']) !!}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
