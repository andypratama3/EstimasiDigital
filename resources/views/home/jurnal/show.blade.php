@extends('layouts.home')

@section('content')

<section class="gj qp gr hj rp hr">
    <div class="bb ze ki xn 2xl:ud-px-0">
        <div class="tc sf yo zf kq">
            <div class="grid grid-cols-1 gap-8 lg:grid-cols-3">
                <!-- Main Content -->
                <div class="lg:col-span-2">
                    <div
                        class="animate_top rounded-md shadow-solid-13 bg-white dark:bg-blacksection border border-stroke dark:border-strokedark p-7.5 md:p-10">

                        <h1 class="mb-6 text-3xl font-bold ek vj 2xl:ud-text-title-lg kk wm nb gb">
                            {{ $jurnal->judul }}
                        </h1>

                        <!-- Meta Information -->
                        <div class="p-6 mb-8 rounded-lg bg-gray-50 dark:bg-gray-800">
                            <ul class="space-y-4">
                                @if($jurnal->pengarang)
                                <li class="flex items-center gap-3 pb-3 border-b">
                                    <span class="font-semibold text-gray-700 dark:text-gray-300 min-w-[120px]">
                                        Pengarang:
                                    </span>
                                    <span class="text-gray-600 dark:text-gray-400">{{ $jurnal->pengarang }}</span>
                                </li>
                                @endif

                                @if($jurnal->penerbit)
                                <li class="flex items-center gap-3 pb-3 border-b">
                                    <span class="font-semibold text-gray-700 dark:text-gray-300 min-w-[120px]">
                                        Penerbit:
                                    </span>
                                    <span class="text-gray-600 dark:text-gray-400">{{ $jurnal->penerbit }}</span>
                                </li>
                                @endif

                                @if($jurnal->tahun_publikasi)
                                <li class="flex items-center gap-3 pb-3 border-b">
                                    <span class="font-semibold text-gray-700 dark:text-gray-300 min-w-[120px]">
                                        Tahun Publikasi:
                                    </span>
                                    <span class="text-gray-600 dark:text-gray-400">{{ $jurnal->tahun_publikasi }}</span>
                                </li>
                                @endif

                                @if($jurnal->volume)
                                <li class="flex items-center gap-3 pb-3 border-b">
                                    <span class="font-semibold text-gray-700 dark:text-gray-300 min-w-[120px]">
                                        Volume:
                                    </span>
                                    <span class="text-gray-600 dark:text-gray-400">{{ $jurnal->volume }}</span>
                                </li>
                                @endif

                                @if($jurnal->nomor)
                                <li class="flex items-center gap-3 pb-3 border-b">
                                    <span class="font-semibold text-gray-700 dark:text-gray-300 min-w-[120px]">
                                        Nomor:
                                    </span>
                                    <span class="text-gray-600 dark:text-gray-400">{{ $jurnal->nomor }}</span>
                                </li>
                                @endif

                                @if($jurnal->issn)
                                <li class="flex items-center gap-3 pb-3 border-b">
                                    <span class="font-semibold text-gray-700 dark:text-gray-300 min-w-[120px]">
                                        ISSN:
                                    </span>
                                    <span class="font-mono text-gray-600 dark:text-gray-400">{{ $jurnal->issn }}</span>
                                </li>
                                @endif

                                @if($jurnal->bidang_ilmu)
                                <li class="flex items-center gap-3">
                                    <span class="font-semibold text-gray-700 dark:text-gray-300 min-w-[120px]">
                                        Bidang Ilmu:
                                    </span>
                                    <span class="inline-block px-3 py-1 text-sm text-blue-800 bg-blue-100 rounded-full dark:bg-blue-900 dark:text-blue-200">
                                        {{ $jurnal->bidang_ilmu }}
                                    </span>
                                </li>
                                @endif

                                @if($jurnal->is_protected)
                                <li class="flex items-center gap-3 pt-3">
                                    <span class="inline-flex items-center gap-2 px-3 py-1 text-sm text-yellow-800 bg-yellow-100 rounded-full dark:bg-yellow-900 dark:text-yellow-200">
                                        <i class="fa fa-lock"></i>
                                        Akses Terbatas
                                    </span>
                                </li>
                                @endif
                            </ul>
                        </div>

                        <!-- Description -->
                        @if($jurnal->deskripsi)
                        <div class="mb-8">
                            <h3 class="mb-4 text-xl font-bold text-gray-900 dark:text-white">Deskripsi</h3>
                            <div class="leading-relaxed prose text-gray-700 prose-invert max-w-none dark:text-gray-300">
                                {!! nl2br(e($jurnal->deskripsi)) !!}
                            </div>
                        </div>
                        @endif

                        <!-- Download Section -->
                        @if($jurnal->getJurnalFileUrl())
                        <div class="p-6 mt-8 border-l-4 border-blue-500 rounded bg-blue-50 dark:bg-blue-900/20">
                            <div class="flex items-center justify-between">
                                <div>
                                    <h4 class="mb-1 font-semibold text-black dark:text-white">File Jurnal Tersedia</h4>
                                    <p class="text-sm text-gray-600 dark:text-gray-400">
                                        {{ $jurnal->getJurnalFileName() }}
                                    </p>
                                </div>
                                <a href="{{ $jurnal->getJurnalFileUrl() }}" download
                                    class="inline-flex items-center gap-2 px-6 py-3 text-white transition bg-blue-500 rounded-lg hover:bg-blue-600">
                                    <i class="fa fa-download"></i>
                                    <span class="text-black text-bold text-underline">Download</span>
                                </a>
                            </div>
                        </div>
                        @endif

                        <!-- Metadata Footer -->
                        <div class="pt-6 mt-8 border-t border-gray-200 dark:border-gray-700">
                            <p class="text-sm text-gray-500 dark:text-gray-400">
                                Dipublikasikan pada {{ $jurnal->created_at->format('d F Y H:i') }}
                                @if($jurnal->createdBy)
                                oleh <strong>{{ $jurnal->createdBy->name }}</strong>
                                @endif
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Sidebar -->
                <div class="space-y-6 lg:col-span-1">
                    <!-- Search -->
                    <div class="p-6 bg-white rounded-lg animate_top dark:bg-blacksection shadow-solid-13">
                        <form action="{{ route('jurnal.index') }}" method="GET">
                            <div class="relative">
                                <input type="text" name="search" placeholder="Cari jurnal..."
                                    class="w-full px-4 py-2 border rounded-lg vd sm _g ch pm vk xm rg gm dm/40 dn/40 li mi" />
                                <button type="submit" class="absolute -translate-y-1/2 right-2 top-1/2">
                                    <svg class="th ul ml il" width="21" height="21" viewBox="0 0 21 21" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M16.031 14.617L20.314 18.899L18.899 20.314L14.617 16.031C13.0237 17.3082 11.042 18.0029 9 18C4.032 18 0 13.968 0 9C0 4.032 4.032 0 9 0C13.968 0 18 4.032 18 9C18.0029 11.042 17.3082 13.0237 16.031 14.617ZM14.025 13.875C15.2941 12.5699 16.0029 10.8204 16 9C16 5.132 12.867 2 9 2C5.132 2 2 5.132 2 9C2 12.867 5.132 16 9 16C10.8204 16.0029 12.5699 15.2941 13.875 14.025L14.025 13.875Z" />
                                    </svg>
                                </button>
                            </div>
                        </form>
                    </div>

                    <!-- Categories -->
                    <div class="p-6 bg-white rounded-lg animate_top dark:bg-blacksection shadow-solid-13">
                        <h4 class="mb-4 font-bold tj kk wm qb">Kategori</h4>
                        <ul class="space-y-3">
                            <li class="ql vb du-ease-in-out il xl">
                                <a href="{{ route('kliping.index') }}"
                                    class="flex items-center gap-2 text-gray-600 transition dark:text-gray-400 hover:text-blue-500">
                                    <i class="fa fa-newspaper"></i>
                                    Kliping Digital
                                </a>
                            </li>
                            <li class="ql vb du-ease-in-out il xl">
                                <a href="{{ route('jurnal.index') }}"
                                    class="flex items-center gap-2 text-gray-600 transition dark:text-gray-400 hover:text-blue-500">
                                    <i class="fa fa-book"></i>
                                    Jurnal Digital
                                </a>
                            </li>
                        </ul>
                    </div>

                    <!-- Related Posts -->
                    <div class="p-6 bg-white rounded-lg animate_top dark:bg-blacksection shadow-solid-13">
                        <h4 class="mb-4 font-bold tj kk wm qb">Jurnal Terkait</h4>

                        <div class="space-y-4">
                            @forelse ($jurnalNew as $item)
                            <div class="flex gap-4 pb-4 border-b last:border-b-0">

                                <div
                                    class="flex items-center justify-center flex-shrink-0 w-16 h-20 bg-gray-300 rounded dark:bg-gray-600">
                                    <i class="text-gray-500 fa fa-book"></i>
                                </div>
                             
                                <div class="flex-1 min-w-0">
                                    <h5 class="mb-2 text-sm font-semibold text-gray-900 dark:text-white line-clamp-2">
                                        <a href="{{ route('jurnal.show', $item->id) }}"
                                            class="transition hover:text-blue-500">
                                            {{ $item->judul }}
                                        </a>
                                    </h5>
                                    @if($item->pengarang)
                                    <p class="text-xs text-gray-600 dark:text-gray-400">{{ $item->pengarang }}</p>
                                    @endif
                                </div>
                            </div>
                            @empty
                            <p class="py-4 text-sm text-center text-gray-500 dark:text-gray-400">Tidak ada jurnal terkait</p>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
