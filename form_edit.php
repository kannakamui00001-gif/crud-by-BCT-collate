<?php

include('connect.php');
/** @var mysqli $conn */
$room_id = $_GET['room_id'];
$room_number = $_GET['room_number'];
$floor = $_GET['floor'];
$building = $_GET['building'];
$remark = $_GET['remark'];

if ($room_number == "") {
    echo "ສະລຸນາປ້ອນເບີຫ້ອງ";
} else {
    $sql = "update room set room_number = '$room_number' ,
    floor = '$floor' ,
    building = '$building' , 
    remark = '$remark' 
    where room_id = '$room_id';
    ";
    $update = mysqli_query($conn, $sql);
    if ($update) {
        echo "
        
        <script>

        alert ('ແກ້ໄຂຂໍ້ມູນສຳເຫຼັດ');
        location = 'select.php';
        
        </script>
        ";
    } else {
        echo "ຜິດພາດ" . mysqli_error($conn);
    }
    mysqli_close($conn);
}
