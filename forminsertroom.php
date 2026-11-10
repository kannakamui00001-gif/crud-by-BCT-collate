<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="bootstrap-5.3.8-dist/css/bootstrap.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" rel="stylesheet">
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
    <div class=" page-center">
        <div class=" card form-box shadow-sm">
            <div class=" card-header bg-white">
                <h2 class=" text-center mb-0">
                    ຟອມບັນທຶກຂໍ້ມູນ
                </h2>
            </div>
            <div>
                <form action="form_connect.php" method="get">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="room_ber">ເບີຫ້ອງ</label>
                            <input type="text" class="form-control" name="room_number" id="" placeholder="ປ້ອນເບີຫ້ອງ" required>
                        </div>
                        <div class="form-group">
                            <label for="floor">ເລືອກຊັ້ນ</label>
                            <select name="floor" id="" class=" form-control">
                                <option value="">ເລືອກຊັ້ນ</option>
                                <option value="1">ຊັ້ນ 1</option>
                                <option value="2">ຊັ້ນ 2</option>
                                <option value="3">ຊັ້ນ 3</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="building">ເລືອກຕືກ</label>
                            <select class="form-control" name="building" id="">
                                <option value="">ເລືອກຕືກ</option>
                                <option value="A"> A </option>
                                <option value="B"> B </option>
                                <option value="C"> C </option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="remark">ໝາຍເຫດ</label>
                            <textarea class="form-control" name="remark" id="" placeholder="ກະລຸນາປ້ອນໝາຍເຫດ"></textarea>
                        </div>
                    </div>
                    <div class="card-footer bg-white">
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save me-1"> ບັນທຶກ</i>
                        </button>
                        <button type="reset" class="btn btn-danger">
                            <i class="fas fa-eraser me-1"> ລ້າງຂໍ້ມູນ</i>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>