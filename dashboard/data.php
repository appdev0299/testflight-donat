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
                        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"></span></h4>
                        <div class="card py-3 mb-4">
                            <div class="card-body">
                                <div class="table-responsive text-nowrap">
                                    <?php
                                    require_once '../connection.php';

                                    if (isset($_GET['img_name'])) {
                                        $img_name = $_GET['img_name'];
                                        $stmt = $conn->prepare("SELECT * FROM edonat WHERE img_name = :img_name");
                                        $stmt->bindParam(':img_name', $img_name, PDO::PARAM_STR);
                                        $stmt->execute();
                                        $row = $stmt->fetch(PDO::FETCH_ASSOC);

                                        if ($row) {
                                    ?>
                                            <img class="card-img-top" src="../upload/<?= $row['img_file']; ?>" style="width: 50%;" />
                                    <?php
                                        } else {
                                            echo "ไม่พบข้อมูลที่ค้นหา";
                                        }
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <div class="table-responsive text-nowrap">
                                    <table id="myTable" class="table table-bordered">
                                        <?php
                                        require_once '../connection.php';

                                        if (isset($_GET['img_name'])) {
                                            $img_name = $_GET['img_name'];
                                            $stmt = $conn->prepare("SELECT * FROM edonat WHERE img_name = :img_name");
                                            $stmt->bindParam(':img_name', $img_name, PDO::PARAM_STR);
                                            $stmt->execute();
                                            $rows = $stmt->fetchAll(PDO::FETCH_ASSOC); // ดึงข้อมูลทั้งหมดที่มี img_name ตรงกัน

                                            if ($rows) {
                                        ?>
                                                <thead>
                                                    <tr>
                                                        <th>ลำดับ</th>
                                                        <th>เลขอ้างอิง</th>
                                                        <th>ชื่อ-สกุล</th>
                                                        <th>เลขบัตรประชาชน</th>
                                                        <th>โทรศัพท์</th>
                                                        <th>ที่อยู่</th>
                                                        <th>โครงการ</th>
                                                        <th>จำนวนเงิน</th>
                                                        <th>หมายเหตุ</th>
                                                        <th>วันที่</th>
                                                    </tr>
                                                </thead>
                                                <tbody class="table-border-bottom-0">
                                                    <?php
                                                    $index = 1; // กำหนดค่าตัวแปรนับเริ่มต้น
                                                    foreach ($rows as $row) { ?>
                                                        <tr>
                                                            <td><?= $index; ?></td> <!-- แสดงลำดับ -->
                                                            <td><?= $row['img_name']; ?></td>
                                                            <td><?= $row['fullname']; ?></td>
                                                            <td><?= $row['idname']; ?></td>
                                                            <td><?= $row['phone']; ?></td>
                                                            <td><?= $row['address']; ?></td>
                                                            <td><?= $row['optionsedo']; ?></td>
                                                            <td><?= $row['amount']; ?></td>
                                                            <td><?= $row['note']; ?></td>
                                                            <td><?= $row['upload_date']; ?></td>
                                                        </tr>
                                                    <?php
                                                        $index++; // เพิ่มค่าตัวแปรนับในแต่ละลูป
                                                    } ?>
                                                </tbody>
                                        <?php
                                            } else {
                                                echo "ไม่พบข้อมูลที่ค้นหา";
                                            }
                                        }
                                        ?>
                                    </table>
                                </div>
                            </div>
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