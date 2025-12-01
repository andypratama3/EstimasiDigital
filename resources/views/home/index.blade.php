@extends('layouts.home')

@section('content')
     <!-- ===== Hero Start ===== -->
    <section class="gj do ir hj sp jr i pg">
      <!-- Hero Images -->
      <div class="xc fn zd/2 2xl:ud-w-187.5 bd 2xl:ud-h-171.5 h q r" style="text-align: center; align-items:center !important;">
        <img src="{{ asset('assets_home/images/shape-01.svg')}}" alt="shape" class="xc 2xl:ud-block h t -ud-left-[10%] ua" />
        <img src="{{ asset('assets_home/images/shape-02.svg')}}" alt="shape" class="xc 2xl:ud-block h u p va" />
        <img src="{{ asset('assets_home/images/shape-03.svg')}}" alt="shape" class="xc 2xl:ud-block h v w va" />
        <img src="{{ asset('assets_home/images/shape-04.svg')}}" alt="shape" class="h q r" />
        <img src="{{ asset('assets_home/images/hero.jpeg')}}"
            alt="Woman"
            class="mx-auto h q r ua d-block"
            style="border-radius: 20px; width: 70%; margin: 80px 40px;" />
      </div>

      <!-- Hero Content -->
      <div class="bb ze ki xn 2xl:ud-px-0">
        <div class="tc _o">
          <div class="animate_left jn/2">
            <h1 class="fk vj zp or kk wm wb">Salam literasi! Jadikan buku sebagai sahabat setia dalam perjalanan hidupmu. Selamat membaca dan teruslah belajar!</h1>
            <p class="fq">
                Jl. Cipto Mangunkusumo No.Km 2, Sungai Keledang, Kec. Samarinda Seberang, Kota Samarinda, Kalimantan Timur 75132·1,5 km

            </p>

            <div class="tc tf yo zf mb">
              <a href="#!" class="ek jk lk gh gi hi rg ml il vc _d _l">Get Started Now</a>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- ===== Hero End ===== -->

    <!-- ===== Small Features Start ===== -->
    <section id="features" style="margin-bottom: 40px !important;">
      <div class="bb ze ki yn 2xl:ud-px-12.5 ">
        <div class="tc uf zo xf ap zf bp mq">
          <!-- Small Features Item -->
          <div class="animate_top kn to/3 tc cg oq">
            <div class="tc wf xf cf ae cd rg mh">
              <img src="{{ asset('assets_home/images/icon-01.svg')}}" alt="Icon" />
            </div>
            <div>
              <h4 class="ek yj go kk wm xb">Jam Operasional</h4>
              <p>Senin - Jumat: 08:00 - 15:00</p>
            </div>
          </div>

          <!-- Small Features Item -->
          <div class="animate_top kn to/3 tc cg oq">
            <div class="tc wf xf cf ae cd rg nh">
              <img src="{{ asset('assets_home/images/icon-02.svg')}}" alt="Icon" />
            </div>
            <div>
              <h4 class="ek yj go kk wm xb">Pelayanan yang Terbaik</h4>
              <p>Bagi Anda memilih buku yang sesuai dengan kebutuhan Anda.</p>
            </div>
          </div>

          <!-- Small Features Item -->
          <div class="animate_top kn to/3 tc cg oq">
            <div class="tc wf xf cf ae cd rg oh">
              <img src="{{ asset('assets_home/images/icon-03.svg')}}" alt="Icon" />
            </div>
            <div>
              <h4 class="ek yj go kk wm xb">Digital Library</h4>
              <p>Koleksi buku digital yang berisi lebih dari 1000 judul.</p>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- ===== Small Features End ===== -->
    <!-- ===== Team Start ===== -->

    <!-- ===== Projects End ===== -->
    <!-- ===== Counter Start ===== -->
    <section class="i pg qh rm ji hp">
      <img src="{{ asset('assets_home/images/shape-11.svg')}}" alt="Shape" class="of h ga ha ke" />
      <img src="{{ asset('assets_home/images/shape-07.svg')}}" alt="Shape" class="h ia o ae jf" />
      <img src="{{ asset('assets_home/images/shape-14.svg')}}" alt="Shape" class="h ja ka" />
      <img src="{{ asset('assets_home/images/shape-15.svg')}}" alt="Shape" class="h q p" />

      <div class="bb ze i va ki xn br">
        <div class="tc uf sn tn xf un gg">
          <div class="animate_top me/5 ln rj">
            <h2 class="gk vj zp or kk wm hc">{{ $countbuku }}</h2>
            <p class="ek bk aq">Buku Digital</p>
          </div>
          <div class="animate_top me/5 ln rj">
            <h2 class="gk vj zp or kk wm hc">{{ $countkliping }}</h2>
            <p class="ek bk aq">Kliping Digital</p>
          </div>
          <div class="animate_top me/5 ln rj">
            <h2 class="gk vj zp or kk wm hc">{{ $countjurnal }}</h2>
            <p class="ek bk aq">Jurnal</p>
          </div>
        </div>
      </div>
    </section>
    <!-- ===== Counter End ===== -->
    <!-- ===== Contact Start ===== -->
    <section id="support" class="i pg fh rm ji gp uq">
      <!-- Bg Shapes -->
      <img src="{{ asset('assets_home/images/shape-06.svg')}}" alt="Shape" class="h aa y" />
      <img src="{{ asset('assets_home/images/shape-03.svg')}}" alt="Shape" class="h ca u" />
      <img src="{{ asset('assets_home/images/shape-07.svg')}}" alt="Shape" class="h w da ee" />
      <img src="{{ asset('assets_home/images/shape-12.svg')}}" alt="Shape" class="h p s" />
      <img src="{{ asset('assets_home/images/shape-13.svg')}}" alt="Shape" class="h r q" />

      <!-- Section Title Start -->
      <div
        x-data="{ sectionTitle: `BPMP Kaltim`, sectionTitleText: `It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using.`}">
        <div class="animate_top bb ze rj ki xn vq">
          <h2 x-text="sectionTitle" class="fk vj pr kk wm on/5 gq/2 bb _b">
          </h2>
        </div>


      </div>
      <!-- Section Title End -->

      <div class="i va bb ye ki xn wq jb mo" style="justify-content: center !important;">
        <div class="tc uf sn tf rn un zf xl:gap-10">
          <div class="w-full animate_top nn/5 vo/3 vk sg hh sm yh tq">
            <!-- Bg Shapes -->
            <img src="{{ asset('assets_home/images/shape-03.svg')}}" alt="Shape" class="h la x wd" />
            <img src="{{ asset('assets_home/images/shape-06.svg')}}" alt="Shape" class="h la ma ne kf" />

            <div class="fb">
              <h4 class="wj kk wm cc">Email </h4>
              <p><a href="#!">perpus.bpmpkaltim@gmail.com</a></p>
            </div>
            <div class="fb">
              <h4 class="wj kk wm cc">Lokasi</h4>
              <p>Jl. Cipto Mangunkusumo No.Km 2, Sungai Keledang, Kec. Samarinda Seberang, Kota Samarinda, Kalimantan Timur 75132·1,5 km</p>
            </div>
            <div class="fb">
              <h4 class="wj kk wm cc">Kontak</h4>
              <p><a href="#!">(0541) 7277648</a></p>
            </div>
            <span class="rc nd rh tm lc fb"></span>

            <div>
              <h4 class="wj kk wm qb">Social Media</h4>
              <ul class="tc wf fg">
                <li>
                  <a href="https://share.google/dqM1JltMtCuzVMUIw" target="_blank" class="c tc wf xf ie ld rg ml il tl">
                    <svg class="th lm ml il" width="11" height="20" viewBox="0 0 11 20" fill="none"
                      xmlns="http://www.w3.org/2000/svg">
                      <path
                        d="M6.83366 11.3752H9.12533L10.042 7.7085H6.83366V5.87516C6.83366 4.931 6.83366 4.04183 8.667 4.04183H10.042V0.96183C9.74316 0.922413 8.61475 0.833496 7.42308 0.833496C4.93433 0.833496 3.16699 2.35241 3.16699 5.14183V7.7085H0.416992V11.3752H3.16699V19.1668H6.83366V11.3752Z"
                        fill="" />
                    </svg>
                  </a>
                </li>

                <li>
                  <a href="https://www.instagram.com/perpusbpmpkaltim?igsh=M2ZkeHp2N2FsOGhx" target="_blank" class="c tc wf xf ie ld rg ml il tl">
                    <svg class="th lm ml il" width="20" height="16" viewBox="0 0 20 16" fill="none"
                      xmlns="http://www.w3.org/2000/svg">
                     <path fill-rule="evenodd" clip-rule="evenodd" d="M12 18C15.3137 18 18 15.3137 18 12C18 8.68629 15.3137 6 12 6C8.68629 6 6 8.68629 6 12C6 15.3137 8.68629 18 12 18ZM12 16C14.2091 16 16 14.2091 16 12C16 9.79086 14.2091 8 12 8C9.79086 8 8 9.79086 8 12C8 14.2091 9.79086 16 12 16Z" fill="#0F0F0F"></path> <path d="M18 5C17.4477 5 17 5.44772 17 6C17 6.55228 17.4477 7 18 7C18.5523 7 19 6.55228 19 6C19 5.44772 18.5523 5 18 5Z" fill="#0F0F0F"></path> <path fill-rule="evenodd" clip-rule="evenodd" d="M1.65396 4.27606C1 5.55953 1 7.23969 1 10.6V13.4C1 16.7603 1 18.4405 1.65396 19.7239C2.2292 20.8529 3.14708 21.7708 4.27606 22.346C5.55953 23 7.23969 23 10.6 23H13.4C16.7603 23 18.4405 23 19.7239 22.346C20.8529 21.7708 21.7708 20.8529 22.346 19.7239C23 18.4405 23 16.7603 23 13.4V10.6C23 7.23969 23 5.55953 22.346 4.27606C21.7708 3.14708 20.8529 2.2292 19.7239 1.65396C18.4405 1 16.7603 1 13.4 1H10.6C7.23969 1 5.55953 1 4.27606 1.65396C3.14708 2.2292 2.2292 3.14708 1.65396 4.27606ZM13.4 3H10.6C8.88684 3 7.72225 3.00156 6.82208 3.0751C5.94524 3.14674 5.49684 3.27659 5.18404 3.43597C4.43139 3.81947 3.81947 4.43139 3.43597 5.18404C3.27659 5.49684 3.14674 5.94524 3.0751 6.82208C3.00156 7.72225 3 8.88684 3 10.6V13.4C3 15.1132 3.00156 16.2777 3.0751 17.1779C3.14674 18.0548 3.27659 18.5032 3.43597 18.816C3.81947 19.5686 4.43139 20.1805 5.18404 20.564C5.49684 20.7234 5.94524 20.8533 6.82208 20.9249C7.72225 20.9984 8.88684 21 10.6 21H13.4C15.1132 21 16.2777 20.9984 17.1779 20.9249C18.0548 20.8533 18.5032 20.7234 18.816 20.564C19.5686 20.1805 20.1805 19.5686 20.564 18.816C20.7234 18.5032 20.8533 18.0548 20.9249 17.1779C20.9984 16.2777 21 15.1132 21 13.4V10.6C21 8.88684 20.9984 7.72225 20.9249 6.82208C20.8533 5.94524 20.7234 5.49684 20.564 5.18404C20.1805 4.43139 19.5686 3.81947 18.816 3.43597C18.5032 3.27659 18.0548 3.14674 17.1779 3.0751C16.2777 3.00156 15.1132 3 13.4 3Z"></path>
                    </svg>
                  </a>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </section>

    </section>
@endsection
