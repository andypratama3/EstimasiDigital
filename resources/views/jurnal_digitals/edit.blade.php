@extends('layouts.dashboard')

@section('title', 'Jurnal Digital')

@section('content')

<div class="content-wrapper">
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">
                                                    Edit Jurnal Digital
                                            </h4>

                    {!! Form::model($jurnalDigital, ['route' => ['jurnalDigitals.update', $jurnalDigital->id], 'method' => 'patch', 'class' => 'forms-sample']) !!}

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
