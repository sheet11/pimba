<div class="modal fade" id="modalEdit">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ route('barang.update') }}" method="POST" class="form" enctype="multipart/form-data">
                {{ csrf_field() }} {{ method_field('PATCH') }}
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                    <p style="font-weight: bold"><i class="fa fa-plus"></i>&nbsp;Form Edit Barang</p>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <input type="hidden" name="barang_id" id="barang_id_edit">

                        <div class="form-group col-md-12">
                            <label for="exampleInputEmail1">Nama Barang</label>
                            <input type="text" class="form-control" id="nama_barang_edit" name="nama_barang">
                        </div>
                        <div class="form-group col-md-12">
                            <label for="exampleInputEmail1">Kategori Barang</label>
                            <input type="text" class="form-control" id="kategori_barang_edit" name="kategori_barang">
                        </div>
                        <div class="form-group col-md-12">
                            <label for="exampleInputEmail1">Kondisi Barang</label>
                            <select name="kondisi_barang" class="form-control" id="kondisi_barang">
                                <option value="Bagus">Bagus</option>
                                <option value="Rusak">Rusak</option>
                            </select>
                        </div>
                        <div class="form-group col-md-12">
                            <label for="exampleInputEmail1">Merk Barang</label>
                            <input type="text" class="form-control" id="merk_barang_edit" name="merk_barang">
                        </div>
                        <div class="form-group col-md-12">
                            <label for="exampleInputEmail1">Jumlah Barang</label>
                            <input type="text" class="form-control" id="jumlah_barang_edit" name="jumlah_barang">
                        </div>
                        <div class="form-group col-md-12">
                            <label for="exampleInputEmail1">Tambah Foto</label>
                            <input type="file" class="form-control" id="tambah_foto_edit" name="tambah_foto">
                        </div>
                        {{--  <div class="form-group col-md-12">
                            <label for="exampleInputEmail1">Tambah File</label>
                            <input type="file" class="form-control" id="tambah_file_edit" name="tambah_file">
                        </div>  --}}
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
