<body>
    <div class="page-wrapper">
        <!-- HEADER MOBILE-->
        <header class="header-mobile d-block d-lg-none">
            <div class="header-mobile__bar">
                <div class="container-fluid">
                    <div class="header-mobile-inner">
                        <div class="logo">
                            <img src="<?= base_url('assets/img/prov.png') ?>" alt="" width="75px">
                            <span style="font-weight: bold; color:white;" class="ml-2">BPSDMD SULUT</span>
                        </div>
                        <button class="hamburger hamburger--slider" type="button">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                        </button>
                    </div>
                </div>
            </div>
            <nav class="navbar-mobile">
                <div class="container-fluid">
                    <ul class="navbar-mobile__list list-unstyled">
                        <li>
                            <a href="<?= base_url('dashboard') ?>">
                                <i class="fas fa-desktop"></i>Beranda</a>
                        </li>

                    </ul>
                </div>
            </nav>
        </header>
        <!-- END HEADER MOBILE-->

        <!-- MENU SIDEBAR-->
        <aside class="menu-sidebar d-none d-lg-block">
            <div class="logo">
                <img src="<?= base_url('assets/img/prov.png') ?>" alt="" width="75px">
                <span style="font-weight: bold; color:white;" class="ml-2">BPSDMD SULUT</span>
            </div>
            <div class="menu-sidebar__content js-scrollbar1">
                <nav class="navbar-sidebar">
                    <ul class="list-unstyled navbar__list">
                        <li>
                            <a href="<?= base_url('dashboard') ?>">
                                <i class="fas fa-desktop"></i>Beranda</a>
                        </li>
                        <li>
                            <a href="<?= base_url('bidang') ?>">
                                <i class="fas fa-user"></i>Bidang</a>
                        </li>
                        <li>
                            <a href="<?= base_url('jenis') ?>">
                                <i class="fas fa-table"></i>Jenis Pelatihan</a>
                        </li>
                        <li>
                            <a href="<?= base_url('sertifikat') ?>">
                                <i class="fas fa-file"></i>Semua Sertifikat</a>
                        </li>



                    </ul>
                </nav>
            </div>
        </aside>
        <!-- END MENU SIDEBAR-->
        <title>Text Movement</title>
        <style>
            @keyframes moveLeftToRight {
                0% {
                    transform: translateX(0%);
                }

                100% {
                    transform: translateX(80%);
                }
            }


            .moving-text {
                position: relative;
                animation: moveLeftToRight 10s linear infinite;
                animation-delay: 2s
            }
        </style>
        <!-- PAGE CONTAINER-->
        <div class="page-container">
            <!-- HEADER DESKTOP-->
            <header class="header-desktop">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="header-wrap">
                            <form class="form-header" action="" method="POST">
                                <span style="color: white; font-size:25px;" class="moving-text">APLIKA<b style="color: yellow; font-size:28px;">SI</b> <b style="color: yellow; font-size:28px;">CEK</b> SERTIFIK<b style="color: yellow; font-size:28px;">AT</b> PELATIH<b style="color: yellow; font-size:28px;">AN</b>
                                    <b style="color: yellow; margin-left:10px; font-size:28px;"> (SI CEKATAN)</b>
                                </span>

                            </form>
                            <div class="header-button">
                                <div class="noti-wrap">
                                    <div class="noti__item js-item-menu">

                                        <span class="quantity"></span>
                                        <div class="">

                                        </div>
                                    </div>
                                    <div class="noti__item js-item-menu">

                                        <span class="quantity"></span>
                                        <div class="">
                                        </div>
                                    </div>
                                    <div class="noti__item js-item-menu">

                                        <span class="quantity"></span>
                                        <div class="">
                                        </div>
                                    </div>

                                    <div class="noti__item js-item-menu">
                                        <i class="zmdi zmdi-notifications"></i>
                                        <span class="quantity" id="qty">0</span>
                                        <div class="notifi-dropdown js-dropdown">
                                            <div class="notifi__title">
                                                <p>Anda Memiliki Total <span id="notification-count">0</span> Notifikasi</p>
                                            </div>
                                            <div id="notification-list">
                                                <!-- Notifikasi akan ditampilkan di sini -->
                                            </div>
                                            <div class="notifi__footer">
                                                <a href="<?= base_url('notifikasi') ?>">Lihat Semua Notifikasi</a>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="account-wrap">
                                    <div class="account-item clearfix js-item-menu">
                                        <div class="image">
                                            <img src="<?= base_url('assets/') ?>images/icon/profile.png" alt="John Doe" />
                                        </div>
                                        <div class="content">
                                            <a class="js-acc-btn" href="#">Admin</a>
                                        </div>
                                        <div class="account-dropdown js-dropdown">
                                            <div class="info clearfix">
                                                <div class="image">
                                                    <a href="#">
                                                        <img src="<?= base_url('assets/') ?>images/icon/profile.png" alt="John Doe" />
                                                    </a>
                                                </div>
                                                <div class="content">
                                                    <h5 class="name">
                                                        <a href="#">Admin</a>
                                                    </h5>
                                                    <span class="email">aa</span>
                                                </div>
                                            </div>
                                            <div class="account-dropdown__body">
                                                <!-- <div class="account-dropdown__item">
                                                    <a href="#">
                                                        <i class="zmdi zmdi-account"></i>Akun</a>
                                                </div> -->
                                                <div class="account-dropdown__item">
                                                    <a href="<?= base_url('dashboard/pengaturan') ?>">
                                                        <i class="zmdi zmdi-settings"></i>Pengaturan</a>
                                                </div>

                                            </div>
                                            <div class="account-dropdown__footer">
                                                <a href="<?= base_url('auth/logout') ?>">
                                                    <i class="zmdi zmdi-power"></i>Keluar</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
            <!-- HEADER DESKTOP-->