 <nav class="sidebar sidebar-offcanvas" id="sidebar">
     <ul class="nav">
         <li class="nav-item">
             <a class="nav-link" href="{{ route('dashboard.index') }}">
                 <i class="icon-grid menu-icon"></i>
                 <span class="menu-title">Dashboard</span>
             </a>
         </li>
         <li class="nav-item {{ Route::is('bukuDigitals.index') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('bukuDigitals.index') }}">
                 <i class="icon-paper menu-icon"></i>
                 <span class="menu-title">Buku Digital</span>
             </a>
         </li>
         <li class="nav-item {{ Route::is('klipingDigitals.index') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('klipingDigitals.index') }}">
                 <i class="icon-paper menu-icon"></i>
                 <span class="menu-title">Kliping Digital</span>
             </a>
         </li>
         <li class="nav-item {{ Route::is('jurnalDigitals.index') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('jurnalDigitals.index') }}">
                 <i class="icon-paper menu-icon"></i>
                 <span class="menu-title">Jurnal Digital</span>
             </a>
         </li>
         <li class="nav-item {{ Route::is('users.index') || Route::is('roles.index') ? 'active' : '' }}">
             <a class="nav-link" data-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">
                 <i class="icon-head menu-icon"></i>
                 <span class="menu-title">User Pages</span>
                 <i class="menu-arrow"></i>
             </a>
             <div class="collapse {{ (Route::is('users.*') || Route::is('roles.*')) ? 'show' : '' }}" id="auth">
                 <ul class="nav flex-column sub-menu">
                     <li class="nav-item {{ Route::is('users.index') ? 'active' : '' }}"> <a class="nav-link" href="{{ route('users.index') }}"> Pengguna </a></li>
                     <li class="nav-item {{ Route::is('roles.index') ? 'active' : '' }}"> <a class="nav-link" href="{{ route('roles.index') }}"> Role </a></li>
                 </ul>
             </div>
         </li>
     </ul>
 </nav>
