<!-- MAIN CONTENT-->
<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <a href="<?= base_url('dashboard') ?>" class="btn btn-outline-danger mb-2"><i class="fa  fa-arrow-left"></i>&nbsp;Kembali</a>

            <div class="card border border-secondary" style="overflow-x:auto;">
                <div class="card-header">

                    <div class="row">
                        <div class="col-lg-4">
                            <strong class="card-title">Semua Notifikasi</strong>
                        </div>
                        <div class="col-lg-8">
                            <?= $this->session->flashdata('message'); ?>
                            </section>
                        </div>

                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-borderless table-data2" id="dataTable">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Judul</th>
                                    <th>Pesan</th>

                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($notif as $k) : ?>
                                    <tr>
                                        <td><?= $i ?></td>
                                        <td><?= $k['title'] ?></td>
                                        <td><?= $k['message'] ?></td>

                                        <td>


                                            <a href="" onclick="hapus('<?php echo $k['id']; ?>')" class="btn btn-danger mb-2" data-toggle="modal" data-target="#hapus"><i class="fas fa-trash"></i></a>
                                        </td>
                                    </tr>
                                    <?php $i++; ?>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
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
            url: "<?php echo site_url('/notifikasi/get') ?>/" + id,
            type: "GET",
            dataType: "JSON",
            success: function(data) {
                $('[name="hapus"]').val(data.id);

                $('#hapus').modal('show'); // show bootstrap modal when complete loaded
            },
            error: function(jqXHR, textStatus, errorThrown) {
                alert('Error get data from ajax');
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
                    <form action="<?= base_url('notifikasi/hapus') ?>" method="POST">
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