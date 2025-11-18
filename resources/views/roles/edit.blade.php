@extends('layouts.dashboard')

@section('title', 'Role')

@section('content')

<div class="content-wrapper">
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">
                                                    Edit Role
                                            </h4>

                    {!! Form::model($role, ['route' => ['roles.update', $role->id], 'method' => 'patch', 'class' => 'forms-sample']) !!}

                    <div class="row">
                        @include('roles.fields')
                    </div>

                    {!! Form::submit('Submit', ['class' => 'btn btn-primary mr-2']) !!}
                    <a href="{{ route('roles.index') }}" class="btn btn-light">
                         Cancel                     </a>

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
