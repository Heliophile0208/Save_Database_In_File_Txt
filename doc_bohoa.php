<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách bó hoa</title>
</head>
<style>
    table {
    width: 90%;
    margin: 20px auto;
    padding: 0px;
    border-collapse: collapse; 
    text-align: center;
}

    tr[name='main-content'] {
        display: flex;
        flex-direction: row;
    }

    td {
        padding: 12px; 
        vertical-align: top; 
        border: 1px solid #ccc; 
    }

    tr[name='title'] {
        text-align: center;
        color: white;
        background-color: orangered;
    }

    td[name='thongtin'] {
        width: 20%;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
    }

    img {
        width: 150px;
        height: auto; 
    }

</style>
<body>
    <a href="them_bohoa.php">Thêm bó hoa mới</a>
    <table>
        <tr name="title">
            <td colspan="2" >HOA ĐẸP BỐN MÙA</td>
        </tr>

        <?php
        $file = '../danhsachbohoa.txt';
        if (file_exists($file)) {
            $lines = file($file);
                echo "<tr name='main-content'>";
                $counter = 0; 
            foreach ($lines as $line) {
                list($ten, $gia, $hinh) = explode(", ", $line);
                $ten = str_replace("Tên hoa: ", "", $ten);
                $gia = str_replace("Giá: ", "", $gia);
                $hinh = str_replace("Hình: ", "", $hinh);
            
                echo "<td name='thongtin'>";
                    echo "<strong>" . $ten . "</strong><br>"; 
                    echo "Giá bán: " . number_format($gia) . " VNĐ<br>";
                    echo "<img src='$hinh'>";
                echo "</td>";

                $counter++; 

              
                if ($counter % 3 == 0) {
                    echo "</tr><tr name='main-content'>"; 
                }
            }
            echo "</tr>";
        } else {
            echo "<tr><td colspan='3'>Chưa có dữ liệu.</td></tr>";
        }
        ?>
    </table>
</body>
</html>