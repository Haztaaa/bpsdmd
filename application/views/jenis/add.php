<!-- MAIN CONTENT-->
<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header">
                    <strong>Tambah</strong> Data Bidang
                </div>
                <div class="card-body card-block">
                    <form action="<?= base_url('jenis/add')  ?>" method="post" class="form-horizontal">
                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="bidang" class="form-control-label">Nama Bidang</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <select name="bidang" id="" class="form-control select">
                                    <option value="" hidden selected disabled>Pilih Nama Bidang</option>
                                    <?php foreach ($bidang as $b) : ?>
                                        <option value="<?= $b['id_bidang'] ?>"><?= $b['nama_bidang'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="jenis_pelatihan" class="form-control-label">Jenis Pelatihan</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <input type="text" id="jenis_pelatihan" name="jenis_pelatihan" placeholder="Masukkan Jenis Pelatihan" class="form-control">
                                <?= form_error('jenis_pelatihan', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                        </div>
                </div>
                <div class=" card-footer">
                    <button type="submit" class="btn btn-primary btn-sm">
                        <i class="fa fa-plus"></i> Tambah
                    </button>
                    </form>
                    <a href="<?= base_url('jenis') ?>" class="btn btn-danger btn-sm"> <i class="fa  fa-arrow-left"></i> Kembali</a>
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