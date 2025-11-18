{{-- CREATE --}}
@@extends('layouts.dashboard')

@@section('title', '{{ $config->modelNames->human }}')

@@section('content')

<div class="content-wrapper">
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">
                        @if($config->options->localized)
                            @@lang('crud.create') @@lang('models/{!! $config->modelNames->camelPlural !!}.singular')
                        @else
                            Tambah {{ $config->modelNames->human }}
                        @endif
                    </h4>

                    @{!! Form::open(['route' => '{{ $config->prefixes->getRoutePrefixWith('.') }}{{ $config->modelNames->camelPlural }}.store', 'class' => 'forms-sample']) !!}

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
