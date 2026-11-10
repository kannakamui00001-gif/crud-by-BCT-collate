<?php 

include('connect.php');
/** @var mysqli $conn */ 

$room_id = $_GET['room_id'];
$sql = "delete from room where room_id = $room_id"; 
$delete = mysqli_query($conn , $sql); 
if($delete){
    echo "
    
    <script>
    
    location = 'select.php';

    </script>
    ";
}else{


echo "ບໍ່ສາມາເດລົບຂໍ້ມຸນໄດ້";

}
mysqli_close($conn);
?>