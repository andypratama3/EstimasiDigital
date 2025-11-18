@extends('layouts.dashboard')

@section('title', 'Jurnal Digital')

@section('content')

<div class="content-wrapper">
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">
                                                    Tambah Jurnal Digital
                                            </h4>

                    {!! Form::open(['route' => 'jurnalDigitals.store', 'class' => 'forms-sample']) !!}

                    <div class="row">
                        @include('jurnal_digitals.fields')
                    </div>

                    {!! Form::submit('Submit', ['class' => 'btn btn-primary mr-2']) !!}
                    <a href="{{ route('jurnalDigitals.index') }}" class="btn btn-light">
                         Cancel                     </a>

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
