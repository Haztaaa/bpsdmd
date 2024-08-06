<!-- MAIN CONTENT-->
<style>
    .lebar-kolom {
        width: 200px;
        /* Sesuaikan dengan lebar yang diinginkan */
    }

    .draggable-table {
        overflow-x: auto;
        cursor: grab;
        user-select: none;
    }

    .draggable-table:active {
        cursor: grabbing;
    }
</style>
<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
        </div>
        <?= $this->session->flashdata('message'); ?>
        <div class="col-lg-12">
            <div class="au-card m-b-30">
                <div class="au-card-inner">
                    <h3 class="title-2 m-b-40">Sertifikat</h3>
                    <div class="row ">
                        <?php if ($this->session->userdata('level') != 5) : ?>
                            <div class="col-auto mb-2">
                                <a href="<?= base_url('sertifikatmain/add') ?>" class="btn btn-primary">Tambah Perserta</a>
                            </div>
                        <?php endif; ?>
                        <?php if ($this->session->userdata('level') != 5) : ?>
                            <div class="col-auto ">
                                <a href="<?= base_url('sertifikatmain/view_import') ?>" class="btn btn-success"><i class="fas fa-file-excel"></i> | Import </a>
                            </div>
                        <?php endif; ?>
                        <div class="col-auto"> <!-- Tambahkan kelas mt-2 di sini -->
                            <form action="<?= base_url('sertifikatmain/export') ?>" method="post">
                                <?php
                                $var = $this->input->get('jenis_pelatihan');
                                $var2 = $this->input->get('tahun_pelatihan');
                                $var3 = $this->input->get('bidang');
                                ?>
                                <input type="hidden" name="pelatihan" value="<?= $var ?>">
                                <input type="hidden" name="tahun" value="<?= $var2 ?>">
                                <input type="hidden" name="bidang" value="<?= $var3 ?>">
                                <button type="submit" class="btn btn-success"><i class="fas fa-file-excel"></i> | Export </button>
                            </form>
                        </div>
                    </div>
                    <br>
                    <br>
                    <form action="" method="GET">
                        <div class="row">
                            <?php if ($this->session->userdata('level') == 1 || $this->session->userdata('level') == 5) : ?>
                                <div class="col">
                                    <label for="bidang">Bidang</label>
                                    <select name="bidang" id="" class="form-control select">
                                        <option value="" hidden selected disabled>Pilih Bidang</option>
                                        <?php foreach ($bidang as $b) : ?>
                                            <option value="<?= $b['id_bidang'] ?>"><?= $b['nama_bidang'] ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            <?php endif; ?>
                            <div class="col">
                                <label for="jenis_pelatihan">Jenis Pelatihan</label>
                                <select name="jenis_pelatihan" id="" class="form-control select">
                                    <option value="" hidden selected disabled>Jenis Pelatihan</option>
                                    <?php foreach ($jenis_pelatihan as $jp) : ?>
                                        <option value="<?= $jp['id_jenis'] ?>"><?= $jp['pelatihan'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="col">
                                <label for="tahun_pelatihan">Tahun Pelatihan</label>
                                <select name="tahun_pelatihan" id="" class="form-control select">
                                    <option value="" hidden selected disabled>Tahun Pelatihan</option>
                                    <?php
                                    for ($tahun = 2020; $tahun <= 2030; $tahun++) {
                                        echo "<option value='$tahun'>$tahun</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="col">
                                <br>
                                <button class="btn btn-danger mt-2" type="submit">Filter</button>
                            </div>
                        </div>
                    </form>
                    <div class="card-body">
                        <div class="table-responsive">
                            <div class="table-responsive draggable-table" id="draggable-table">
                                <table class="table table-striped" id="dataTable">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>NO Sertifikat</th>
                                            <th>Jenis Pelatihan</th>
                                            <th>Tahun Pelatihan</th>
                                            <th>Nama Lengkap</th>
                                            <th>Nip</th>
                                            <th>Tempat Tanggal Lahir</th>
                                            <th>Jenis Kelamin</th>
                                            <th>No HP</th>
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
                                        <?php foreach ($serti as $s) : ?>
                                            <tr>
                                                <td><?= $i ?></td>
                                                <td style="color: black;"><?= $s['no_sertifikat'] ?></td>
                                                <td style="color: black;"><?= $s['pelatihan'] ?></td>
                                                <td style="color: black;"><?= $s['tahun_pelatihan'] ?></td>
                                                <td style="color: black;"><?= $s['nama_lengkap'] ?></td>
                                                <td style="color: black;"><?= $s['nip'] ?></td>
                                                <td style="color: black;"><?= $s['ttl'] ?></td>
                                                <td style="color: black;"><?= $s['jenis_kelamin'] ?></td>
                                                <td style="color: black;"><?= $s['no_hp'] ?></td>
                                                <td style="color: black;"><?= $s['pangkat'] ?></td>
                                                <td style="color: black;"><?= $s['jabatan'] ?></td>
                                                <td style="color: black;"><?= $s['nama_instansi'] ?></td>
                                                <td>
                                                    <?php if (!empty($s['pas_foto'])) : ?>
                                                        <img src="<?= base_url('assets/uploads/pasfoto/') . $s['pas_foto'] ?>" style="width: 150px; height: 150px;">
                                                    <?php else : ?>
                                                        <?php if ($this->session->userdata('level') != 5) : ?>
                                                            <a href="<?= base_url('sertifikatmain/view_pasfoto/') . $s['id_data'] ?>" class="btn btn-info mb-2"><i class="fas fa-plus"></i> PAS FOTO</a>
                                                        <?php else : ?>
                                                            Belum ada
                                                        <?php endif; ?>
                                                    <?php endif; ?>
                                                </td>

                                                <td>
                                                    <?php if (!empty($s['sertifikat'])) : ?>
                                                        <a href="<?= base_url('sertifikatmain/view_pdf/' . $s['sertifikat']); ?>" target="_blank">Lihat PDF</a>
                                                    <?php else : ?>
                                                        <?php if ($this->session->userdata('level') != 5) : ?>
                                                            <a href="<?= base_url('sertifikatmain/view_serti/') . $s['id_data'] ?>" class="btn btn-info mb-2"><i class="fas fa-plus"></i> SERTIFIKAT</a>
                                                        <?php else : ?>
                                                            Belum ada
                                                        <?php endif; ?>
                                                    <?php endif; ?>
                                                </td>

                                                <td>
                                                    <?php if ($this->session->userdata('level') != 5) : ?>
                                                        <a href="<?= base_url('sertifikatmain/edit/') . $s['id_data'] ?>" class="btn btn-warning mb-2"><i class="fas fa-edit"></i> | UBAH</a>
                                                    <?php endif; ?>
                                                    <a href="<?= base_url('sertifikatmain/detail/') . $s['id_data'] ?>" class="btn btn-secondary mb-2"><i class="fas fa-archive"></i> | DETAIL </a>
                                                    <?php if (!empty($s['sertifikat'])) : ?>
                                                        <a href="<?= base_url('assets/uploads/' . $s['sertifikat']) ?>" class="btn btn-success" download><i class="fas fa-download"></i> | UNDUH</a>
                                                    <?php else : ?>
                                                        <span class="badge ">Tidak Bisa</span>
                                                    <?php endif; ?>

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
<script>
    var draggableTable = document.getElementById("draggable-table");
    var isDown = false;
    var startX;
    var scrollLeft;
    draggableTable.addEventListener("mousedown", function(e) {
        isDown = true;
        startX = e.pageX - draggableTable.offsetLeft;
        scrollLeft = draggableTable.scrollLeft;
    });
    draggableTable.addEventListener("mouseleave", function() {
        isDown = false;
    });
    draggableTable.addEventListener("mouseup", function() {
        isDown = false;
    });
    draggableTable.addEventListener("mousemove", function(e) {
        if (!isDown) return;
        e.preventDefault();
        var x = e.pageX - draggableTable.offsetLeft;
        var walk = (x - startX) * 3; // Sensitivitas geser, sesuaikan sesuai kebutuhan
        draggableTable.scrollLeft = scrollLeft - walk;
    });
</script>