<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" rel="stylesheet">
</head>

<body>
    <?php
    include('connect.php'); // ດື່ງຂໍ້ມູນເພືອ່ຈຳຕົວປຽນ ຈາກ file connect.php ມາໃຊ້ໄດ້ ໃນທີ່ນີ້ແມ່ນ file ນີ້
    /** @var mysqli $conn */ // ເປັນການບອກ ໃຫ້ຕົວ editor ຮູ້ວ່າ $conn ເປັນຊະນິດຂອງຂໍ້ມູນຂອງ mysqli ເພື່ອໃຫ້ມັນຮູ້ວ່າ $conn ມີຢູ່ ຖ້າບໍ່ໃສ່ ບາງາຄັ້ງມັນຈະບໍ່ເຫັນ
    mysqli_set_charset($conn, 'utf8'); // ເປັນການຕັ້ງໃຫ້ ບັນທຶກ ແລະ ສາແດງຂໍ້ມູນເປັນພາສາ ລາວໄດ້ ບໍ່ໃຫ້ມັນເປັນ ??? ແຕ່ໃນນະທີ່ນີ້ເຮົາ ໃຊ່ໃນ file connectt ແລ້ວ ບໍ່ຈຳເປັນຕ້ອງໃສ່ອິກກໍ່ໄດ້
    $select = mysqli_query($conn, "select * from room"); // mysqli_query ເປັນ function ຂອງພາສາ PHP ທີ່ເຮັດໃຫ້ເຮົາ ສາມາດໃຊ້ ຄຳສັ່ງ (command) ຂອງພາສາ sql ໄດ້ ຄຳສັ່ງຕ່າງໆເຊັ້ນ : select , insert , update , delete ເພື່ອໃຊ້ງານ ສະແດງ , ໃນການເພີ່ມ , ລົບ ຫຼື ແກ້ໄຂ ຂໍ້ມູນໃນຖານຂໍ້ມູນຂອງເຮົາພານໜ້າ ເວັບ ໄດ້ ຮູບແບບແມ່ນ :​
                                                         // ຕົວປຽນ = mysqli_query (ການເຊື່ອມຕໍ່ , "ຄຳັສ່ງ ຫຼື command ຂອງ ພາສາ sql ທີ່ຈະໃຊ້ ເຊັ້ນ : insert , select , delete , update ແລະ ອື່ນໆ ຂຽນແບບທົ່ວໄປ ຄື ກັບຂຽນ ຄຳສັ່ງ ໃນ cmd ເລຍ") ;
                                                         // ທັ້ງແຖວນີ້ແມ່ນ ການ ສ້າງ function ທີ່ຈະສະແດງຂໍ້ມູນທັ້ງມົດໃນ ຕາງຕະລາງ room ມາເກັບໄວໃນຕົວປຽນ $select 
    $select_count = mysqli_query($conn, "SELECT COUNT(*) FROM room"); // ແມ່ນການນັບຈຳນວນ ແຖວທັ້ງໝົດ ໃນ ຕາງຕະລາງ room ມາເກັບໄວໃນຕົວປຽນ $select_count
    if (!$select || !$select_count) {
        die("Query Error: " . htmlspecialchars(mysqli_error($conn))); // ການໃຊ້ die ແມ່ນ ຈະສະແດງຄຳສັງ
    }
    // if ຕົວນີ້ແມ່ນ ຖ້າ ຕົວປຽນ ໃດໜຶ່ງເຊັ້ນ $select ຫຼື $select_count ລົ້ມເຫຼວ ຫຼື ເຮັດວຽກບໍ່ໄດ້ (ການໃຊ້ ! ທາງໜ້າຕົວປຽນ ທີ່ເກັບ funciton ຂອງ mysqli ແມ່ນຈະເປັນການບອກຕັ້ງວ່າ ມັນໃຊ້ບໍ່ໄດ້ ຫຼື ບໍ່ເຮັດວຽກ) 
    $count = mysqli_fetch_array($select_count); // mysqli_fetch_array ຈະເປັນ function ຂອງ ພາສາ PHP ເຊີ່ງເປັນການດື່ງເອົາຂໍ້ມູນຕ່າງໆຈາກ function mysqli_query ທີ່ຈະໄດ້ມາເປັນ ໂຄ້ງຮາງຕາຕະລາງ 
                                                // ຄື : function mysqli_query ທີ່ເຮັດໃຫ້ເຮົາສາມາດໃຊ້ຄຳສັ່ງ command ຂອງ ພາສາ sql ໄດ້ ແຕ່ມັນຈະສົ່ງຂໍ້ມູນເກັບມາເປັນ ຮູບແບບ result object ຄື ໄດ້ມາເປັນ ຮູບແບບໃດນຶ່ງ 
                                                // ຕົວຢ່າງ ໃນນີ້ ຄື $select_count = mysqli_query($conn, "SELECT COUNT(*) FROM room"); ມັນຈະສົ່ງຂໍ້ມູນ ກັບ ມາເປັນ ຕາຕະລາງ ແບບນີ້ : 
                                                // +----------+
                                                // | COUNT(*) |   
                                                // +----------+
                                                // |    5     |
                                                // +----------+
                                                // ເຊີ່ງຖ້າ $select_count = mysqli_query($conn, "SELECT COUNT(*) FROM room"); ນັ້ນຈະສົ່ງກັບຄືມາແບບຕາຕະລາງ ເທິງນັ້ນ ເຮົາ ຈະບໍ່ສາມາດໃຊ້ ຂໍ້ມູນທາງໃນຕາຕະລາງ ໄດ້ ໃນທີ່ນີ້ ຄື ເລກ 5 ນັ້ນເຮົາຈະບໍ່ສາມາດນຳມາໃຊ້ຕໍ່ໄດ້ 
                                                // ຖ້າເຮົາຕ້ອງການເອົາຕົວເລກ 5 ນັ້ນມາໃຊ້ ເຮົາຕ້ອງໃຊ້ function mysqli_fetch_array ດື່ງເອົາຂໍ້ມູນ ຈາກ function mysqli_query ອອກ ມາເຖີງຈະສາມາດໃຊ້ໄດ້ 
                                                // ໃນ ທີ່ນີ້ຄື ໃຊ້ mysqli_fetch_array ເພື່ອດື່ງເອົາຂໍ້ມູນ ເລກ 5 ຈາກ $select_count = mysqli_query($conn, "SELECT COUNT(*) FROM room"); ແລ້ວເກັບລົງໃນຕົວປຽນ $count ເຊີ່ງຕົວປຽນ count ນີ້ຈະເປັນຮູບແບບ arrary
                                                // ຖ້າຈະຮ້ອງໃຊ້ ເລກ 5 ໃນຕາຕະລາງ count(*) ຂອງ $select_count ຕ້ອງໃຊ້ $count[0] ເພາະ mysqli_fatch_array ຈະເກັບຂໍ້ມູນລົງໃນຕົວປຽນ ແລະ ຕົວປຽນນັ້ນ ຈະຮ້ອງໃຊ້ໄດ້ ໃນຮູບແບບ array 
    ?>
    <div class="container py-4">
         <div class="card report-card">   <!-- class report-card ບໍ່ມີຫຍັງເລຍ ເປັນ class ທີ່ຈະເອົາໄປຕົກແຕ່ງເອງບໍ່ແມ່ນຂອງ bootstrap -->
            <div class=" card-header py-3">
                <h3 class="text-center mb-0">
                    ລາຍງານຂໍ້ມູນ
                </h3>
            </div>
            <div class=" card-body">
                <div class=" d-flex justify-content-between align-item-center flex-warp mb-3">
                    <h5 class=" mb-2 mb-md-0">
                        ຈຳນວນຫ້ອງທັງໝົດ <span class="badge bg-primary">
                            <?php

                            echo $count[0]; // ນີ້ແມ່ນເປັນການຮ້ອງໃຊ້ $count[0] ຈະ $count = mysqli_fetch_array($select_count);

                            ?>
                        </span> ຫ້ອງ
                    </h5>
                </div>
                    <a href="forminsertroom.php" class="btn btn-success " class="btn btn-warning btn-sm ">
                        <i class="fas fa-plus"></i> ເພີ່ມຂໍ້ມູນ
                    </a>
            </div>
            <div class="table-resposive">
                <table class=" table table-bordered table-striped table-hover align-middle mb-0">
                    <thead class="table-dark text-center">
                        <tr>
                            <th>ລຳດັບ</th>
                            <th>ເບີຫ້ອງ</th>
                            <th>ຊັ້ນ</th>
                            <th>ຕືກ</th>
                            <th>ໝາຍເຫດ</th>
                            <th class="th-edit">ແກ້ໄຂຂໍ້ມນ</th>  <!-- class="th-edit" ບໍ່ຈຳເປັນຕ້ອງໃຊ້ ກະໄດ້ ມັນບໍ່ແມ່ນ bootstrap ມັນເປັນເອົາໄວໄປຕົກແຕ່ງກ່ອນ--> 
                            <th class="th-delete">ລົບຂໍ້ມູນ</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        
                        $a = 1;
                        while($data = mysqli_fetch_array($select)){ // ຈະເປັນການໃຊ້ mysqli_fetch_array($select) ເພື່ອເປັນການເດືອນຂໍ້ມູນທີ່ຈະອອກມາຈາກການໃຊ້ $select = mysqli_query($conn, "select * from room"); ທີ່ຜົນອອກຂອງມັນຈະເປັນຕາຕະລາງ ແຕເຮົາຍັງບໍ່ສາມາດເອົາອອກມາໃຊ້ໄດ້ 
                                                                    // ແຕ່ການໃຊ້ mysqli_fetch_arrray($select) ມັນຈະດຶ່ງເອົາຂໍ້ມູນໃນຕາງຕະລາງ ທີ່ $select ດຶງອອກມາໃຊ້ໄດ້ ສາມາດນຳໄປສະແດງຜົນ ຕໍ່ໄດ້ 
                                                                    // ການໃຊ້ຮ່ວນກັບ while ຈະເຮັດໃຫ້ມັນດຶງຂໍ້ມູນຂອງທຸກໆ

                        ?>
                        <tr>
                        <td class="text-center">
                            <?php                            
                            echo $a;
                            ?>
                        </td>
                        <td>
                            <?php 
                            echo htmlspecialchars($data["room_number"]);
                            ?>
                        </td>
                        <td>
                            ຊັ້ນ
                            <?php 
                                echo htmlspecialchars($data["floor"]);
                            ?>
                        </td>
                        <td>
                            ຕືກ
                            <?php 
                                echo htmlspecialchars($data["building"]);
                            ?>
                        </td>
                        <td>
                            <?php 
                                echo htmlspecialchars($data["remark"]);
                            ?>
                        </td>
                        <td class="text-center">
                            <a href="form_update.php?room_id= <?php echo $data["room_id"]; ?>" class="btn btn-warning btn-sm">
                                <i class="fas fa-cog"></i>ແກ້ໄນຂໍ້ມູນ
                            </a>
                        </td>
                        <td class="text-center">
                            <a href="delete.php?room_id= <?php echo $data["room_id"]; ?>" class="btn btn-danger btn-sm" onclick="return confirm('ທ່ານມັນໃຈແລ້ວບໍ່')">
                                <i class="fas fa-trash"></i>ລົບ
                            </a>
                        </td>
                        </tr>
                        <?php 
                        
                        $a++;
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</body>

</html>