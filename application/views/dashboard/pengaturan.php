<!-- MAIN CONTENT-->
<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">

            <div class="row">
                <div class="col-md-4">

                    <div class="au-card">
                        <div class="box-body box-profile">

                            <h2 class="profile-username text-center">Data Akun Anda</h2>
                            <hr>
                            <h3 class="profile-username text-center">Nama Akun: <?= $user['nama'] ?></h3>
                            <p class="text-muted text-center">Username Akun: <?= $user['username'] ?></p>
                            <br>
                            <br>
                            <a href="<?= base_url('dashboard/username') ?>" class="btn btn-danger btn-block"><b>Ganti Username</b></a>
                            <a href="<?= base_url('dashboard/password') ?>" class="btn btn-danger btn-block"><b>Ganti Password</b></a>
                        </div>

                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="card">
                        <div class="card-header">Ubah Data Diri</div>
                        <div class="card-body">
                            <div class="card-title">
                                <h3 class="text-center title-2"> <?= $this->session->flashdata('message'); ?></h3>
                            </div>
                            <hr>
                            <form action="<?= base_url('dashboard/pengaturan') ?>" method="post">
                                <input type="hidden" name="id_user" id="" value="<?= $user['id_user'] ?>">

                                <div class="form-group">
                                    <label for="" class="control-label mb-1">Nama </label>
                                    <input id="" name="nama" type="text" class="form-control" aria-required="true" aria-invalid="false" value="<?= $user['nama'] ?>">
                                    <?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>





                                <div>
                                    <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">
                                        <i class="fa fa-lock fa-lg"></i>&nbsp;
                                        <span id="payment-button-amount">Ubah Data</span>

                                    </button>
                                    <a href="<?= base_url('dashboard') ?>" class="btn btn-lg btn-danger btn-block"> <i class="fa fa-arrow-left fa-lg"></i>&nbsp;
                                        <span id="payment-button-amount">Kembali</span></a>
                                </div>
                            </form>
                        </div>
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