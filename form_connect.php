<?php

include('connect.php');
/** @var mysqli $conn */
$a = $_GET['room_number'] ?? ""; // ?? "" ຊ່ວຍໃຫ້ເວລາບໍ່ໄດ້ສ່ງຄ່າມາໃຫ້ມັນເປັນ ຄ່າວ່າງ "" ຊ່ວຍປ້ອງກັນ error warning Undefined array key
$b = $_GET['floor'] ?? "";
$c = $_GET['building'] ?? "";
$d = $_GET['remark'] ?? "";
if ($a == "" and $b == "" and $c == "" and $d == "") {
    echo "ກະລຸນາປ້ອນຂໍ້ມູນກ່ອນ";
} else if ($a == "") {
    echo "ກະລຸນາປ້ອນເບີຫ້ອງ";
} else if ($b == "") {
    echo "ກະລຸນາເລືອກຊັ້ນ";
} else if ($c == "") {
    echo "ກະລຸນເລືອກຕືກ";
}else{
    $sql = "insert into room(room_number,floor,building,remark) values ('$a','$b','$c','$d')";
    $insert = mysqli_query($conn,$sql);
    if ($insert) {
        echo "
        <script>

        alert('ບັນທຶກຂໍ້ມູນສຳເລັດ');

        location='forminsertroom.php';
        
        </script>
        ";
    } else {
        echo "ບັນທຶກຂໍ້ມູນລົ້ມເຫຼວ" . mysqli_error($conn);
    }
    
    mysqli_close($conn);
}
