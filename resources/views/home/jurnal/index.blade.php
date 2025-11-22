@extends('layouts.home')

@push('home_css')
<style>
    .custom_css {
        justify-content: center !important;
        align-items: center !important;
        text-align: center !important;
    }

    .custom_css .img-modified {
        width: 100%;
        height: 100%;
        margin-left: 20px !important;
    }

    .jurnal-item {
        transition: all 0.3s ease;
        border-left: 4px solid transparent;
        gap: 10px;
        margin: 10px;
    }

    .jurnal-item:hover {
        border-left-color: #3b82f6;
        background-color: #f8fafc;
        margin-right: 10px;
        gap: 4px;
    }

    .jurnal-title {
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }

    .btn-action {
        transition: all 0.2s ease;
    }

    .btn-action:hover {
        transform: translateY(-2px);
    }

    .pagination-custom li a,
    .pagination-custom li span {
        transition: all 0.2s ease;
    }
</style>
@endpush

@section('content')

<section class="gj qp gr hj rp hr">
    <div class="bb ze ki xn 2xl:ud-px-0">
        <div class="tc sf yo zf kq">
            <div class="ro">
                <div class="animate_top">
                    <div class="mb-8">
                        <h4 class="text-3xl font-bold tj kk wm qb">Daftar Jurnal Digital</h4>
                        <p class="mt-2 text-gray-600">Akses koleksi jurnal ilmiah terlengkap</p>
                    </div>

                    @forelse ($jurnals as $item)
                    <div class="p-6 mb-4 bg-white border-l-4 border-gray-300 rounded-lg shadow-sm jurnal-item">
                        <div class="flex items-start justify-between mb-4">
                            <div class="flex-1">
                                <h5 class="mb-3 text-lg font-semibold text-gray-900 transition jurnal-title wj kk wm xl bn ml il hover:text-blue-600">
                                    <a href="{{ route('jurnal.show', $item->id) }}">{{ $item->judul }}</a>
                                </h5>

                                <div class="flex flex-wrap gap-4 mb-4 text-sm text-gray-600">
                                    @if($item->penulis)
                                    <div class="flex items-center gap-2">
                                        <i class="text-blue-500 fa fa-user"></i>
                                        <span>{{ $item->penulis }}</span>
                                    </div>
                                    @endif

                                    @if($item->sumber)
                                    <div class="flex items-center gap-2">
                                        <i class="text-green-500 fa fa-book"></i>
                                        <span>{{ $item->sumber }}</span>
                                    </div>
                                    @endif

                                    @if($item->tanggal_publikasi)
                                    <div class="flex items-center gap-2">
                                        <i class="text-red-500 fa fa-calendar"></i>
                                        <span>{{ $item->tanggal_publikasi->format('d M Y') }}</span>
                                    </div>
                                    @endif
                                </div>

                                @if($item->isi)
                                <p class="mb-4 text-sm text-gray-700 line-clamp-2">{{ Str::limit($item->isi, 200) }}</p>
                                @endif

                                @if($item->kategori)
                                <div class="mb-3">
                                    <span class="inline-block px-3 py-1 text-xs text-blue-800 bg-blue-100 rounded-full">
                                        {{ $item->kategori }}
                                    </span>
                                </div>
                                @endif
                            </div>
                        </div>

                        <div class="flex gap-3 pt-4 border-t">
                            <a href="{{ route('jurnal.show', $item->id) }}" class="inline-flex items-center gap-2 px-4 py-2 text-black bg-blue-500 rounded-lg btn-action hover:bg-green-600">
                                <i class="fa fa-eye"></i>
                                <span class="text-black text-bold">Lihat Detail</span>
                            </a>

                            @if($item->url_sumber)
                            <a href="{{ $item->url_sumber }}" target="_blank" class="inline-flex items-center gap-2 px-4 py-2 text-white bg-green-500 rounded-lg btn-action hover:bg-green-600">
                                <i class="fa fa-download"></i>
                                <span>Download</span>
                            </a>
                            @endif

                            @if($item->is_protected)
                            <span class="inline-flex items-center gap-2 px-4 py-2 text-gray-600 bg-gray-200 rounded-lg cursor-not-allowed">
                                <i class="fa fa-lock"></i>
                                <span>Terbatas</span>
                            </span>
                            @endif
                        </div>
                    </div>
                    @empty
                    <div class="py-16 text-center">
                        <div class="mb-4">
                            <i class="text-6xl text-gray-400 fa fa-inbox"></i>
                        </div>
                        <p class="text-lg text-gray-500">Tidak ada jurnal tersedia saat ini.</p>
                        <p class="mt-2 text-sm text-gray-400">Coba kembali nanti atau gunakan fitur pencarian</p>
                    </div>
                    @endforelse

                    <!-- Pagination -->
                    @if($jurnals->hasPages())
                    <div class="mt-8 mb-6">
                        <nav aria-label="Page navigation" class="flex justify-center">
                            <ul class="flex items-center gap-1 pagination-custom">
                                {{-- Previous Page Link --}}
                                @if($jurnals->onFirstPage())
                                    <li>
                                        <span class="px-3 py-2 text-gray-400 cursor-not-allowed">
                                            <i class="fa fa-chevron-left"></i>
                                        </span>
                                    </li>
                                @else
                                    <li>
                                        <a class="px-3 py-2 border border-gray-300 rounded hover:bg-gray-100 hover:border-gray-400" href="{{ $jurnals->previousPageUrl() }}" rel="prev">
                                            <i class="fa fa-chevron-left"></i>
                                        </a>
                                    </li>
                                @endif

                                {{-- Pagination Elements --}}
                                @foreach($jurnals->getUrlRange(1, $jurnals->lastPage()) as $page => $url)
                                    @if($page == $jurnals->currentPage())
                                        <li>
                                            <span class="px-4 py-2 font-bold text-white bg-blue-500 rounded-lg">
                                                {{ $page }}
                                            </span>
                                        </li>
                                    @else
                                        <li>
                                            <a class="px-4 py-2 transition border border-gray-300 rounded hover:bg-blue-50 hover:border-blue-300" href="{{ $url }}">
                                                {{ $page }}
                                            </a>
                                        </li>
                                    @endif
                                @endforeach

                                {{-- Next Page Link --}}
                                @if($jurnals->hasMorePages())
                                    <li>
                                        <a class="px-3 py-2 border border-gray-300 rounded hover:bg-gray-100 hover:border-gray-400" href="{{ $jurnals->nextPageUrl() }}" rel="next">
                                            <i class="fa fa-chevron-right"></i>
                                        </a>
                                    </li>
                                @else
                                    <li>
                                        <span class="px-3 py-2 text-gray-400 cursor-not-allowed">
                                            <i class="fa fa-chevron-right"></i>
                                        </span>
                                    </li>
                                @endif
                            </ul>
                        </nav>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
