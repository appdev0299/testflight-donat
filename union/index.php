<!doctype html>
<html lang="en">
<?php require_once('head.php'); ?>

<body id="section_1">

    <?php require_once('header.php');
    require_once('nav.php'); ?>
    <main>
        <section class="testimonial-section section-padding section-bg">
            <div class="container">
                <div class="row">
                    <div class="col-12 mx-auto">
                        <div id="testimonial-carousel" class="carousel carousel-fade slide" data-bs-ride="carousel">
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <div class="single-logo mt-3 wow fadeIn" data-wow-duration="1s" data-wow-delay="0.2s">
                                        <img src="../images/causes/logo-all.png" alt="brand" class="img-fluid" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>


        <section class="section-padding" id="section_2">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-12 text-center mb-4">
                        <h3>โครงการบริจาคของ สมาคมศิษย์เก่าพยาบาลศาสตร์</h3>
                    </div>
                    <?php
                    require_once 'connection.php';
                    $stmt = $conn->prepare("SELECT * FROM `union` ORDER BY id ASC");
                    $stmt->execute();
                    $result = $stmt->fetchAll();
                    foreach ($result as $t1) {
                        $imageURL = "images/causes" . $t1['img_file'];
                    ?>
                        <div class="col-lg-4 col-md-6 col-12 mb-4 mb-lg-5">
                            <div class="custom-block-wrap">
                                <img src="../images/causes/<?= $t1['img_file']; ?>" class="custom-block-image img-fluid" alt="">
                                <div class="custom-block">
                                    <a class="custom-btn btn" data-bs-toggle="modal" data-bs-target="#exampleModal" data-edo="<?= $t1['edo']; ?>" data-id="<?= $t1['id']; ?>" onclick="checkId(<?= $t1['id']; ?>)">บริจาค</a>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </section>
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">กรอกรายละเอียด บริจาคของ สมาคมศิษย์เก่าพยาบาลศาสตร์</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="dynamicForm" action="" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="edo" id="edoValue">
                            <div class="col-md-12 col-12 mb-3">
                                <input type="hidden" name="img_name" required class="form-control">
                            </div>
                            <div class="row">
                                <div class="row" id="inputContainer">
                                    <div class="col-md-6 col-12 mb-3">
                                        <input type="text" name="fullname[]" required class="form-control" placeholder="ชื่อ-สกุล">
                                    </div>
                                    <div class="col-md-6 col-12 mb-3">
                                        <input type="number" name="idname[]" class="form-control" placeholder="หมายเลขบัตรประชาชน">
                                    </div>
                                    <div class="col-md-6 col-12 mb-3">
                                        <input type="number" name="phone[]" class="form-control" placeholder="เบอร์โทรศัพท์">
                                    </div>
                                    <div class="col-md-6 col-12 mb-3">
                                        <input type="text" name="address[]" class="form-control" placeholder="ที่อยู่ปัจจุบัน">
                                    </div>
                                    <div class="col-md-10 col-12 mb-3">
                                        <input type="number" name="amount[]" required class="form-control" placeholder="จำนวนเงิน">
                                    </div>
                                    <div class="col-md-2 col-12 mb-3">
                                        <button id="addNameButton" type="button" class="btn btn-primary">เพิ่มชื่อ +</button>
                                    </div>
                                </div>

                            </div>
                            <div id="donationOptions" class="row" style="display: none;">
                                <div class="col-md-10 col-12 mb-3">
                                    <input class="form-check-input" type="radio" name="optionsedo" id="optionsedo1" value="ทุนสนับสนุนในการจัดกิจกรรมงานคืนสู่เหย้ำ" checked>
                                    <label class="form-check-label" for="optionsedo1">
                                        ทุนสนับสนุนในการจัดกิจกรรมงานคืนสู่เหย้ำ
                                    </label>
                                </div>
                                <div class="col-md-12 col-12 mb-3">
                                    <input class="form-check-input" type="radio" name="optionsedo" id="optionsedo2" value="ทุนสนับสนุนในการจัดตั้งสำนักงานของสมาคม">
                                    <label class="form-check-label" for="optionsedo2">
                                        ทุนสนับสนุนในการจัดตั้งสำนักงานของสมาคม
                                    </label>
                                </div>
                            </div>
                            <div class="row">
                                <hr>
                                <div class="col-md-12 col-12 mb-3">
                                    <label class="form-check-label" for="optionsedo1">
                                        แนบสลิปโอนเงิน
                                    </label>
                                    <input type="file" name="img_file" required class="form-control" accept="image/jpeg, image/png, image/jpg" id="imgFileInput">
                                    <small class="form-text text-danger">*อัพโหลดได้เฉพาะ .jpeg, .jpg, .png</small>
                                </div>
                            </div>
                            <div class="col-md-12 col-12 mb-3">
                                <input type="text" name="note" class="form-control" placeholder="หมายเหตุ">
                            </div>
                            <div class="row">
                                <div class="col-md-6 col-12 mb-3">
                                    <img id="preview" src="#" alt="Image Preview" style="display: none; max-width: 100%;">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ยกเลิก</button>
                                <button type="submit" class="btn btn-success">บันทึกข้อมูล</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <?php
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            require_once 'connection.php';
            $date1 = date("Ymd_His");
            $numrand = mt_rand();
            $img_file = isset($_POST['img_file']) ? $_POST['img_file'] : '';
            $upload = $_FILES['img_file']['name'];
            if ($upload != '') {
                $typefile = strrchr($_FILES['img_file']['name'], ".");
                if ($typefile == '.jpg' || $typefile == '.jpeg' || $typefile == '.png') {
                    $path = "../upload/";
                    $newname = $numrand . $date1 . $typefile;
                    $path_copy = $path . $newname;
                    move_uploaded_file($_FILES['img_file']['tmp_name'], $path_copy);

                    if (isset($_POST['fullname']) && isset($_POST['idname']) && !empty($_POST['fullname']) && !empty($_POST['amount']) && !empty($_POST['note']) && !empty($_POST['edo']) && !empty($_POST['optionsedo'])) {
                        $fullnames = $_POST['fullname'];
                        $idnames = $_POST['idname'];
                        $phones = $_POST['phone'];
                        $addresses = $_POST['address'];
                        $edo = $_POST['edo'];
                        $amounts = $_POST['amount']; // Changed variable name to avoid conflict
                        $optionsedo = $_POST['optionsedo'];
                        $note = $_POST['note'];
                        $success = true;

                        for ($i = 0; $i < count($fullnames); $i++) {
                            $img_name = $_POST['img_name'];
                            $fullname = $fullnames[$i];
                            $idname = $idnames[$i];
                            $phone = $phones[$i];
                            $address = $addresses[$i];
                            $amount = $amounts[$i]; // Changed variable name to avoid conflict
                            $stmt = $conn->prepare("INSERT INTO edonat (img_name, fullname, idname, phone, address, edo, optionsedo, img_file, amount, note) VALUES (:img_name, :fullname, :idname, :phone, :address, :edo, :optionsedo, :img_file, :amount, :note)");
                            $stmt->bindParam(':img_name', $img_name, PDO::PARAM_STR);
                            $stmt->bindParam(':fullname', $fullname, PDO::PARAM_STR);
                            $stmt->bindParam(':idname', $idname, PDO::PARAM_STR);
                            $stmt->bindParam(':phone', $phone, PDO::PARAM_STR);
                            $stmt->bindParam(':address', $address, PDO::PARAM_STR);
                            $stmt->bindParam(':edo', $edo, PDO::PARAM_STR);
                            $stmt->bindParam(':optionsedo', $optionsedo, PDO::PARAM_STR);
                            $stmt->bindParam(':img_file', $newname, PDO::PARAM_STR);
                            $stmt->bindParam(':amount', $amount, PDO::PARAM_STR);
                            $stmt->bindParam(':note', $note, PDO::PARAM_STR);
                            $result = $stmt->execute();

                            if (!$result) {
                                $success = false;
                                break;
                            }
                        }

                        if ($success) {
                            echo '
                    <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
                    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
                    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">
                    <script>
                    swal({
                        title: "บันทึกข้อมูลบริจาคสำเร็จ",
                        text: "กรุณารอสักครู่",
                        type: "success",
                        timer: 2000,
                        showConfirmButton: false
                    }, function(){
                        window.location.href = "index.php";
                    });
                    </script>';
                        } else {
                            echo '
                    <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
                    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
                    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">
                    <script>
                    swal({
                        title: "เกิดข้อผิดพลาด",
                        text: "เกิดข้อผิดพลาดในการอัพโหลด",
                        type: "error",
                        timer: 2000,
                        showConfirmButton: false
                    }, function(){
                        window.location.href = "index.php";
                    });
                    </script>';
                        }
                    }
                } else {
                    echo '
            <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">
            <script>
            swal({
                title: "คุณอัพโหลดไฟล์ไม่ถูกต้อง",
                text: "โปรดอัพโหลดไฟล์รูปภาพเฉพาะ .jpg, .jpeg, หรือ .png เท่านั้น",
                type: "error",
                timer: 2000,
                showConfirmButton: false
            }, function(){
                window.location.href = "index.php";
            });
            </script>';
                }
            }
            $conn = null;
        }
        ?>

    </main>
    <?php require_once('footer.php'); ?>
    <script src="js/main.js"></script>
    <style>
        .labeled-hr-container {
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
            margin: 20px 0;
        }

        .labeled-hr {
            flex: 1;
            border: none;
            border-top: 1px solid #000;
            margin: 0;
            position: absolute;
            width: 100%;
            left: 0;
        }

        .labeled-hr-text {
            background: #fff;
            padding: 0 10px;
            font-weight: bold;
            z-index: 1;
            position: relative;
        }
    </style>
    <script>
        document.addEventListener('DOMContentLoaded', (event) => {
            let inputCounter = 1;

            function addName() {
                const inputContainer = document.getElementById('inputContainer');

                // Create a container for the entire set of inputs
                const setContainer = document.createElement('div');
                setContainer.classList.add('set-container', 'row');

                // Create a div to hold the label and the HR
                const labeledHrDiv = document.createElement('div');
                labeledHrDiv.classList.add('labeled-hr-container', 'col-12');

                // Create a span for the label text
                const labelSpan = document.createElement('span');
                labelSpan.classList.add('labeled-hr-text');
                labelSpan.textContent = `รายชื่อที่ ${inputCounter}`;

                // Create an HR element to separate each set of inputs
                const hr = document.createElement('hr');
                hr.classList.add('labeled-hr');

                labeledHrDiv.appendChild(hr);
                labeledHrDiv.appendChild(labelSpan);

                // Create div for fullname input
                const newFullnameDiv = document.createElement('div');
                newFullnameDiv.classList.add('col-md-6', 'col-12', 'mb-3');
                const newFullnameInput = document.createElement('input');
                newFullnameInput.type = 'text';
                newFullnameInput.name = `fullname[]`; // Array name
                newFullnameInput.required = true;
                newFullnameInput.classList.add('form-control');
                newFullnameInput.placeholder = 'ชื่อ-สกุล';
                newFullnameDiv.appendChild(newFullnameInput);

                // Create div for ID input
                const newIDDiv = document.createElement('div');
                newIDDiv.classList.add('col-md-6', 'col-12', 'mb-3');
                const newIDInput = document.createElement('input');
                newIDInput.type = 'number';
                newIDInput.name = `idname[]`; // Array name
                newIDInput.classList.add('form-control');
                newIDInput.placeholder = 'หมายเลขบัตรประชาชน';
                newIDDiv.appendChild(newIDInput);

                // Create div for phone input
                const newphoneDiv = document.createElement('div');
                newphoneDiv.classList.add('col-md-6', 'col-12', 'mb-3');
                const newPhoneInput = document.createElement('input');
                newPhoneInput.type = 'number';
                newPhoneInput.name = `phone[]`; // Array name
                newPhoneInput.classList.add('form-control');
                newPhoneInput.placeholder = 'เบอร์โทรศัพท์';
                newphoneDiv.appendChild(newPhoneInput);

                // Create div for address input
                const newaddressDiv = document.createElement('div');
                newaddressDiv.classList.add('col-md-6', 'col-12', 'mb-3');
                const newaddressInput = document.createElement('input');
                newaddressInput.type = 'text';
                newaddressInput.name = `address[]`; // Array name
                newaddressInput.classList.add('form-control');
                newaddressInput.placeholder = 'ที่อยู่ปัจจุบัน';
                newaddressDiv.appendChild(newaddressInput);

                // Create div for amount input
                const newamountDiv = document.createElement('div');
                newamountDiv.classList.add('col-md-10', 'col-12', 'mb-3');
                const newamountInput = document.createElement('input');
                newamountInput.type = 'number';
                newamountInput.name = `amount[]`;
                newamountInput.classList.add('form-control');
                newamountInput.placeholder = 'จำนวนเงิน';
                newamountDiv.appendChild(newamountInput);


                // Create div for remove button
                const buttonDiv = document.createElement('div');
                buttonDiv.classList.add('col-md-2', 'col-12', 'mb-3');
                const removeButton = document.createElement('button');
                removeButton.type = 'button';
                removeButton.classList.add('btn', 'btn-danger');
                removeButton.textContent = 'ลบชื่อ -';
                removeButton.addEventListener('click', function() {
                    inputContainer.removeChild(setContainer);
                    inputCounter--;
                });

                buttonDiv.appendChild(removeButton);

                // Append all new elements to the set container
                setContainer.appendChild(labeledHrDiv);
                setContainer.appendChild(newFullnameDiv);
                setContainer.appendChild(newIDDiv);
                setContainer.appendChild(newphoneDiv);
                setContainer.appendChild(newaddressDiv);
                setContainer.appendChild(newamountDiv);
                setContainer.appendChild(buttonDiv);

                // Append the set container to the main container
                inputContainer.appendChild(setContainer);

                // Increment the input counter
                inputCounter++;
            }

            document.getElementById('addNameButton').addEventListener('click', addName);

            document.getElementById('dynamicForm').addEventListener('submit', function(event) {
                event.preventDefault();
                const formData = new FormData(this);
                for (let [name, value] of formData.entries()) {
                    console.log(`${name}: ${value}`);
                }
                this.submit(); // Add this to actually submit the form
            });
        });
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', (event) => {
            const exampleModal = document.getElementById('exampleModal');
            exampleModal.addEventListener('show.bs.modal', function(event) {
                const button = event.relatedTarget;
                const edoValue = button.getAttribute('data-edo');
                const inputEdo = document.getElementById('edoValue');
                inputEdo.value = edoValue;
            });
        });
    </script>

    <script>
        document.getElementById('imgFileInput').addEventListener('change', function(event) {
            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    const preview = document.getElementById('preview');
                    preview.src = e.target.result;
                    preview.style.display = 'block';
                }
                reader.readAsDataURL(file);
            }
        });
    </script>
    <script>
        function checkId(id) {
            console.log("checkId called with id:", id); // Debugging line
            const donationOptions = document.getElementById('donationOptions');
            if (id === 1) {
                donationOptions.style.display = 'block';
            } else {
                donationOptions.style.display = 'none';
            }
        }

        // Ensure this script is included after the modal and elements have been defined
        document.addEventListener('DOMContentLoaded', (event) => {
            const modal = document.getElementById('exampleModal');
            modal.addEventListener('show.bs.modal', function(event) {
                const button = event.relatedTarget;
                const id = button.getAttribute('data-id');
                checkId(parseInt(id)); // Call checkId with parsed id
            });
        });
    </script>

    <script>
        function generateRandomName(length) {
            const characters = '0123456789ABCDEFG';
            let result = '';
            const charactersLength = characters.length;
            for (let i = 0; i < length; i++) {
                result += characters.charAt(Math.floor(Math.random() * charactersLength));
            }
            return result;
        }

        document.addEventListener('DOMContentLoaded', (event) => {
            const exampleModal = document.getElementById('exampleModal');
            exampleModal.addEventListener('show.bs.modal', function(event) {
                const imgNameInput = exampleModal.querySelector('input[name="img_name"]');
                imgNameInput.value = generateRandomName(10); // Change 10 to the desired length
            });
        });
    </script>

</body>

</html>