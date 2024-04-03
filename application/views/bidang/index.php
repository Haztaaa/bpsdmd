<!-- MAIN CONTENT-->
<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">

        </div>

        <?= $this->session->flashdata('message'); ?>
        <div class="col-lg-12">
            <div class="au-card m-b-30">
                <div class="au-card-inner">
                    <h3 class="title-2 m-b-40">Bidang</h3>
                    <a href="<?= base_url('bidang/add') ?>" class="btn btn-primary">Tambah Bidang</a>

                    <br>
                    <br>


                    <div class="card-body">
                        <div class="table-responsive">
                            <div class="table-responsive">
                                <table class="table table-borderless table-data2" id="dataTable">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Bidang</th>
                                            <th>Jenis Pelatihan</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 1; ?>
                                        <?php foreach ($bidang as $b) : ?>
                                            <tr>
                                                <td><?= $i ?></td>
                                                <td><?= $b['nama_bidang'] ?></td>
                                                <td><a href="" onclick="detailJenis('<?php echo $b['id_bidang'] ?>')" class="btn btn-primary" data-toggle="modal" data-target="#jenisModal">Lihat</a></td>
                                                <td>
                                                    <a href="<?= base_url('bidang/edit/') . $b['id_bidang'] ?>" class="btn btn-warning "><i class="fas fa-edit"></i> | UBAH </a>
                                                    <a href="" onclick="hapus('<?php echo $b['id_bidang']; ?>')" class="btn btn-danger " data-toggle="modal" data-target="#hapus"><i class="fas fa-trash"></i> | HAPUS</a>
                                                </td> <!-- Anda perlu mengisi dengan aksi yang sesuai -->
                                            </tr>
                                            <?php $i++; ?>
                                        <?php endforeach; ?>
                                    </tbody>

                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <?php
        date_default_timezone_set('Asia/Makassar');
        $tahun = date('Y');
        ?>
        <div class="row">
            <div class="col-md-12">
                <div class="copyright">

                </div>
            </div>
        </div>
    </div>
</div>
</div>
<!-- END MAIN CONTENT-->
<!-- END PAGE CONTAINER-->
</div>

</div>
<script>
    function hapus(id) {
        //Ajax Load data from ajax
        $.ajax({
            url: "<?php echo site_url('/bidang/get') ?>/" + id,
            type: "GET",
            dataType: "JSON",
            success: function(data) {

                $('[name="hapus"]').val(data.id_bidang);

                $('#hapus').modal('show'); // show bootstrap modal when complete loaded
            },
            error: function(jqXHR, textStatus, errorThrown) {
                alert('Error get data from ajax');
            }
        });
    }

    function detailJenis(id) {
        $.ajax({
            url: "<?php echo site_url('/bidang/get_pelatihan') ?>/" + id,
            type: "GET",
            dataType: "JSON",
            success: function(data) {
                console.log(data);
                $('#jenisModal tbody').empty();

                // Loop melalui setiap objek dalam data dan tambahkan ke dalam tabel
                $.each(data, function(index, item) {
                    $('#jenisModal tbody').append(
                        '<tr>' +
                        '<td>' + (index + 1) + '</td>' +
                        '<td>' + item.pelatihan + '</td>' + // Ganti item.nama_pelatihan dengan nama atribut yang sesuai dalam objek data Anda
                        '<td><a href="<?= base_url('sertifikat/detailPelatihan/') ?>' + item.id_jenis + '" class="btn btn-success">Lihat Data</a></td>',

                        '</tr>'
                    );
                });
            },
            error: function() {
                alert('Terjadi Kesalahan Mengambil Data')
            }
        });
    }
</script>
<div class="">
    <!-- Modal -->
    <div class="modal fade" id="hapus" tabindex="-1" role="dialog" aria-labelledby="hapusLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="hapusLabel">Notifikasi</h5>
                    <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </a>
                </div>
                <div class="modal-body">
                    <span class="badge badge-danger">Perhatian!</span>
                    <p>Data Yang Dipilih Akan Dihapus!
                    </p>
                    <form action="<?= base_url('bidang/delete') ?>" method="POST">
                        <input type="hidden" name="hapus">
                </div>
                <div class="modal-footer">
                    <a href="#" class="btn btn-secondary" data-dismiss="modal">Batal</a>
                    <button class="btn btn-primary" type="submit">Hapus</button>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="jenisModal" tabindex="-1" role="dialog" aria-labelledby="jenisModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="jenisModalLabel">Data Jenis Pelatihan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Jenis Pelatihan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>

                        </tr>
                    </tbody>

                </table>
            </div>
        </div>
    </div>
</div>