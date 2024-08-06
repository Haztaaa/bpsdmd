<!-- MAIN CONTENT-->
<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">

            <div class="card">
                <div class="card-header">
                    <strong>Tambah</strong> Data Pengguna
                </div>
                <div class="card-body card-block">
                    <form action="<?= base_url('users/add')  ?>" method="post" class="form-horizontal">
                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="nama" class="form-control-label">Nama</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <input type="text" id="nama" name="nama" placeholder="Masukkan Nama" class="form-control">
                                <?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="username" class="form-control-label">Username</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <input type="text" id="username" name="username" placeholder="Masukkan username" class="form-control">
                                <?= form_error('username', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="password1" class="form-control-label">Massukan Password</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <input type="password" id="password1" name="password1" placeholder="Masukkan password" class="form-control">
                                <?= form_error('password1', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="password2" class="form-control-label">Konfirmasi Password</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <input type="password" id="password2" name="password2" placeholder="Masukkan kembali password" class="form-control">
                                <?= form_error('password2', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="jabatan" class="form-control-label">Pilih Jabatan</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <select id="jabatan" name="jabatan" class="form-control">
                                    <option value="" hidden selected disabled>Pilih Jabatan</option>
                                    <option value="2">Manajerial</option>
                                    <option value="3">PKTI</option>
                                    <option value="4">PKTUF</option>
                                    <option value="5">CS</option>
                                </select>
                                <?= form_error('jabatan', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                        </div>
                </div>

                <div class=" card-footer">
                    <button type="submit" class="btn btn-primary btn-sm">
                        <i class="fa fa-plus"></i> Tambah
                    </button>
                    </form>
                    <a href="<?= base_url('users') ?>" class="btn btn-danger btn-sm"> <i class="fa  fa-arrow-left"></i> Kembali</a>
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