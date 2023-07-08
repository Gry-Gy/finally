<form action="javascript:void(0);" method="get" onsubmit="submitForm()">
    <input type="text" name="search" id="search-input" placeholder="请输入搜索关键字">
    <input type="button" value="查询" onclick="submitForm()">
    <select name="sort" onchange="submitForm()">
        <option value="">选择排序方式</option>
        <option value="price">按价格排序</option>
        <option value="id">按ID排序</option>
    </select>
</form>
    <?php
        // 连接数据库
        $conn = mysqli_connect('localhost', 'root', '') or die('连接失败');
        mysqli_select_db($conn, "spgl") or die('选择数据库失败');
        mysqli_set_charset($conn, "utf8");

        // 获取搜索关键字和排序方式
        $search = isset($_GET['search']) ? $_GET['search'] : '';
        $sort = isset($_GET['sort']) ? $_GET['sort'] : '';

        // 查询语句
        $sql = "SELECT id, goodsname, price, type, detail, brief, img FROM goods WHERE id LIKE '%$search%' OR goodsname LIKE '%$search%' OR price LIKE '%$search%'";

        // 添加排序方式
        if ($sort == 'price') {
            $sql .= " ORDER BY price";
        } elseif ($sort == 'id') {
            $sql .= " ORDER BY id";
        }

        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
            echo "<table>";
            echo "<tr>";
            echo "<th>ID</th><th>商品名称</th><th>价格</th><th>类型</th><th>详细信息</th><th>简介</th><th>图片</th>";
            echo "</tr>";
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>" . $row["id"] . "</td>";
                echo "<td>" . $row["goodsname"] . "</td>";
                echo "<td>" . $row["price"] . "</td>";
                echo "<td>" . $row["type"] . "</td>";
                echo "<td>" . $row["detail"] . "</td>";
                echo "<td>" . $row["brief"] . "</td>";
                echo "<td><img src='data:image/jpeg;base64," . base64_encode($row['img']) . "' width='100' height='100'></td>";
                echo "</tr>";
            }
            echo "</table>";
        } else {
            echo "没有查询到任何结果";
        }

        // 关闭数据库连接
        mysqli_close($conn);
    ?>
