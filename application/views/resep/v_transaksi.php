<div class="content-wrapper" style="min-height: 1537.56px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">

        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <!-- Default box -->
                    <div class="card">
                        <div class="card-header" style="background-color: aqua">
                            <h3 class="card-title">Semua Transaksi</h3>

                            <div class="card-tools">
                                <button type="submit" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                    <i class="fas fa-minus"></i></button>
                            </div>
                        </div>

                        <div class="card-body" style="background-color: #212529; color: white;">
                            <div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?>"></div>
                            <!-- end row -->
                            <div class="form-group ml-3 mr-10">
                                <table id="tabel_id" class="table table-bordered">
                                    <thead>
                                        <tr>

                                            <th scope="col">No faktur</th>
                                            <th scope="col">Total Harga</th>
                                            <th scope="col">Di Bayar</th>
                                            <th scope="col">Kembalian</th>
                                            <th scope="col">Karyawan</th>
                                            <th scope="col">Tanggal Transaksi</th>
                                            <th scope="col">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody id="target">

                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- /.card-body -->

                        <!-- /.card-footer-->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </div>
    </section>
    <!-- /.content -->
</div>

<!-- modal -->


<div class="modal fade bd-example-modal-xl" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="exampleModalLabel">Tambah Data Dokter</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?>"></div>
                <form action="<?= base_url('resep/update') ?>" method="post">
                    <div class="form-group">
                        <input type="hidden" class="form-control" name="karyawan" id="karyawan" value="Fikri">
                    </div>
                    <div class="form-group">
                        <label for="no_faktur">No Faktur</label>
                        <input type="text" class="form-control" name="no_faktur" id="no_faktur" readonly="">
                    </div>
                    <div class="form-group">
                        <label for="total_harga">total harga</label>
                        <input type="text" class="form-control" id="total_harga" name="total_harga">
                    </div>
                    <div class="form-group">
                        <label for="dibayar">Dibayar</label>
                        <input type="text" class="form-control" id="dibayar" name="dibayar">
                    </div>
                    <div class="form-group">
                        <label for="kembalian">Kembalian</label>
                        <input type="text" class="form-control" id="kembalian" name="kembalian">
                    </div>



                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Bayar</button>

                </form>

            </div>

        </div>
    </div>
</div>

<script>
    $(function() {
        $('#btntambah').click(function() {

            var kd_dokter = $("[name='kd_dokter']").val();
            var kd_pasien = $("[name='kd_pasien']").val();


            $.ajax({
                type: 'POST',
                data: 'kd_dokter=' + kd_dokter +
                    '&kd_pasien=' + kd_pasien,
                url: '<?= base_url() . "resep/tambah" ?>',
                dataType: 'json',
                success: function(hasil) {
                    if (hasil.pesan == '') {

                        Swal.fire({
                            title: 'Data Poli ',
                            text: 'Berhasil ditambah',
                            type: 'success'
                        });

                    }
                }
            });
        });

        $("select").select2();

    });

    getTabel();

    function getTabel() {
        $.ajax({
            type: 'POST',
            url: '<?= base_url() . "resep/getDatas" ?>',
            dataType: 'json',
            success: function(data) {
                console.log(data);
                let baris = '';
                for (var i = 0; i < data.resep.length; i++) {
                    let dibayar = checkData(data.resep[i].dibayar);
                    let kembalian = checkData(data.resep[i].kembalian);
                    let karyawan = checkData(data.resep[i].pelayan);
                    let status = checkPembayaran(data.resep[i].kembalian, data.resep[i].no_faktur)
                    baris += `<tr>
                            <td>` + data.resep[i].no_faktur + `</td>
                            <td>` + data.resep[i].total_harga + `</td>
                            <td>` + dibayar + `</td>
                            <td>` + kembalian + `</td>
                            <td>` + karyawan + `</td>
                            <td>` + data.resep[i].created_at + `</td>
                            <td>` + status + `</td>
                          </tr>`;
                }
                $('#target').html(baris);

            }
        });
    }

    function checkData(n) {
        let data;
        if (n == 0 || n == '') {
            data = `<span class="badge badge-danger">unpaid</span>`
        } else {
            data = n;
        }
        return data;
    }

    function checkPembayaran(j, n) {
        let data;
        if (j == 0) {
            data = `<button onclick="submit('` + n + `')" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-xl"><i class="fa fa-edit"></i></button>`;
        } else {
            data = `<a href="<?= base_url() ?>listpasien/Detail/` + n + `" class="btn btn-warning tombol-hapus"><i class="fa fa-eye"></i></a>`;
        }
        return data;

    }

    function submit(kd) {
        console.log(kd);
        $.ajax({
            type: 'POST',
            data: 'no_faktur=' + kd,
            url: '<?= base_url() . "resep/edit" ?>',
            dataType: 'json',
            success: function(hasil) {
                console.log(hasil);
                $("[name='no_faktur']").val(hasil[0].no_faktur);
                $("[name='total_harga']").val(hasil[0].total_harga);
                $("[name='dibayar']").val(hasil[0].dibayar);
                $("[name='kembalian']").val(hasil[0].kembalian);

            }
        });

    }

    function getTotal() {
        let harga = $("#total_harga").val();
        let dibayar = $("#dibayar").val();
        let total = dibayar - harga;
        $('#kembalian').val(total);
    }
    $('#dibayar').on('input', function() {
        getTotal();
    });

    const flashData = $('.flash-data').data('flashdata');
    if (flashData) {
        Swal.fire({
            title: 'Transaksi ',
            text: 'Berhasil ' + flashData,
            type: 'success'
        });
    }
</script>