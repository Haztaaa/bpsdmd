<!-- MAIN CONTENT-->
<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">

        </div>

        <?= $this->session->flashdata('message'); ?>
        <div class="col-lg-12">
            <div class="au-card m-b-30">
                <div class="au-card-inner">
                    <h3 class="title-2 m-b-40">Jenis Pelatihan</h3>
                    <a href="<?= base_url('jenis/add') ?>" class="btn btn-primary">Tambah Jenis Pelatihan</a>

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
                                        <?php foreach ($jenis as $s) : ?>
                                            <tr>
                                                <td><?= $i ?></td>
                                                <td><?= $s['nama_bidang'] ?></td>
                                                <td><?= $s['pelatihan'] ?></td>
                                                <td>
                                                    <a href="<?= base_url('jenis/edit/') . $s['id_jenis'] ?>" class="btn btn-warning"><i class="fas fa-edit"></i> | UBAH</a>

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