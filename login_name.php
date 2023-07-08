<?php
$conn = mysqli_connect('localhost', 'root', '') or die('连接失败');
mysqli_select_db($conn, "spgl") or die('选择数据库失败');
mysqli_set_charset($conn, "utf8");

$query = "SELECT goodsname FROM goods WHERE id = '001'";
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        echo $row['goodsname'];
    }
} else {
    echo "没有符合条件的数据。";
}
mysqli_close($conn);
?>