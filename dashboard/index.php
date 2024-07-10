<!DOCTYPE html>

<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default" data-assets-path="../assets/" data-template="vertical-menu-template-free">

<?php
require_once('head.php');
?>

<body>
  <!-- Layout wrapper -->
  <div class="layout-wrapper layout-content-navbar">
    <div class="layout-container">
      <!-- Menu -->

      <?php
      require_once('aside.php');
      ?>
      <!-- / Menu -->

      <!-- Layout container -->
      <div class="layout-page">
        <!-- Navbar -->

        <?php
        require_once('nav.php');
        ?>

        <!-- / Navbar -->

        <!-- Content wrapper -->
        <div class="content-wrapper">
          <div class="container-xxl flex-grow-1 container-p-y">
            <div class="row mb-5">
              <?php
              require_once '../connection.php';
              $stmt = $conn->prepare("SELECT * FROM edonat ORDER BY id DESC");
              $stmt->execute();
              $result = $stmt->fetchAll();

              $displayedImages = [];

              foreach ($result as $t1) {
                if (!in_array($t1['img_name'], $displayedImages)) {
                  $displayedImages[] = $t1['img_name'];
                  $imageURL = "../upload" . $t1['img_file'];
              ?>
                  <div class="col-md-6 col-lg-4 mb-3">
                    <div class="card h-100">
                      <img class="card-img-top" src="../upload/<?= $t1['img_file']; ?>" alt="Card image cap" />
                      <div class="card-body">
                        <h5 class="card-title"><?= $t1['img_name']; ?></h5>
                        <p class="card-text">
                          <?= $t1['optionsedo']; ?>
                        </p>
                        <a href="data.php?img_name=<?= $t1['img_name']; ?>" class="btn btn-outline-primary">เลือก</a>
                      </div>
                    </div>
                  </div>
              <?php
                }
              }
              ?>
            </div>
          </div>

          <div class="content-backdrop fade"></div>
        </div>
        <!-- Content wrapper -->
      </div>
      <!-- / Layout page -->
    </div>
    <div class="layout-overlay layout-menu-toggle"></div>
  </div>

  <!-- build:js assets/vendor/js/core.js -->
  <script src="assets/vendor/libs/jquery/jquery.js"></script>
  <script src="assets/vendor/libs/popper/popper.js"></script>
  <script src="assets/vendor/js/bootstrap.js"></script>
  <script src="assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>

  <script src="assets/vendor/js/menu.js"></script>
  <!-- endbuild -->

  <!-- Vendors JS -->
  <script src="assets/vendor/libs/apex-charts/apexcharts.js"></script>

  <!-- Main JS -->
  <script src="assets/js/main.js"></script>

  <!-- Page JS -->
  <script src="assets/js/dashboards-analytics.js"></script>

  <!-- Place this tag in your head or just before your close body tag. -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
</body>

</html>