@@extends('layouts.dashboard')

@@section('content')
<div class="content-wrapper">
    <div class="page-header">
        @if($config->options->localized)
            <h3 class="page-title">@@lang('models/{{ $config->modelNames->camelPlural }}.plural')</h3>
        @else
            <h3 class="page-title">{{ $config->modelNames->humanPlural }}</h3>
        @endif
        <nav aria-label="breadcrumb">
            <a class="btn btn-primary"
                href="@{{ route('{!! $config->prefixes->getRoutePrefixWith('.') !!}{!! $config->modelNames->camelPlural !!}.create') }}">
                @if($config->options->localized)
                    @@lang('crud.add_new')
                @else
                    Tambah Data
                @endif
            </a>
        </nav>
    </div>

    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                @@include('flash::message')

                <div class="table-responsive">
                    {!! $table !!}
                </div>
            </div>
        </div>
    </div>
</div>
@@endsection
