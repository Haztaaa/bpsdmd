<style>
    .card-img-top {
        width: 4in;
        height: 6in;
        object-fit: cover;
        /* Mengisi area gambar tanpa merubah aspek rasio */
    }
</style>
<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">

                            <img src="<?= base_url('assets/uploads/pasfoto/') . $val['pas_foto'] ?>" class="card-img-top" alt="Pasfoto">
                        </div>
                        <div class="col-md-8">
                            <!-- Data Diri -->
                            <h5 class="card-title">Data Diri</h5>
                            <ul class="list-group">
                                <li class="list-group-item">NO Sertifikat: <?= $val['no_sertifikat'] ?></li>
                                <li class="list-group-item">Jenis Pelatihan: <?= $val['pelatihan'] ?></li>
                                <li class="list-group-item">Tahun Pelatihan: <?= $val['tahun_pelatihan'] ?></li>
                                <li class="list-group-item">Nama Lengkap: <?= $val['nama_lengkap'] ?></li>
                                <li class="list-group-item">NIP: <?= $val['nip'] ?></li>
                                <li class="list-group-item">Tempat Tanggal Lahir: <?= $val['ttl'] ?></li>
                                <li class="list-group-item">Pangkat: <?= $val['pangkat'] ?></li>
                                <li class="list-group-item">Jabatan: <?= $val['jabatan'] ?></li>
                                <li class="list-group-item">Nama Instansi: <?= $val['nama_instansi'] ?></li>

                                <!-- Tambahkan data diri lainnya sesuai kebutuhan -->
                            </ul>
                        </div>
                    </div>
                </div>
                <div class=" card-footer">

                    <a href="<?= base_url('sertifikat') ?>" class="btn btn-danger btn-sm"> <i class="fa  fa-arrow-left"></i> Kembali</a>

                </div>
            </div>
        </div>
    </div>
</div>