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

  </body>

  </html>
  <!-- end document-->