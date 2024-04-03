<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">

            <div class="card">
                <div class="card-header">
                    Upload File Excel
                </div>
                <?php echo form_open_multipart('sertifikat/import', 'id="myForm"'); ?>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <label class="col-form-label text-md-left" style="color: red;">Upload File</label>
                                    <input type="file" class="form-control" name="document_file" accept=".xls, .xlsx" required>
                                    <br>
                                    <div class="mt-1">
                                        <span class="text-secondary">File yang harus diupload : .xls, xlsx</span>
                                    </div>
                                    <div>
                                        <h3>Pastikan Kolom di excel sesuai</h3>
                                        <h3 style="color: red;">NO, NOMOR SERTIFIKAT, JENIS PELATIHAN, TAHUN, NAMA LENGKAP, NIP, TTL, JENIS KELAMIN, NO HP, PANGKAT, JABATAN, INSTANSI</h3>
                                        <img src="<?= base_url('assets/') ?>img/excel.png" alt="">
                                        <br>
                                        <br>
                                        <img src="<?= base_url('assets/') ?>img/fixed.png" alt="">
                                        <br>
                                        <br>
                                        <h4 style="color: black;">Untuk Kolom <b style="color: red;">Jenis Pelatihan</b> Nanti Di isi Angka Sesuai penjelasan yang ada</h4>
                                        <img src="<?= base_url('assets/') ?>img/jenis.png" alt="">
                                    </div>
                                    <?= form_error('file', '<div class="text-danger">', '</div>') ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer text-right">
                    <div class="form-group mb-0">
                        <button type="submit" name="import" class="btn btn-primary"><i class="fas fa-upload mr-1"></i>Upload</button>
                        <a href="<?= base_url('sertifikat') ?>" class="btn btn-danger btn-sm"> <i class="fa  fa-arrow-left"></i> Kembali</a>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>