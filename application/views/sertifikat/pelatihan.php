<!-- MAIN CONTENT-->
<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">

        </div>

        <?= $this->session->flashdata('message'); ?>
        <div class="col-lg-12">
            <div class="au-card m-b-30">
                <div class="au-card-inner">
                    <h3 class="title-2 m-b-40">Sertifikat</h3>



                    <div class="card-body">
                        <div class="table-responsive">
                            <div class="table-responsive">
                                <table class="table table-borderless table-data2" id="dataTable">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>NO Sertifikat</th>
                                            <th>Jenis Pelatihan</th>
                                            <th>Tahun Pelatihan</th>
                                            <th>Nama Lengkap</th>
                                            <th>Nip</th>
                                            <th>Tempat Tanggal Lahir</th>
                                            <th>Pangkat</th>
                                            <th>Jabatan</th>
                                            <th>Nama Instansi</th>
                                            <th>Pas Foto</th>
                                            <th>Sertifikat</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php $i = 1; ?>
                                        <?php foreach ($filtered as $s) : ?>
                                            <tr>
                                                <td><?= $i ?></td>
                                                <td><?= $s['no_sertifikat'] ?></td>
                                                <td><?= $s['pelatihan'] ?></td>
                                                <td><?= $s['tahun_pelatihan'] ?></td>
                                                <td><?= $s['nama_lengkap'] ?></td>
                                                <td><?= $s['nip'] ?></td>
                                                <td><?= $s['ttl'] ?></td>
                                                <td><?= $s['pangkat'] ?></td>
                                                <td><?= $s['jabatan'] ?></td>
                                                <td><?= $s['nama_instansi'] ?></td>
                                                <td>
                                                    <img src="<?= base_url('assets/img/pasfoto/') . $s['pas_foto'] ?>" style="width: 150px; height:150px;">
                                                </td>
                                                <td><a href="#" data-toggle="modal" data-target="#pdfModal">Lihat PDF</a></td>
                                                <td>
                                                    <a href="<?= base_url('sertifikat/edit/') . $s['id_data'] ?>" class="btn btn-warning mb-2"><i class="fas fa-edit"></i></a>
                                                    <a href="<?= base_url('sertifikat/detail/') . $s['id_data'] ?>" class="btn btn-secondary mb-2"><i class="fas fa-archive"></i></a>
                                                    <a href="" class="btn btn-success"><i class="fas fa-download"></i></a>
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