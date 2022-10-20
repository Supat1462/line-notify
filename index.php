<?php

    session_start();

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Line notify</title>

    <link rel="stylesheet" href="index.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
    <div class="container p-5 bg-light">
        <h1 class="text-center">ฟอร์มการแจ้งเบิกหมึกเครื่องพิมพ์</h1>
        <form action="sendinfo.php" method="POST">
            <?php if (isset($_SESSION['success'])) {  ?>

            <div class="alert alert-success" role="alert">
                <?php 
                        echo $_SESSION['success'];
                        unset ($_SESSION['success']);
                    ?>
            </div>

            <?php } ?>

            <?php if (isset($_SESSION['error'])) {  ?>

            <div class="alert alert-danger" role="alert">
                <?php 
                        echo $_SESSION['error'];
                        unset ($_SESSION['error']);
                    ?>
            </div>

            <?php } ?>

            <div class="mb-3">
                <label for="name" class="form-label fs-4">ชื่อ - นามสกุลผู้ขอเบิก : </label>
                <input type="name" class="form-control" aria-describedby="name" name="name">
            </div>

            <div class="mb-3">
                <label for="printer" class="form-label fs-4">เลือกรุ่นของเครื่องพิมพ์ : </label>
                <select class="form-select" aria-label="printer" name="printer">
                    <option selected>HP smart tank 615</option>
                    <option value="HP laser">HP laser</option>
                    <option value="Epson L410">Epson L410</option>
                    <option value="Brothor">Brothor</option>
                </select>
            </div>

            <div class="mb-4">
                <label for="location" class="form-label fs-4">เลือกสถานที่ใช้งาน : </label>
                <select class="form-select" aria-label="location" name="location">
                    <option value="ฟอร์รั่ม ทาวน์เวอร์ (สำนักงานใหญ่)">ฟอร์รั่ม ทาวน์เวอร์ (สำนักงานใหญ่)</option>
                    <option value="นครสวรรค์">นครสวรรค์</option>
                    <option value="ขอนแก่น">ขอนแก่น</option>
                    <option value="บางบัว">บางบัว</option>
                </select>
            </div>

            <div class="form-floating mb-3">
                <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2"
                    style="height: 100px" name="address"></textarea>
                <label for="floatingTextarea2">รายละเอียด ชื่อและที่อยู่ผู้รับ เบอร์โทรติดต่อ</label>
            </div>

            

            <!-- <div class="mb-3">
                <label for="name" class="form-label">Full Name</label>
                <input type="text" class="form-control" aria-describedby="fullname" name="fullname">
            </div> -->

            <button type="submit" class="btn btn-primary" name="submit">ส่งข้อมูล</button>
        </form>
    </div>

</body>

</html>