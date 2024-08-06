<!-- MAIN CONTENT-->
<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">

        </div>

        <?= $this->session->flashdata('message'); ?>
        <div class="col-lg-12">
            <div class="au-card m-b-30">
                <div class="au-card-inner">
                    <h3 class="title-2 m-b-40">Data Pengguna Dari Aplikasi</h3>
                    <a href="<?= base_url('users/add') ?>" class="btn btn-primary">Tambah Pengguna</a>
                    <br>
                    <br>
                    <div class="card-body">
                        <div class="table-responsive">
                            <div class="table-responsive">
                                <table class="table table-borderless table-data2" id="dataTable">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>Username</th>
                                            <th>Level</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 1; ?>
                                        <?php foreach ($users as $us) : ?>
                                            <tr>
                                                <td><?= $i ?></td>
                                                <td><?= $us['nama'] ?></td>
                                                <td><?= $us['username'] ?></td>
                                                <td>
                                                    <?php if ($us['level'] == 1) : ?>
                                                        <span class="badge badge-success">Admin</span>
                                                    <?php elseif ($us['level'] == 2) : ?>
                                                        <span class="badge badge-success">Manajerial</span>
                                                    <?php elseif ($us['level'] == 3) : ?>
                                                        <span class="badge badge-success">PKTI</span>
                                                    <?php elseif ($us['level'] == 4) : ?>
                                                        <span class="badge badge-success">PKTUF</span>
                                                    <?php else : ?>
                                                        <span class="badge badge-info">CS</span>
                                                    <?php endif; ?>
                                                </td>
                                                <td>
                                                    <a href="<?= base_url('users/edit/') . $us['id_user'] ?>" class="btn btn-warning "><i class="fas fa-edit"></i> | UBAH </a>

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