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

       <!-- ===== Hero Start ===== -->
       <section class="gj do ir hj sp i pg ">
           <!-- Hero Images -->

           <!-- Hero Content -->
           <div class="bb ze ki xn 2xl:ud-px-0 ">
               <div class="tc _o">
                   <div class="animate_left jn/2 ">
                       <h1 class="fk vj zp or kk wm wb">{{ $lastBuku->judul }}</h1>
                       <p class="fq">
                           {{ Str::limit($lastBuku->deskripsi, 25, ' ...') }}
                       </p>

                       <div class="tc tf yo zf mb">
                           <a href="#!" class="ek jk lk gh gi hi rg ml il vc _d _l">Get Started Now</a>

                           <span class="tc sf">
                               <a href="#!" class="inline-block ek xj kk wm"> Call us (0123) 456 – 789 </a>
                               <span class="inline-block">For any question or concern</span>
                           </span>
                       </div>
                   </div>
                    <div class="animate_left custom_css ">
                        <div class="text-center">
                            <img src="{{ $lastBuku->getFirstMediaUrl('cover') ?: asset('assets_home/images/default-cover.jpg') }}"
                                alt="{{ $lastBuku->judul }}" class="object-cover w-full h-full opacity-30 img-modified">
                        </div>
                    </div>
               </div>
           </div>
       </section>
    <!-- ===== Hero End ===== -->

    <!-- ===== Blog Start ===== -->
    <section class="ji gp uq">
      <!-- Section Title Start -->
      <div
        x-data="{ sectionTitle: `List Buku`, sectionTitleText: `Buku Telah Berstatus Di Lindungin`}">
        <div class="animate_top bb ze rj ki xn vq">
          <h2 x-text="sectionTitle" class="fk vj pr kk wm on/5 gq/2 bb _b">
          </h2>
          <p class="bb on/5 wo/5 hq" x-text="sectionTitleText"></p>
        </div>
      </div>
      <!-- Section Title End -->
    <div class="bb ye ki xn vq jb jo">
        <div class="wc qf pn xo zf iq">
            <!-- Blog Item -->
            @forelse($bukus as $index => $buku)

            <div class="animate_top sg vk rm xm">
                <div class="c rc i z-1 pg">
                    <img class="w-full" src="{{ $buku->getFirstMediaUrl('cover') ?: asset('assets_home/images/default-cover.jpg') }}" alt="Blog" />

                    <div class="z-10 im h r s df vd yc wg tc wf xf al hh/20 nl il">
                        <a href="{{ route('buku.show', $buku->id) }}" class="vc ek rg lk gh sl ml il gi hi">Read More</a>
                    </div>
                </div>
                <div class="yh">
                    <div class="tc uf wf ag jq">
                        <div class="tc wf ag">
                            <img src="{{ asset('assets_home/images/icon-man.svg')}}" alt="User" />
                              <p>{{ Str::limit($lastBuku->deskripsi, 25, ' ...') }}</p>
                        </div>
                        <div class="tc wf ag">
                            <img src="{{ asset('assets_home/images/icon-calender.svg')}}" alt="Calender" />
                            <p>Tahun Terbit : {{ $buku->tahun_terbit ?? '-' }}</p>
                        </div>
                    </div>
                    <h4 class="ek tj ml il kk wm xl eq lb">
                        <a href="{{ route('buku.show', $buku->id) }}">{{ Str::limit($buku->judul, 40, ' ...') }}</a>
                    </h4>
                </div>
            </div>

          @empty

          @endforelse
        </div>
    </div>
</section>
<!-- ===== Blog End ===== -->

@endsection
