@extends('layouts.dashboard')

@section('title', 'Dashboard')

@section('content')
<div class="col-md-12 grid-margin">
    <div class="row">
        <div class="mb-4 col-12 col-xl-8 mb-xl-0">
            <h3 class="font-weight-bold">Welcome {{ Auth::user()->name ?? '' }}</h3>
            <h6 class="mb-0 font-weight-normal">All systems are running smoothly! You have <span class="text-primary">3
                    unread alerts!</span></h6>
        </div>
        <div class="col-12 col-xl-4">
            <div class="justify-content-end d-flex">
                <div class="dropdown flex-md-grow-1 flex-xl-grow-0">
                    <button class="bg-white btn btn-sm btn-light dropdown-toggle" type="button" id="dropdownMenuDate2"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                        <i class="mdi mdi-calendar"></i> Today (10 Jan 2021)
                    </button>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuDate2">
                        <a class="dropdown-item" href="#">January - March</a>
                        <a class="dropdown-item" href="#">March - June</a>
                        <a class="dropdown-item" href="#">June - August</a>
                        <a class="dropdown-item" href="#">August - November</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6 grid-margin stretch-card">
        <div class="card tale-bg">
            <div class="mt-auto card-people">
                <img src="{{ asset('assets_home/images/hero.jpeg') }}" alt="people" class="img-fluid">
                <div class="weather-info">
                    <div class="d-flex">
                        <div>
                            <h2 class="mb-0 font-weight-normal"><i class="mr-2 icon-sun"></i>31<sup>C</sup></h2>
                        </div>
                        <div class="ml-2">
                            <h4 class="location font-weight-normal">Bangalore</h4>
                            <h6 class="font-weight-normal">Indonesia</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6 grid-margin transparent">
        <div class="row">
            <div class="mb-4 col-md-6 stretch-card transparent">
                <div class="card card-tale">
                    <div class="card-body">
                        <p class="mb-4">Total Buku</p>
                        <p class="mb-2 fs-30">{{ $buku }} Buku</p>
                    </div>
                </div>
            </div>
            <div class="mb-4 col-md-6 stretch-card transparent">
                <div class="card card-dark-blue">
                    <div class="card-body">
                        <p class="mb-4">Total Kliping</p>
                        <p class="mb-2 fs-30">{{ $kliping }} Kliping</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="mb-4 col-md-12 mb-lg-0 stretch-card transparent">
                <div class="card card-light-blue">
                    <div class="card-body">
                        <p class="mb-4">Total Jurnal</p>
                        <p class="mb-2 fs-30">{{ $jurnal }} Jurnal</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
