<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>BPSDMD SULUT</title>
    <meta content="" name="description">
    <meta content="" name="keywords">
    <!-- Favicons -->
    <link href="<?= base_url('assets') ?>/img/prov.png" rel="icon">
    <link href="<?= base_url('assets/login') ?>/img/apple-touch-icon.png" rel="apple-touch-icon">
    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
    <!-- Vendor CSS Files -->
    <link href="<?= base_url('assets/login') ?>/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= base_url('assets/login') ?>/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="<?= base_url('assets/login') ?>/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="<?= base_url('assets/login') ?>/vendor/quill/quill.snow.css" rel="stylesheet">
    <link href="<?= base_url('assets/login') ?>/vendor/quill/quill.bubble.css" rel="stylesheet">
    <link href="<?= base_url('assets/login') ?>/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="<?= base_url('assets/login') ?>/vendor/simple-datatables/style.css" rel="stylesheet">
    <!-- Template Main CSS File -->
    <link href="<?= base_url('assets/login') ?>/css/style.css" rel="stylesheet">

</head>

<body>

    <main>
        <div class="container">

            <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-6 col-md-8 d-flex flex-column align-items-center justify-content-center"> <!-- Adjusted column width -->
                            <img src="<?= base_url('assets/') ?>img/prov.png" alt="">

                            <div class="d-flex justify-content-center py-4">
                                <a href="<?= base_url('landing') ?>" class="logo d-flex align-items-center w-auto">
                                    <span class="d-none d-lg-block" style="color: #DC3545; font-size:100px;">SI-CEKATAN</span>

                                </a>
                            </div>
                            <span style="font-family: Verdana, Geneva, Tahoma, sans-serif; font-size:30px;">Aplikasi Cek Sertifikat Pelatihan</span>
                            <span style="font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif; font-size:30px;">BPSDMD PROVINSI SULAWESI UTARA</span>
                            <div class="card mb-3">
                                <div class="card-body">

                                    <div class="pt-4 pb-2">
                                        <h5 class="card-title text-center pb-0 fs-4" style="color: #DC3545;">Masuk Dengan Akun Anda</h5>
                                        <p class="text-center small">Silahkan masuk untuk melanjutkan</p>
                                    </div>
                                    <?= $this->session->flashdata('message'); ?>
                                    <form action="<?= base_url('auth') ?>" method="post" class="row g-3 needs-validation" novalidate>

                                        <div class="col-12">
                                            <label for="yourUsername" class="form-label">Username</label>
                                            <div class="input-group has-validation">
                                                <span class="input-group-text" id="inputGroupPrepend"><i class="ri-account-circle-line"></i></span>
                                                <input type="text" name="username" class="form-control form-control-lg" id="yourUsername" required>
                                                <div class="invalid-feedback">Username Tidak Boleh Kosong</div>
                                                <?= form_error('username', '<small class="text-danger pl-3">', '</small>'); ?>
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <label for="yourPassword" class="form-label">Password</label>
                                            <div class="input-group has-validation">
                                                <span class="input-group-text" id="inputGroupPrepend"><i class="ri-lock-2-line"></i></span>
                                                <input type="password" name="password" class="form-control form-control-lg" id="yourpassword" required>
                                                <div class="invalid-feedback">Password Tidak Boleh Kosong</div>
                                                <?= form_error('password', '<small class="text-danger pl-3">', '</small>'); ?>
                                            </div>
                                        </div>

                                        <div class="col-12 mt-3">
                                            <label for="captcha" class="form-label">Verifikasi CAPTCHA</label>
                                            <div class="captcha-container d-flex align-items-center">
                                                <?php if (isset($captcha['image'])) : ?>
                                                    <div class="captcha-image me-3">
                                                        <?php echo $captcha['image']; ?>
                                                    </div>
                                                <?php else : ?>
                                                    <p>Error loading captcha.</p>
                                                <?php endif; ?>
                                                <input type="text" name="captcha" class="form-control form-control-lg" id="captcha" placeholder="Masukkan CAPTCHA" required>
                                            </div>
                                            <div class="invalid-feedback">Captcha Tidak Boleh Kosong</div>
                                        </div>

                                        <div class="col-12">
                                            <button class="btn btn-danger btn-lg w-100 mt-3" type="submit">Login</button>
                                        </div>

                                    </form>

                                </div>
                            </div>

                            <!-- CSS tambahan untuk memperbaiki tampilan captcha -->
                            <style>
                                .captcha-container {
                                    background-color: #f8f9fa;
                                    border: 1px solid #ced4da;
                                    border-radius: 5px;
                                    padding: 10px;
                                }

                                .captcha-image img {
                                    max-height: 60px;
                                    /* Membatasi tinggi gambar */
                                    border-radius: 3px;
                                }
                            </style>


                            <div class="credits">
                                BPSDMD SULUT
                            </div>

                        </div>
                    </div>
                </div>
            </section>


        </div>
    </main><!-- End #main -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->

    <script src="<?= base_url('assets/login') ?>/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <script src="<?= base_url('assets/login') ?>/vendor/quill/quill.min.js"></script>
    <script src="<?= base_url('assets/login') ?>/vendor/simple-datatables/simple-datatables.js"></script>
    <script src="<?= base_url('assets/login') ?>/vendor/tinymce/tinymce.min.js"></script>
    <script src="<?= base_url('assets/login') ?>/vendor/php-email-form/validate.js"></script>

    <!-- Template Main JS File -->
    <script src="<?= base_url('assets/login') ?>/js/main.js"></script>

</body>

</html>