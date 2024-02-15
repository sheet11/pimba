@push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
    <script>
        $(document).on('submit','.form',function (event){
            event.preventDefault();
            $(".btnSubmit"). attr("disabled", true);
            $('.btnSubmit').html('<i class="fa fa-check-circle"></i>&nbsp; Menyimpan');  // Mengembalikan teks tombol
            $.ajax({
                url: $(this).attr('action'),
                type: $(this).attr('method'),
                typeData: "JSON",
                data: new FormData(this),
                processData:false,
                contentType:false,
                success : function(res) {
                    $("#btnSubmit"). attr("disabled", true);
                    toastr.success(res.text, 'Yeay, Berhasil');
                    setTimeout(function () {
                        window.location.href=res.url;
                    } , 500);
                },
                error:function(xhr){
                    setTimeout(function() {
                        $(".btnSubmit").prop('disabled', false);  // Mengaktifkan tombol kembali
                        $(".btnSubmit").html('<i class="fa fa-check-circle"></i>&nbsp; Simpan');  // Mengembalikan teks tombol
                    }, 500); // Waktu dalam milidetik (2000 ms = 2 detik)
                    toastr.error(xhr.responseJSON.text, 'Ooopps, Ada Kesalahan');
                }
            })
        });

        $(document).ready(function() {
            $('#table').DataTable({
                responsive : true,
            });
        } );

        $('.show_confirm').click(function(event) {
            var form =  $(this).closest("form");
            var name = $(this).data("name");
            event.preventDefault();
            swal({
                title: `Apakah Anda Yakin?`,
                text: "Harap untuk memeriksa kembali sebelum menghapus data.",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                form.submit();
                }
            });
        });

        function editBarang(id){
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            url = "{{ url('data_barang').'/' }}"+id+'/edit';
            $.ajax({
                url : url,
                type : 'GET',
                success : function(data){
                    $('#modalEdit').modal('show');
                    $('#barang_id_edit').val(data.id);
                    $('#nama_barang_edit').val(data.nama_barang);
                    $('#kategori_barang_edit').val(data.kategori_barang);
                    $('#kondisi_barang_edit').val(data.kondisi_barang);
                    $('#merk_barang_edit').val(data.merk_barang);
                    $('#jumlah_barang_edit').val(data.jumlah_barang);
                    $('#tambah_foto_edit').val(data.tambah_foto);
                   // $('#tambah_file_edit').val(data.tambah_file);
                },
                error:function(){
                    $('#gagal').show(100);
                }
            });
            return false;
        }
    </script>
@endpush
