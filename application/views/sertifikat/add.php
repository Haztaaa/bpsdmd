<!-- MAIN CONTENT-->
<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">

            <div class="card">
                <div class="card-header">
                    <strong>Tambah</strong> Data Sertifikat
                </div>
                <div class="card-body card-block">
                    <form action="<?= base_url('sertifikat/add')  ?>" method="post" class="form-horizontal">




                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="no_sertifikat" class="form-control-label">No Sertifikat</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <input type="text" id="no_sertifikat" name="no_sertifikat" placeholder="Masukkan no sertifikat" class="form-control">
                                <?= form_error('no_sertifikat', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="jenis" class="form-control-label">Jenis Pelatihan</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <select name="jenis" id="" class="form-control select" required>
                                    <option value="" hidden selected disabled>Jenis Pelatihan </option>
                                    <?php foreach ($jenis_pelatihan as $jp) : ?>
                                        <option value="<?= $jp['id_jenis'] ?>"><?= $jp['pelatihan'] ?></option>

                                    <?php endforeach; ?>


                                </select>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="tahun_pelatihan" class="form-control-label">Tahun Pelatihan</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <input type="text" id="tahun_pelatihan" name="tahun_pelatihan" placeholder="Masukkan Tahun Pelatihan" class="form-control">
                                <?= form_error('tahun_pelatihan', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                        </div>



                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="nama_lengkap" class="form-control-label">Nama Lengkap</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <input type="text" id="nama_lengkap" name="nama_lengkap" placeholder="Masukkan Nama Lengkap" class="form-control">
                                <?= form_error('nama_lengkap', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="nip" class="form-control-label">NIP</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <input type="text" id="nip" name="nip" placeholder="Masukkan NIP" class="form-control">
                                <?= form_error('nip', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="ttl" class="form-control-label">Tempat, Tgl Lahir</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <input type="text" id="ttl" name="ttl" placeholder="Masukkan Tempat Lahir" class="form-control">
                                <?= form_error('ttl', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                        </div>


                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="jenis_kelamin" class="form-control-label">Jenis Kelamin</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <select id="jenis_kelamin" name="jenis_kelamin" class="form-control">
                                    <option value="" hidden selected disabled>Pilih Jenis Kelamin</option>
                                    <option value="Laki-laki">Laki-laki</option>
                                    <option value="Perempuan">Perempuan</option>
                                </select>
                                <?= form_error('jenis_kelamin', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="no_hp" class="form-control-label">No HP</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <input type="text" id="no_hp" name="no_hp" placeholder="Masukkan No HP" class="form-control">
                                <?= form_error('no_hp', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="pangkat" class="form-control-label">Pangkat</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <input type="text" id="pangkat" name="pangkat" placeholder="Masukkan Pangkat" class="form-control">
                                <?= form_error('pangkat', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="jabatan" class="form-control-label">Jabatan</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <input type="text" id="jabatan" name="jabatan" placeholder="Masukkan Jabatan" class="form-control">
                                <?= form_error('jabatan', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="nama_instansi" class="form-control-label">Nama Instansi</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <input type="text" id="nama_instansi" name="nama_instansi" placeholder="Masukkan Nama Instansi" class="form-control">
                                <?= form_error('nama_instansi', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                        </div>


                </div>
                <div class=" card-footer">
                    <button type="submit" class="btn btn-primary btn-sm">
                        <i class="fa fa-plus"></i> Tambah
                    </button>
                    </form>
                    <a href="<?= base_url('sertifikat') ?>" class="btn btn-danger btn-sm"> <i class="fa  fa-arrow-left"></i> Kembali</a>

                </div>
            </div>


            <?php
            date_default_timezone_set('Asia/Makassar');
            $tahun = date('Y');
            ?>
            <div class="row">
                <div class="col-md-12">
                    <div class="copyright">
                        <p>Copyright © <?= $tahun ?> Dinas</p>
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