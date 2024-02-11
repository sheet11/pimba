<div class="modal fade" id="modalEdit">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ route('peminjam.update') }}" method="POST" class="form">
                {{ csrf_field() }} {{ method_field('PATCH') }}
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                    <p style="font-weight: bold"><i class="fa fa-plus"></i>&nbsp;Form Edit Peminjam</p>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <input type="hidden" name="peminjam_id" id="peminjam_id_edit">

                        <div class="form-group col-md-12">
                            <label for="exampleInputEmail1">Nama Peminjam</label>
                            <input type="text" class="form-control" id="nama_peminjam_edit" name="nama_peminjam">
                        </div>
                        <div class="form-group col-md-12">
                            <label for="exampleInputEmail1">Unit Peminjam</label>
                            <input type="text" class="form-control" id="unit_peminjaman_edit" name="unit_peminjaman">
                        </div>
                        <div class="form-group col-md-12">
                            <label for="exampleInputEmail1">Tanggal Peminjaman</label>
                            <input type="date" class="form-control" id="tanggal_peminjaman_edit" name="tanggal_peminjaman">
                        </div>
                        {{--  <div class="form-group col-md-12">
                            <label for="exampleInputEmail1">Tanggal Pengembalian</label>
                            <input type="date" class="form-control" id="tanggal_pengembalian_edit" name="tanggal_pengembalian">
                        </div>  --}}
                        <div class="form-group col-md-12">
                            <label for="exampleInputEmail1">Lama Minjam</label>
                            <input type="text" class="form-control" id="lama_minjam_edit" name="lama_minjam">
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
