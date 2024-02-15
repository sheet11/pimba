<li class="{{ set_active('home') }}">
    <a href="{{ route('home') }}">
        <i class="fa fa-home"></i>
        <span>Dashboard</span>
    </a>
</li>

<li class="{{ set_active('barang') }}">
    <a href="{{ route('barang') }}">
        <i class="fa fa-satellite-dish"></i>
        <span>Data Barang</span>
    </a>
</li>

<li class="{{ set_active('peminjam') }}">
    <a href="{{ route('peminjam') }}">
        <i class="fa fa-clipboard-user"></i>
        <span>Data Peminjam</span>
    </a>
</li>
<li class="{{ set_active('peminjam.download') }}">
    <a target="_blank" href="{{ route('peminjam.download') }}">
        <i class="fa fa-download"></i>
        <span>Download Data Peminjam</span>
    </a>
</li>

<li class="{{ set_active('user') }}">
    <a href="{{ route('user') }}">
        <i class="fa fa-user-secret"></i>
        <span>Data User</span>
    </a>
</li>

<li>
    <a class="dropdown-item" href="{{ route('logout') }}"
        onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
        <i class="fa fa-sign-out text-danger"></i>{{__('Logout') }}
    </a>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>
</li>
