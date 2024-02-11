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

<li class="{{ set_active('user') }}">
    <a href="{{ route('user') }}">
        <i class="fa fa-user-secret"></i>
        <span>Data User</span>
    </a>
</li>
