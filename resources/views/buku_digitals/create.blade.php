@extends('layouts.dashboard')

@section('title', 'Buku Digital')

@section('content')

<div class="content-wrapper">
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">
                                                    Tambah Buku Digital
                                            </h4>

                    {!! Form::open(['route' => 'bukuDigitals.store', 'class' => 'forms-sample']) !!}

                    <div class="row">
                        @include('buku_digitals.fields')
                    </div>

                    {!! Form::submit('Submit', ['class' => 'btn btn-primary mr-2']) !!}
                    <a href="{{ route('bukuDigitals.index') }}" class="btn btn-light">
                         Cancel                     </a>

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
