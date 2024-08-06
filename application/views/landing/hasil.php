<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <link href="https://fonts.googleapis.com/css?family=Montserrat:100,200,300,400,500,600,700,800,900" rel="stylesheet" />

    <title>SI-CEKATAN | BPSDMD PROVINSI SULUT</title>
    <link href="<?= base_url('assets') ?>/img/prov.png" rel="icon">
    <!-- Bootstrap core CSS -->
    <link href="<?= base_url('assets') ?>/landing/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" />

    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="<?= base_url('assets/') ?>landing/css/fontawesome.css" />
    <link rel="stylesheet" href="<?= base_url('assets/') ?>landing/css/templatemo-grad-school.css" />
    <link rel="stylesheet" href="<?= base_url('assets/') ?>landing/css/owl.css" />
    <link rel="stylesheet" href="<?= base_url('assets/') ?>landing/css/lightbox.css" />
    <!--
    
TemplateMo 557 Grad School

https://templatemo.com/tm-557-grad-school

-->
</head>

<body>
    <!--header-->
    <header class="main-header clearfix" role="header">
        <div class="logo">
            <a href="#">SI-CEKATAN</a>
        </div>

        <nav class="main-nav">
            <ul class="main-menu">
                <li><a href="<?= base_url('landing') ?>">Kembali</a></li>
            </ul>
        </nav>
    </header>


    <section class="section coming-soon" data-section="section3">
        <div class="container">
            <div class="card" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title">NIP: <?= $query ?></h5>
                    <h6 class="card-subtitle mb-2 text-muted">Berikut Merupakan hasil pencarian dari sertifikat yang ada </h6>

                </div>
            </div>
            <br>
            <?php if ($dat) : ?>
                <?php foreach ($dat as $d) : ?>
                    <div class="card">
                        <div class="card-header">
                            <b>SERTIFIKAT PELATIHAN</b> : <?= $d['pelatihan'] ?>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">NAMA : <?= $d['nama_lengkap'] ?></h5>
                            <p class="card-text">NIP :<?= $d['nip'] ?></p>

                            <?php if (!empty($d['sertifikat'])) : ?>
                                <a href="<?= base_url('assets/uploads/' . $d['sertifikat']) ?>" class="btn btn-success" download>UNDUH</a>
                            <?php else : ?>
                                <button class="btn btn-warning" disabled>Belum Ada</button>
                            <?php endif; ?>
                        </div>
                    </div>
                    <br>
                <?php endforeach; ?>
            <?php else : ?>
                <div class="card">
                    <div class="card-header">
                        SERTIFIKAT PELATIHAN :
                    </div>
                    <div class="card-body">
                        <span class="badge badge-danger">Maaf, Data Tidak Ditemukan</span>
                        <br>
                        <br>
                        <br>
                        <a href="<?= base_url('landing') ?>" class="btn btn-danger">Kembali</a>
                    </div>
                </div>
            <?php endif; ?>




        </div>
    </section>

    <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <p>
                        <i class="fa fa-copyright"></i> BADAN PENGEMBANGAN SUMBER DAYA MANUSIA DAERAH

                    </p>
                </div>
            </div>
        </div>
    </footer>

    <!-- Scripts -->
    <!-- Bootstrap core JavaScript -->
    <script src="<?= base_url('assets/') ?>landing/vendor/jquery/jquery.min.js"></script>
    <script src="<?= base_url('assets/') ?>landing/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <script src="<?= base_url('assets/') ?>landing/js/isotope.min.js"></script>
    <script src="<?= base_url('assets/') ?>landing/js/owl-carousel.js"></script>
    <script src="<?= base_url('assets/') ?>landing/js/lightbox.js"></script>
    <script src="<?= base_url('assets/') ?>landing/js/tabs.js"></script>
    <script src="<?= base_url('assets/') ?>landing/js/video.js"></script>
    <script src="<?= base_url('assets/') ?>landing/js/slick-slider.js"></script>
    <script src="<?= base_url('assets/') ?>landing/js/custom.js"></script>
    <script>
        //according to loftblog tut
        $(".nav li:first").addClass("active");

        var showSection = function showSection(section, isAnimate) {
            var direction = section.replace(/#/, ""),
                reqSection = $(".section").filter(
                    '[data-section="' + direction + '"]'
                ),
                reqSectionPos = reqSection.offset().top - 0;

            if (isAnimate) {
                $("body, html").animate({
                        scrollTop: reqSectionPos,
                    },
                    800
                );
            } else {
                $("body, html").scrollTop(reqSectionPos);
            }
        };

        var checkSection = function checkSection() {
            $(".section").each(function() {
                var $this = $(this),
                    topEdge = $this.offset().top - 80,
                    bottomEdge = topEdge + $this.height(),
                    wScroll = $(window).scrollTop();
                if (topEdge < wScroll && bottomEdge > wScroll) {
                    var currentId = $this.data("section"),
                        reqLink = $("a").filter("[href*=\\#" + currentId + "]");
                    reqLink
                        .closest("li")
                        .addClass("active")
                        .siblings()
                        .removeClass("active");
                }
            });
        };

        $(".scroll-to-section").on("click", "a", function(e) {
            if ($(e.target).hasClass("external")) {
                return;
            }
            e.preventDefault();
            $("#menu").removeClass("active");
            showSection($(this).attr("href"), true);
        });

        $(window).scroll(function() {
            checkSection();
        });
    </script>
</body>

</html>