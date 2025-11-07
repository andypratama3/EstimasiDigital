@@extends('layouts.dashboard')

@@section('content')
    <div class="row">
        <div class="col-md-6 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                     <div class="col-sm-6">
                        @if($config->options->localized)
                            <h4 class="card-title">@@lang('models/{{ $config->modelNames->camelPlural }}.plural')</h4>
                        @else
                            <h4 class="card-title">{{ $config->modelNames->humanPlural }}</h4>
                        @endif
                    </div>
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <a class="btn btn-primary float-right"
                                href="@{{ route('{!! $config->prefixes->getRoutePrefixWith('.') !!}{!! $config->modelNames->camelPlural !!}.create') }}">
                                @if($config->options->localized)
                                    @@lang('crud.add_new')
                                @else
                                    Tambah Data
                                @endif
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="content px-3">

            @@include('flash::message')

            <div class="clearfix"></div>

            <div class="card">
                {!! $table !!}
            </div>
        </div>
    </div>

@@endsection
