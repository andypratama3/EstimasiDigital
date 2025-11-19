@extends('layouts.dashboard')

@section('title', 'User')

@section('content')

<div class="content-wrapper">
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">
                        Tambah User
                    </h4>

                    {!! Form::open(['route' => 'users.store', 'class' => 'forms-sample']) !!}

                    <div class="row">
                        @include('users.fields')
                    </div>

                    <a href="{{ route('users.index') }}" class="btn btn-light">
                        Cancel </a>

                    {!! Form::submit('Submit', ['class' => 'btn btn-primary mr-2']) !!}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
