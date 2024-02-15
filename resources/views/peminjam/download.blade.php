<style>
    td{
        font-family:Verdana, Geneva, Tahoma, sans-serif;
    }

    *{
        font-size: 12px !important;
    }



    #table {
        border-collapse: collapse;
        width: 100%;
    }

    #table td, #table th {
        border: 1px solid #ddd;
        padding: 8px;
    }

    #table th {
        padding-top: 12px;
        padding-bottom: 12px;
        text-align: left;
        color: black;
    }
</style>

<table style="width: 100%" id="table">
    <thead>
        <tr>
            <th style="vertical-align:middle">No</th>
            <th style="vertical-align:middle">Nama Peminjam</th>
            <th style="vertical-align:middle">Barang</th>
            <th style="vertical-align:middle">Unit Peminjam</th>
            <th style="vertical-align:middle">Tanggal Peminjam</th>
            <th style="vertical-align:middle">Tanggal Pengembalian</th>
            <th style="vertical-align:middle">Lama Minjam</th>
            <th style="vertical-align:middle">Status Minjam</th>
        </tr>
    </thead>
    <tbody>
        @php
            $no=1;
        @endphp
        @foreach ($peminjams as $peminjam)
            <tr>
                <td>{{ $no+1 }}</td>
                <td>{{ $peminjam->nama_peminjam }}</td>
                <td>{{ $peminjam->barang->nama_barang }}</td>
                <td>{{ $peminjam->unit_peminjaman }}</td>
                <td>{{ $peminjam->tanggal_peminjaman }}</td>
                <td>
                    @if ($peminjam->tanggal_pengembalian == null)
                        <small class="label label-danger">belum dikembalikan</small>
                    @else
                        {{ $peminjam->tanggal_pengembalian }}
                    @endif
                </td>
                <td>{{ $peminjam->lama_minjam }}</td>
                <td>{{ $peminjam->status_minjam }}</td>
            </tr>
        @endforeach
    </tbody>
</table>

<table style="width: 100%; padding-top:30px !important;">
    <tr>
        <td style="width: 60%"></td>
        <td style="text-align: center">Bengkulu, {{ $tanggal['hari'].' '.$tanggal['bulan'].' '.$tanggal['tahun'] }} </td>
    </tr>
    <tr>
        <td style="width: 60%"></td>
        <td style="text-align: center">Yang Bertanggung Jawab,</td>
    </tr>
    <tr>
        <td style="padding: 50px 0px 50px 0px"></td>
        <td></td>
    </tr>
    <tr>
        <td style="width: 60%"></td>
        <td style="text-align: center">{{ Auth::user()->name }} </td>
    </tr>
</table>
