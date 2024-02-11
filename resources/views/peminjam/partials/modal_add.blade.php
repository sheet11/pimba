<div class="modal fade" id="modalTambah">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ route('peminjam.store') }}" method="POST" class="form">
                {{ csrf_field() }} {{ method_field('POST') }}
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                    <p style="font-weight: bold"><i class="fa fa-plus"></i>&nbsp;Form Tambah Peminjam</p>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="form-group col-md-12">
                            <label for="exampleInputEmail1">Nama Peminjam</label>
                            <input type="text" class="form-control" id="nama_peminjam" name="nama_peminjam">
                        </div>
                        <div class="form-group col-md-12">
                            <label for="exampleInputEmail1">Unit Peminjam</label>
                            <input type="text" class="form-control" id="unit_peminjaman" name="unit_peminjaman">
                        </div>
                        <div class="form-group col-md-12">
                            <label for="exampleInputEmail1">Tanggal Peminjaman</label>
                            <input type="date" class="form-control" id="tanggal_peminjaman" name="tanggal_peminjaman">
                        </div>
                        {{--  <div class="form-group col-md-12">
                            <label for="exampleInputEmail1">Tanggal Pengembalian</label>
                            <input type="date" class="form-control" id="tanggal_pengembalian" name="tanggal_pengembalian">
                        </div>  --}}
                        <div class="form-group col-md-12">
                            <label for="exampleInputEmail1">Lama Minjam (Hari)</label>
                            <input type="text" class="form-control" id="lama_minjam" name="lama_minjam">
                        </div>
                        <div class="form-group col-md-12">
                            <label for="exampleInputEmail1">Status Minjam</label>
                            <select name="status_minjam" class="form-control" id="status_minjam">
                                <option value="masih_dipinjam">Masih Dipinjam</option>
                                <option value="sudah_dikembalikan">Sudah Dikembalikan</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-danger btn-sm btn-flat " data-dismiss="modal"><i class="fa fa-close"></i>&nbsp;Batalkan</button>
                <button type="submit" class="btn btn-primary btn-sm btn-flat btnSubmit"><i class="fa fa-check-circle"></i>&nbsp;Simpan</button>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
 {{--  date untuk tanggal, text untuk tulisan,value untuk pilihan  --}}
