<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>@yield('title')</title>
    @include('layouts.partials.head')
  </head>
  <body>
    <div class="container-scroller">
     @include('layouts.partials.sidebar')
      <div class="container-fluid page-body-wrapper">

        @include('layouts.partials.navbar')
        <div class="main-panel">
            @yield('content')
          @include('layouts.partials.footer')
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    @include('layouts.partials.script')
  </body>
</html>
