<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="bootstrap-5.3.8-dist/css/bootstrap.min.css">
    <style>
        *{
            font-family: 'phetsarath ot';
        }
        body{
            background-color: #f1f4f7;

        }
        .page-center{
            min-height: 100hv;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 16px;

        }
        .form-box{
            width: 100%;
            max-width: 440px;
            
        }
    </style> 
</head>
<body>
    <?php 
    
    include('connect.php');
    /** @var mysqli $conn */
    $room_id = $_GET['room_id'] ?? "";
    $sql = "select * from room where room_id = $room_id";
    $select = mysqli_query($conn , $sql);
    $data = mysqli_fetch_array($select);

    ?>
    
    <div class="page-center">
        <div class="card form-box shadow-sm">
            <div class="card-header bg-white">
                <h4 class="text-ceter mb-0">ຟ້ອມແກ້ໄຂຂໍ້ມູນ</h4>
            </div>
            <form action="form_edit.php" method="get">
                <div class="card-body">
                    <div class="mb-3">
                        <label for="">ລະຫັດຫ້ອງ</label>
                        <input type="text" value="<?php echo $data['room_id'] ?>" class="form-control" name="room_id">
                    </div>
                    <div class="mb-3">
                        <label for="">ເບີຫ້ອງ</label>
                        <input type="text" value="<?php echo $data['room_number']; ?>" class="form-control" name="room_number">
                    </div>
                    <div class="mb-3">
                        <label for="">ເລືອກຊັ້ນ</label>
                        <select name="floor" id="" class="form-control">
                            <option value="<?php echo $data['floor']; ?>"> ຊັ້ນ<?php echo $data['floor']; ?></option>
                            <option value="1">ຊັ້ນ 1</option>
                            <option value="2">ຊັ້ນ 2</option>
                            <option value="3">ຊັ້ນ 3</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="">ເລືອກຕຶກ</label>
                        <select name="building" id="" class="form-control">
                            <option value="<?php echo $data['building']; ?>"> ຕືກ<?php echo $data['building']; ?></option>
                            <option value="A">ຕືກ A</option>
                            <option value="B">ຕືກ B</option>
                            <option value="C">ຕືກ C</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="">ໝາຍເຫດ</label>
                        <input type="text" value="<?php echo $data['remark']; ?>" name="remark" class="form-control">
                    </div>
                </div>
                <div class="card-footer">
                    <div class="mb-3">
                        <button type="submit" class="btn btn-warning btn-blick ">ແກ້ໄຂ</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</body>
</html>