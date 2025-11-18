
<li class="nav-item">
    <a href="{{ route('klipingDigitals.index') }}" class="nav-link {{ Request::is('klipingDigitals*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-home"></i>
        <p>Kliping Digitals</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('bukuDigitals.index') }}" class="nav-link {{ Request::is('bukuDigitals*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-home"></i>
        <p>Buku Digitals</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('jurnalDigitals.index') }}" class="nav-link {{ Request::is('jurnalDigitals*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-home"></i>
        <p>Jurnal Digitals</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('roles.index') }}" class="nav-link {{ Request::is('roles*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-home"></i>
        <p>Roles</p>
    </a>
</li>
