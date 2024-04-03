<!-- MAIN CONTENT-->
<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <?= $this->session->flashdata('message'); ?>
            <div class="card">
                <div class="card-header">
                    <strong>Tambah</strong> Data Sertifikat
                </div>
                <div class="card-body card-block">
                    <?php echo form_open_multipart('sertifikat/edit/' . $data['id_data'], 'id="myForm"'); ?>

                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="no_sertifikat" class="form-control-label">No Sertifikat</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <input type="text" id="no_sertifikat" name="no_sertifikat" placeholder="Masukkan no sertifikat" class="form-control" value="<?= $data['no_sertifikat'] ?>">
                            <?= form_error('no_sertifikat', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="jenis_pelatihan" class="form-control-label">Jenis Pelatihan</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <select name="jenis" id="" class="form-control select">
                                <option value="" hidden selected disabled>Jenis Pelatihan </option>
                                <?php foreach ($jenis_pelatihan as $jp) : ?>
                                    <option value="<?= $jp['id_jenis'] ?>"><?= $jp['pelatihan'] ?></option>
                                    <?php if ($data['id_jenis'] == $jp['id_jenis']) : ?>
                                        <option value="<?= $jp['id_jenis'] ?>" selected><?= $jp['pelatihan'] ?></option>
                                    <?php endif; ?>
                                <?php endforeach; ?>


                            </select>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="tahun_pelatihan" class="form-control-label">Tahun Pelatihan</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <input type="text" id="tahun_pelatihan" name="tahun_pelatihan" placeholder="Masukkan Tahun Pelatihan" class="form-control" value="<?= $data['tahun_pelatihan'] ?>">
                            <?= form_error('tahun_pelatihan', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                    </div>


                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="nama_lengkap" class="form-control-label">Nama Lengkap</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <input type="text" id="nama_lengkap" name="nama_lengkap" placeholder="Masukkan Nama Lengkap" class="form-control" value="<?= $data['nama_lengkap'] ?>">
                            <?= form_error('nama_lengkap', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="nip" class="form-control-label">NIP</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <input type="text" id="nip" name="nip" placeholder="Masukkan NIP" class="form-control" value="<?= $data['nip'] ?>">
                            <?= form_error('nip', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="ttl" class="form-control-label">Tempat Tanggal Lahir</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <input type="text" id="ttl" name="ttl" placeholder="Masukkan Tempat Tanggal Lahir" class="form-control" value="<?= $data['ttl'] ?>">
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
                            <input type="text" id="no_hp" name="no_hp" placeholder="Masukkan No WA" class="form-control" value="<?= $data['no_hp'] ?>">
                            <?= form_error('no_hp', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="pangkat" class="form-control-label">Pangkat</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <input type="text" id="pangkat" name="pangkat" placeholder="Masukkan Pangkat" class="form-control" value="<?= $data['pangkat'] ?>">
                            <?= form_error('pangkat', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="jabatan" class="form-control-label">Jabatan</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <input type="text" id="jabatan" name="jabatan" placeholder="Masukkan Jabatan" class="form-control" value="<?= $data['jabatan'] ?>">
                            <?= form_error('jabatan', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="nama_instansi" class="form-control-label">Nama Instansi</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <input type="text" id="nama_instansi" name="nama_instansi" placeholder="Masukkan Nama Instansi" class="form-control" value="<?= $data['nama_instansi'] ?>">
                            <?= form_error('nama_instansi', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                    </div>


                </div>
                <div class=" card-footer">
                    <button type="submit" class="btn btn-primary btn-sm">
                        <i class="fa fa-edit"></i> Ubah
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
                        <p>Copyright © <?= $tahun ?> BPSDMD</p>
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