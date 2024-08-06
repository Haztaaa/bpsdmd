<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header">
                    Upload File Pas Foto Dari: <b><?= $var['nama_lengkap'] ?></b>
                </div>
                <?php echo form_open_multipart('sertifikatmain/upload_pasfoto', 'id="myForm"'); ?>
                <input type="hidden" name="id" value="<?= $val ?>">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <label class="col-form-label text-md-left">Upload Pas Foto</label>
                                    <input type="file" class="form-control" name="pas_foto" accept=".jpg, .jpeg, .png" required title="Tidak Boleh Kosong">
                                    <div class="mt-1">
                                        <span class="text-secondary">File yang harus diupload : .jpg, .jpeg, .png </span>
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
                        <a href="<?= base_url('sertifikatmain') ?>" class="btn btn-danger btn-sm"> <i class="fa  fa-arrow-left"></i> Kembali</a>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>