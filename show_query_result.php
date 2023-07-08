<!DOCTYPE html>
<html>
<head>
    <title>查询结果展示</title>
    <style>
        table {
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
        }
    </style>
</head>
<body>
    <h1>查询结果展示</h1>
    <?php
    $conn = mysqli_connect('localhost', 'root', '') or die('连接失败');
    mysqli_select_db($conn, "spgl") or die('选择数据库失败');
    mysqli_set_charset($conn, "utf8");
    $sql = "SELECT id, goodsname, price, type, detail, brief, img FROM goods";
    $result = mysqli_query($conn, $sql);
    $rows = array();
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    mysqli_free_result($result);
    

    if(count($rows) > 0){
        echo "<table>";
        echo "<tr>";
        echo "<th>ID</th><th>商品名称</th><th>价格</th><th>类型</th><th>详细信息</th><th>简介</th><th>图片</th>";
        echo "</tr>";

        foreach($rows as $row){
            echo "<tr>";
            echo "<td>".$row["id"]."</td>";
            echo "<td>".$row["goodsname"]."</td>";
            echo "<td>".$row["price"]."</td>";
            echo "<td>".$row["type"]."</td>";
            echo "<td>".$row["detail"]."</td>";
            echo "<td>".$row["brief"]."</td>";
            echo "<td><img src='data:image/jpeg;base64,".base64_encode($row['img'])."' width='100' height='100'></td>"; 
            echo "</tr>";
        }

        echo "</table>";
    } else {
        echo "没有查询到任何结果";
    }
    ?>
</body>
</html>
