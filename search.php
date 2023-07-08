<?php
    if (isset($rows) && count($rows) > 0) {
        foreach ($rows as $row) {
            echo "<div>ID: " . $row['id'] . "</div>";
            echo "<div>商品名称: " . $row['goodsname'] . "</div>";
            echo "<div>价格: " . $row['price'] . "</div>";
            echo "<div>类型: " . $row['type'] . "</div>";
            echo "<div>详情: " . $row['detail'] . "</div>";
            echo "<div>简介: " . $row['brief'] . "</div><br>";
        }
    }
    else
        echo"无信息";
?>

