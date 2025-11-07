
{{-- SHOW --}}
@@extends('layouts.dashboard')

@@section('content')

<div class="content-wrapper">
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">
                        @if($config->options->localized)
                            @@lang('models/{!! $config->modelNames->camelPlural !!}.singular') @@lang('crud.detail')
                        @else
                            Detail {{ $config->modelNames->human }}
                        @endif
                    </h4>

                    <div class="row">
                        @@include('{{ $config->prefixes->getViewPrefixForInclude() }}{{ $config->modelNames->snakePlural }}.show_fields')
                    </div>

                    <a class="btn btn-light" href="@{{ route('{!! $config->prefixes->getRoutePrefixWith('.') !!}{!! $config->modelNames->camelPlural  !!}.index') }}">
                        @if($config->options->localized)
                            @@lang('crud.back')
                        @else
                            Kembali
                        @endif
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

@@endsection
