<!-- MAIN CONTENT-->
<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">

            <div class="card">
                <div class="card-header">
                    <strong>Ubah</strong> Data Bidang
                </div>
                <div class="card-body card-block">
                    <form action="<?= base_url('bidang/edit/') . $val['id_bidang']  ?>" method="post" class="form-horizontal">
                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="nama_bidang" class="form-control-label">Nama Bidang</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <input type="text" id="nama_bidang" name="nama_bidang" placeholder="Masukkan Nama Bidang" class="form-control" value="<?= $val['nama_bidang'] ?>">
                                <?= form_error('nama_bidang', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                        </div>
                </div>
                <div class=" card-footer">
                    <button type="submit" class="btn btn-primary btn-sm">
                        <i class="fa fa-edit"></i> Ubah
                    </button>
                    </form>
                    <a href="<?= base_url('bidang') ?>" class="btn btn-danger btn-sm"> <i class="fa  fa-arrow-left"></i> Kembali</a>
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