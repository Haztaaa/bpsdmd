<!-- MAIN CONTENT-->
<style>
    .lebar-kolom {
        width: 200px;
        /* Sesuaikan dengan lebar yang diinginkan */
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
                        <div class="col-auto mb-2">
                            <a href="<?= base_url('sertifikat/add') ?>" class="btn btn-primary">Tambah Perserta</a>
                        </div>
                        <div class="col-auto ">
                            <a href="<?= base_url('sertifikat/view_import') ?>" class="btn btn-success"><i class="fas fa-file-excel"></i> | Import </a>
                        </div>
                        <div class="col-auto"> <!-- Tambahkan kelas mt-2 di sini -->
                            <form action="<?= base_url('sertifikat/export') ?>" method="post">
                                <?php
                                $var = $this->input->get('jenis_pelatihan');
                                $var2 = $this->input->get('tahun_pelatihan');
                                ?>
                                <input type="hidden" name="pelatihan" value="<?= $var ?>">
                                <input type="hidden" name="tahun" value="<?= $var2 ?>">
                                <button type="submit" class="btn btn-success"><i class="fas fa-file-excel"></i> | Export </button>
                            </form>
                        </div>
                    </div>



                    <br>
                    <br>
                    <form action="" method="GET">
                        <div class="row">

                            <div class="col">
                                <label for="tahun_pelatihan">Tahun Pelatihan</label>
                                <select name="tahun_pelatihan" id="" class="form-control select">
                                    <option value="" hidden selected disabled>Tahun Pelathian</option>
                                    <?php
                                    for ($tahun = 2020; $tahun <= 2030; $tahun++) {
                                        echo "<option value='$tahun'>$tahun</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="col">
                                <label for="jenis_pelatihan">Jenis Pelatihan</label>
                                <select name="jenis_pelatihan" id="" class="form-control select">
                                    <option value="" hidden selected disabled>Jenis Pelatihan </option>
                                    <?php foreach ($jenis_pelatihan as $jp) : ?>
                                        <option value="<?= $jp['id_jenis'] ?>"><?= $jp['pelatihan'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="col">
                                <label for="bidang">Bidang</label>
                                <select name="bidang" id="" class="form-control select">
                                    <option value="" hidden selected disabled>Pilih Bidang</option>
                                    <option value="PBJP LEVEL 1">Bidang Manajerial</option>
                                    <option value="PBJP LEVEL 2">Bidang PKTI</option>
                                    <option value="PBJP LEVEL 2">Bidang PKTUF</option>

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
                                                        <img src="<?= base_url('assets/uploads/pasfoto/') . $s['pas_foto'] ?>" style="width: 150x; height: 150px;">
                                                    <?php else : ?>
                                                        <a href="<?= base_url('sertifikat/view_pasfoto/') . $s['id_data'] ?>" class="btn btn-info mb-2"><i class="fas fa-plus"></i> PAS FOTO</a>
                                                    <?php endif; ?>
                                                </td>

                                                <td> <?php if (!empty($s['sertifikat'])) : ?>
                                                        <a href="<?= base_url('sertifikat/view_pdf/' . $s['sertifikat']); ?>" target="_blank">Lihat PDF</a>
                                                    <?php else : ?>
                                                        <a href="<?= base_url('sertifikat/view_serti/') . $s['id_data'] ?>" class="btn btn-info mb-2"><i class="fas fa-plus"></i> SERTIFIKAT</a>
                                                    <?php endif; ?>
                                                </td>
                                                <td>
                                                    <a href="<?= base_url('sertifikat/edit/') . $s['id_data'] ?>" class="btn btn-warning mb-2"><i class="fas fa-edit"></i> | UBAH</a>
                                                    <a href="<?= base_url('sertifikat/detail/') . $s['id_data'] ?>" class="btn btn-secondary mb-2"><i class="fas fa-archive"></i> | DETAIL </a>
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
    var urlParams = new URLSearchParams(window.location.search);

    // Mendapatkan nilai parameter dengan nama tertentu
    var value = urlParams.get('nama_parameter');

    // Contoh penggunaan
    console.log(value);
</script>
</div>
<div class="modal fade" id="pdfModal" tabindex="-1" role="dialog" aria-labelledby="pdfModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="pdfModalLabel">PDF Viewer</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <embed id="pdfViewer" src="" type="application/pdf" width="100%" height="500px" />
            </div>
        </div>
    </div>
</div>



<script>
    $(document).ready(function() {
        // Menangani klik pada tautan "Lihat PDF"
        $('.btn-view-pdf').on('click', function() {
            // Mendapatkan URL PDF dari atribut data
            var pdfUrl = $(this).data('sertifikat');

            // Memuat URL PDF ke dalam iframe dalam modal
            $('#pdfViewer').attr('src', pdfUrl);

            // Menampilkan modal
            $('#pdfModal').modal('show');

            // Mencegah tindakan default
            return false;
        });
    });
</script>
<!-- <script>
    $(document).ready(function() {
        $('#no_serti').select2({
            ajax: {
                url: "<?= base_url('sertifikat/getData') ?>",
                dataType: "json",
                type: "post",
                delay: 250,
                data: function(params) {
                    return {
                        search: params.term
                    }
                },
                processResults: function(data) {
                    var results = [];
                    $.each(data, function(index, item) {
                        results.push({
                            id: item.no_sertifikat,
                            text: item.no_sertifikat
                        });
                    });
                    return {
                        results: results
                    };
                },
                cache: true
            },
            placeholder: 'Ketik No Sertifikat',
            minimumInputLength: 3,
        });
    });
</script> -->