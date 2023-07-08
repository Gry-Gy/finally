<?php
        // 查询所有商品ID
        $conn = mysqli_connect('localhost', 'root', '') or die('连接失败');
        mysqli_select_db($conn, "spgl") or die('选择数据库失败');
        mysqli_set_charset($conn, "utf8");
        $sql = "SELECT id FROM goods";
        $result = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_assoc($result)) {
            $id = $row['id'];
            echo "<option value=\"$id\">$id</option>";
        }
        ?>