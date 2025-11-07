
{{-- EDIT --}}
@@extends('layouts.dashboard')

@@section('content')

<div class="content-wrapper">
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">
                        @if($config->options->localized)
                            @@lang('crud.edit') @@lang('models/{!! $config->modelNames->camelPlural !!}.singular')
                        @else
                            Edit {{ $config->modelNames->human }}
                        @endif
                    </h4>

                    @{!! Form::model(${{ $config->modelNames->camel }}, ['route' => ['{{ $config->prefixes->getRoutePrefixWith('.') }}{{ $config->modelNames->camelPlural }}.update', ${{ $config->modelNames->camel }}->{{ $config->primaryName }}], 'method' => 'patch', 'class' => 'forms-sample']) !!}

                    <div class="row">
                        @@include('{{ $config->prefixes->getViewPrefixForInclude() }}{{ $config->modelNames->snakePlural }}.fields')
                    </div>

                    @{!! Form::submit('Submit', ['class' => 'btn btn-primary mr-2']) !!}
                    <a href="@{{ route('{!! $config->prefixes->getRoutePrefixWith('.') !!}{!! $config->modelNames->camelPlural !!}.index') }}" class="btn btn-light">
                        @if($config->options->localized) @@lang('crud.cancel') @else Cancel @endif
                    </a>

                    @{!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>

@@endsection
