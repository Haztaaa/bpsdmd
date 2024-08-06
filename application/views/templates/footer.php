  <!-- Jquery JS-->
  <script src="<?= base_url('assets/') ?>vendor/jquery-3.2.1.min.js"></script>
  <!-- Bootstrap JS-->
  <script src="<?= base_url('assets/') ?>vendor/bootstrap-4.1/popper.min.js"></script>
  <script src="<?= base_url('assets/') ?>vendor/bootstrap-4.1/bootstrap.min.js"></script>
  <!-- Vendor JS       -->
  <script src="<?= base_url('assets/') ?>vendor/slick/slick.min.js">
  </script>
  <script src="<?= base_url('assets/') ?>vendor/wow/wow.min.js"></script>
  <script src="<?= base_url('assets/') ?>vendor/animsition/animsition.min.js"></script>
  <script src="<?= base_url('assets/') ?>vendor/bootstrap-progressbar/bootstrap-progressbar.min.js">
  </script>
  <script src="<?= base_url('assets/') ?>vendor/counter-up/jquery.waypoints.min.js"></script>
  <script src="<?= base_url('assets/') ?>vendor/counter-up/jquery.counterup.min.js">
  </script>
  <script src="<?= base_url('assets/') ?>vendor/circle-progress/circle-progress.min.js"></script>
  <script src="<?= base_url('assets/') ?>vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
  <script src="<?= base_url('assets/') ?>vendor/chartjs/Chart.bundle.min.js"></script>
  <script src="<?= base_url('assets/') ?>vendor/select2/select2.min.js"></script>

  <!-- Main JS-->
  <script src="<?= base_url('assets/') ?>js/main.js"></script>
  <script src="<?= base_url() ?>assets/vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="<?= base_url() ?>assets/vendor/datatables/dataTables.bootstrap4.min.js"></script>
  <script src="<?= base_url('assets') ?>/jsqr/dist/jsQR.js"></script>
  <script src="<?= base_url('assets')?>/vendor/apexcharts/apexcharts.min.js"></script>




  <script>
      $(document).ready(function() {
          $('#dataTable').DataTable({
              "language": {

                  "decimal": "",
                  "emptyTable": "Tidak Ada Data Yang Ditemukan",
                  "info": "Menampilkan _START_ ke _END_ dari _TOTAL_ data",
                  "infoEmpty": "Menampilkan 0 to 0 of 0 Data",
                  "infoFiltered": "(Di Filter Dari _MAX_ total data)",
                  "infoPostFix": "",
                  "thousands": ",",
                  "lengthMenu": "Menampilkan _MENU_ Data ",
                  "loadingRecords": "Mohon Tunggu...",
                  "processing": "Memproses...",
                  "search": 'Cari <span class="fa fa-search"></span>',
                  "zeroRecords": "Data Tidak Ditemukan",
                  "paginate": {
                      "first": "Awal",
                      "last": "Akhir",
                      "next": "Selanjutnya",
                      "previous": "Sebelumnya"
                  },
                  "aria": {
                      "sortAscending": ": activate to sort column ascending",
                      "sortDescending": ": activate to sort column descending"
                  }

              }
          });
      });
  </script>
  <script>
      function updateNotifications() {
          $.ajax({
              url: "<?php echo base_url('notifikasi/getLimitedNotifications'); ?>",
              type: "GET",
              dataType: "json",
              success: function(data) {
                  var notifications = data;
                  var count = notifications.length;

                  // Kosongkan daftar notifikasi sebelum menambahkan yang baru
                  $("#notification-list").empty();
                  for (var i = 0; i < count; i++) {
                      var notification = notifications[i];
                      var notificationItem = '<div class="notifi__item" data-id="' + notification.id + '">' +
                          '<div class="bg-c1 img-cir img-40">' +
                          '<i class="zmdi zmdi-email-open"></i>' +
                          '</div>' +
                          '<div class="content">' +
                          '<p>' + notification.message + '</p>' +
                          '<span class="date">' + notification.date_created + '</span>' +
                          '<br><button class="btn-sm btn-danger hapus">Hapus </button>' + // Tombol "Hapus"
                          '</div>' +
                          '</div>';
                      $("#notification-list").append(notificationItem);
                  }
              }
          });
      }

      function updateNotificationCount() {
          $.ajax({
              url: "<?php echo base_url('notifikasi/getTotalNotificationCount'); ?>",
              type: "GET",
              dataType: "json",
              success: function(totalCount) {
                  $("#notification-count").text(totalCount); // Menampilkan jumlah total notifikasi
                  $("#qty").text(totalCount); // Menampilkan jumlah total notifikasi pada notif count
              }
          });
      }

      function removeNotification(notificationId) {
          var $notificationItem = $(this).closest(".notifi__item");

          $.ajax({
              url: "<?php echo base_url('notifikasi/removeNotification'); ?>",
              type: "POST",
              data: {
                  id: notificationId
              },
              success: function(response) {
                  if (response === "success") {
                      // Hapus notifikasi dari daftar
                      $notificationItem.remove();

                      // Memuat notifikasi terbaru setelah penghapusan
                      updateNotifications();

                      // Memperbarui jumlah total notifikasi
                      updateNotificationCount();
                  }
              }
          });
      }
      $(document).ready(function() {
          // Panggil fungsi untuk memuat notifikasi saat halaman dimuat
          updateNotifications();
          updateNotificationCount();

          // Setel interval untuk polling dan pembaruan
          setInterval(function() {
              updateNotifications();
              updateNotificationCount();
          }, 5000); // Misalnya, polling setiap 5 detik (5000 milidetik)
      });
      $("#notification-list").on("click", ".hapus", function(event) {
          event.stopPropagation();
          var notificationId = $(this).closest(".notifi__item").data("id");
          removeNotification.call(this, notificationId);
      });
  </script>
  </body>

  </html>
  <!-- end document-->