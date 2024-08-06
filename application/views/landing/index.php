<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta name="description" content="" />
  <meta name="author" content="" />
  <link href="https://fonts.googleapis.com/css?family=Montserrat:100,200,300,400,500,600,700,800,900" rel="stylesheet" />
  <title>SI-CEKATAN | BPSDMD</title>
  <link href="<?= base_url('assets') ?>/img/prov.png" rel="icon">
  <!-- Bootstrap core CSS -->
  <link href="<?= base_url('assets') ?>/landing/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
  <!-- Additional CSS Files -->
  <link rel="stylesheet" href="<?= base_url('assets/') ?>landing/css/fontawesome.css" />
  <link rel="stylesheet" href="<?= base_url('assets/') ?>landing/css/templatemo-grad-school.css" />
  <link rel="stylesheet" href="<?= base_url('assets/') ?>landing/css/owl.css" />
  <link rel="stylesheet" href="<?= base_url('assets/') ?>landing/css/lightbox.css" />
</head>

<body>

  <header class="main-header clearfix" role="header">
    <div class="logo">
      <a href="#"><em>Grad</em> School</a>
    </div>
    <a href="#menu" class="menu-link"><i class="fa fa-bars"></i></a>
    <nav id="menu" class="main-nav" role="navigation">
      <ul class="main-menu">
        <ul class="main-menu">
          <li><a href="<?= base_url('jenis') ?>">Login</a></li>
        </ul>
    </nav>
  </header>
  <section class="section main-banner" id="top" data-section="section1">
    <video autoplay muted loop id="bg-video">
      <source src="<?= base_url('assets') ?>/landing/images/course-video.mp4" type="video/mp4" />
    </video>
    <div class="video-overlay header-text">
      <div class="caption">
        <h6>Badan Pengembangan Sumber Daya Manusia</h6>
        <h2><b style="color: red;">SI-</b>CEKATAN</h2>
        <div class="main-button">
          <div class="scroll-to-section">
            <a href="#section2">CARI SERTIFIKAT</a>
          </div>
        </div>
      </div>
    </div>
  </section>
  <section class="section video" data-section="section2">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="search-content">
            <span style="color: white;">Sertifikat Pelatihan BPSDMD Provinsi Sulawesi Utara</span>
            <h4 style="color: white;">Silahkan Masukan NIP</h4>
            <form class="search-bar" action="<?= base_url('landing/search') ?>" method="get">
              <input type="text" name="q" onkeydown="return hanyaAngka(event)" placeholder="Ketik Untuk Mencari..." required>
              <button type="submit" class="main-button">Cari</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
  <section class="section contact" data-section="section6">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="section-heading">
            <h2>BPSDMD PROVINSI SULUT</h2>
          </div>
        </div>
        <div class="col-md-12">
          <style>
            .map-container {
              position: relative;
              width: 100%;
              padding-top: 56.25%;
              /* Aspect ratio 16:9 */
            }

            .map-container iframe {
              position: absolute;
              top: 0;
              left: 0;
              width: 100%;
              height: 100%;
            }
          </style>

          <div class="map-container">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1994.247312027062!2d124.91353000216674!3d1.4759350748135973!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x32870b44bb055be3%3A0xc45e5e321f2674b9!2sBADAN%20PENGEMBANGAN%20SUMBER%20DAYA%20MANUSIA%20DAERAH%20PROV.%20SULUT!5e0!3m2!1sen!2sid!4v1721119864694!5m2!1sen!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
            </iframe>
          </div>

        </div>
      </div>
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
    function hanyaAngka(evt) {
      var charCode = (evt.which) ? evt.which : event.keyCode
      if (charCode > 31 && (charCode < 48 || charCode > 57))
        return false;
      return true;
    }
  </script>
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