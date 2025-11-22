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
    </style>
@endpush

@section('content')
<section class="ji gp uq">
      <div class="bb ye ki xn vq jb jo">
        <div class="wc qf pn xo zf iq">
          <!-- Blog Items Loop -->
          @forelse($klipings as $kliping)
            <div class="animate_top sg vk rm xm">
              <div class="c rc i z-1 pg">
                <img class="w-full" src="{{ $kliping->getFirstMediaUrl('cover') ?? 'images/blog-01.png' }}" alt="{{ $kliping->judul }}" />

                <div class="z-10 im h r s df vd yc wg tc wf xf al hh/20 nl il">
                  <a href="{{ route('kliping.show', $kliping->id) }}" class="vc ek rg lk gh sl ml il gi hi">Read More</a>
                </div>
              </div>

              <div class="yh">
                <div class="tc uf wf ag jq">
                  <div class="tc wf ag">
                    <img src="{{ asset('assets_home/images/icon-man.svg') }}" alt="User" />
                    <p>{{ $kliping->penulis ?? 'Unknown' }}</p>
                  </div>
                  <div class="tc wf ag">
                    <img src="{{ asset('assets_home/images/icon-calender.svg') }}" alt="Calendar" />
                    <p>{{ $kliping->tanggal_publikasi ? $kliping->tanggal_publikasi->format('d M, Y') : 'N/A' }}</p>
                  </div>
                </div>
                <h4 class="ek tj ml il kk wm xl eq lb">
                  <a href="{{ route('kliping.show', $kliping->id) }}">{{ $kliping->judul }}</a>
                </h4>
              </div>
            </div>
          @empty
            <div class="py-8 text-center">
              <p>No kliping items available.</p>
            </div>
          @endforelse
        </div>

        <!-- Pagination -->
        @if($klipings->hasPages())
        <div class="mb lo bq i ua">
          <nav>
            <ul class="tc wf xf bg">
              {{-- Previous Page Link --}}
              @if($klipings->onFirstPage())
                <li>
                  <span class="opacity-50 c tc wf xf wd in zc hn rg uj fo wk xm ml il hh rm tl zm yl an">
                    <svg class="th lm ml il" width="8" height="14" viewBox="0 0 8 14" fill="none"
                      xmlns="http://www.w3.org/2000/svg">
                      <path
                        d="M2.93884 6.99999L7.88884 11.95L6.47484 13.364L0.11084 6.99999L6.47484 0.635986L7.88884 2.04999L2.93884 6.99999Z" />
                    </svg>
                  </span>
                </li>
              @else
                <li>
                  <a class="c tc wf xf wd in zc hn rg uj fo wk xm ml il hh rm tl zm yl an" href="{{ $klipings->previousPageUrl() }}">
                    <svg class="th lm ml il" width="8" height="14" viewBox="0 0 8 14" fill="none"
                      xmlns="http://www.w3.org/2000/svg">
                      <path
                        d="M2.93884 6.99999L7.88884 11.95L6.47484 13.364L0.11084 6.99999L6.47484 0.635986L7.88884 2.04999L2.93884 6.99999Z" />
                    </svg>
                  </a>
                </li>
              @endif

              {{-- Pagination Elements --}}
              @foreach($klipings->getUrlRange(1, $klipings->lastPage()) as $page => $url)
                @if($page == $klipings->currentPage())
                  <li>
                    <span class="text-white c tc wf xf wd in zc hn rg uj fo wk xm ml il hh rm tl zm yl an bg-primary">
                      {{ $page }}
                    </span>
                  </li>
                @else
                  <li>
                    <a class="c tc wf xf wd in zc hn rg uj fo wk xm ml il hh rm tl zm yl an" href="{{ $url }}">
                      {{ $page }}
                    </a>
                  </li>
                @endif
              @endforeach

              {{-- Next Page Link --}}
              @if($klipings->hasMorePages())
                <li>
                  <a class="c tc wf xf wd in zc hn rg uj fo wk xm ml il hh rm tl zm yl an" href="{{ $klipings->nextPageUrl() }}">
                    <svg class="th lm ml il" width="8" height="14" viewBox="0 0 8 14" fill="none"
                      xmlns="http://www.w3.org/2000/svg">
                      <path
                        d="M5.06067 7.00001L0.110671 2.05001L1.52467 0.636014L7.88867 7.00001L1.52467 13.364L0.110672 11.95L5.06067 7.00001Z"
                        fill="#fefdfo" />
                    </svg>
                  </a>
                </li>
              @else
                <li>
                  <span class="opacity-50 c tc wf xf wd in zc hn rg uj fo wk xm ml il hh rm tl zm yl an">
                    <svg class="th lm ml il" width="8" height="14" viewBox="0 0 8 14" fill="none"
                      xmlns="http://www.w3.org/2000/svg">
                      <path
                        d="M5.06067 7.00001L0.110671 2.05001L1.52467 0.636014L7.88867 7.00001L1.52467 13.364L0.110672 11.95L5.06067 7.00001Z"
                        fill="#fefdfo" />
                    </svg>
                  </span>
                </li>
              @endif
            </ul>
          </nav>
        </div>
        @endif
        </div>
      </div>
    </section>
@endsection
