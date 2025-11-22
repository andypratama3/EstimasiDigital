@extends('layouts.home')

@section('content')

 <section class="gj qp gr hj rp hr">
      <div class="bb ze ki xn 2xl:ud-px-0">
        <div class="tc sf yo zf kq">
          <div class="ro">
            <div
              class="animate_top rounded-md shadow-solid-13 bg-white dark:bg-blacksection border border-stroke dark:border-strokedark p-7.5 md:p-10">
              <img src="{{ $kliping->getFirstMediaUrl('cover') ?: asset('assets_home/images/default-cover.jpg') }}" alt="Blog" />

              <h2 class="ek vj 2xl:ud-text-title-lg kk wm nb gb">{{ $kliping->judul }}</h2>

              <ul class="tc uf cg 2xl:ud-gap-15 fb">
                <li><span class="rc kk wm">Author: </span> {{ $kliping->createdBy->name ?? '-' }}</li>
                <li><span class="rc kk wm">Published On: </span> {{ $kliping->created_at->format('M d, Y') }}</li>
                <li><span class="rc kk wm">Category: </span> {{ $kliping->kategori ?? '-' }}</li>
                <li><span class="rc kk wm">Status : </span> {{ $kliping->is_protected ? 'Dilindungin' : '' }}</li>
              </ul>
              <p>
                {!! $kliping->isi !!}
              </p>
            </div>
          </div>

          <div class="jn/2 so">
            <div class="animate_top fb">
              <form action="#">
                <div class="i">
                  <input type="text" placeholder="Search Here..."
                    class="vd sm _g ch pm vk xm rg gm dm/40 dn/40 li mi" />

                  <button class="h r q _h">
                    <svg class="th ul ml il" width="21" height="21" viewBox="0 0 21 21" fill="none"
                      xmlns="http://www.w3.org/2000/svg">
                      <path
                        d="M16.031 14.617L20.314 18.899L18.899 20.314L14.617 16.031C13.0237 17.3082 11.042 18.0029 9 18C4.032 18 0 13.968 0 9C0 4.032 4.032 0 9 0C13.968 0 18 4.032 18 9C18.0029 11.042 17.3082 13.0237 16.031 14.617ZM14.025 13.875C15.2941 12.5699 16.0029 10.8204 16 9C16 5.132 12.867 2 9 2C5.132 2 2 5.132 2 9C2 12.867 5.132 16 9 16C10.8204 16.0029 12.5699 15.2941 13.875 14.025L14.025 13.875Z" />
                    </svg>
                  </button>
                </div>
              </form>
            </div>

            <div class="animate_top fb">
              <h4 class="tj kk wm qb">Categories</h4>

              <ul>
                <li class="ql vb du-ease-in-out il xl">
                  <a href="{{ route('kliping.index') }}">Kliping Digital</a>
                </li>
                <li class="ql vb du-ease-in-out il xl">
                  <a href="{{ route('jurnal.index') }}">Jurnal Digital</a>
                </li>
              </ul>
            </div>

            <div class="animate_top">
              <h4 class="tj kk wm qb">Related Posts</h4>

              <div>
                  @forelse ($klipingNew as $item)
                    <div class="tc fg 2xl:ud-gap-6 qb">
                        <img style="width: 25% !important; height: 50px;" src="{{ $item->getFirstMediaUrl('cover') ? $item->getFirstMediaUrl('cover') : asset('assets_home/images/default-cover.jpg') }}" alt="{{ $item->judul }}" />
                        <h5 class="wj kk wm xl bn ml il">
                            <a href="{{ route('buku.show', $item->id) }}">{{ $kliping->judul }}</a>
                        </h5>
                    </div>
                    @empty
                @endforelse
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

@endsection
