<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm bó hoa</title>
</head>
<style>
    .box {
        width: 600px;
        height: auto;
        margin: 0px auto;
        border: 1px solid black;
        background-color: pink;
    }
    h1 {
        color: red;
        font-weight: bold;
        text-align: center;
    }
    .form_group {
        justify-content: center;
        align-items: center;
    }
    .form_group label{
        display: inline-block;
        width: 150px;
        margin-left: 10%;
    }
    .form_group input[type='text'],input[type='number']  {
        width: 220px;
        margin-bottom: 10px;
    }
    input[type='submit'] {
        margin-top: 10px;
        margin-left: 40%;
        margin-bottom: 10px;
    }
    .header-box {
        width: 95%;
        background-color: orange;
        padding: 15px;
        margin: 0px auto;
    }
    form {
        margin-top: 10px;
    }
    .ketqua {
        margin: 10px;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
    }
    .ketqua img {
        width: 200px;
        height: auto;
        margin-bottom: 10px;
    }
</style>

<body>
    <div class="box">
        <div class="header-box">
            <h1>THÊM BÓ HOA MỚI</h1>
        </div>
        <form method="post" enctype="multipart/form-data">
            <div class="form_group">
                <label>Tên bó hoa</label>
                    <input type="text" name="ten-bo-hoa" value="<?php if(isset($_POST['them'])) echo $_POST['ten-bo-hoa'] ?>" required> 
                <label>Giá bán</label>
                    <input type="number" name="gia-ban" value="<?php if(isset($_POST['them'])) echo $_POST['gia-ban'] ?>" required>
                <label>Hình bó hoa</label>
                    <input type="file" name="hinh" value="" >
            </div>
                <input type="submit" name="them" value="Thêm bó hoa">
        </form>
    </div>
    <?php
    if(isset($_POST['them']))
    {
        $tenhoa = $_POST['ten-bo-hoa'];
        $gia = $_POST['gia-ban'];

        $target_dir = "Hinh/";
        $target_file = $target_dir . basename($_FILES["hinh"]["name"]);

        if (move_uploaded_file($_FILES["hinh"]["tmp_name"], $target_file)) {
            $hinh = $target_file; 
        
       
            $dulieu = "Tên hoa: $tenhoa, Giá: $gia, Hình: $hinh\n";
            if (file_put_contents('../danhsachbohoa.txt', $dulieu, FILE_APPEND | LOCK_EX) !== false) {
                echo "<div class='ketqua'>";


                echo "<h3> KẾT QUẢ </h3>";

                
                    echo "<img src='" . $target_file . "'>";
                    echo "Tên bó hoa: <strong>". $tenhoa ."</strong>";
                    echo "Giá bán: <strong>". $gia ."</strong>";

                    echo "<a href='doc_bohoa.php'>Xem các bó hoa</a>";
                echo "</div>";
            } else {
                echo "Lỗi .";
            }
        } else {
            echo "Lỗi khi tải lên ảnh.";
        }
    }
 ?>
</body>
</html>