<?php
// 连接数据库
$conn = mysqli_connect('localhost', 'root', '') or die('连接失败');
mysqli_select_db($conn, "spgl") or die('选择数据库失败');
mysqli_set_charset($conn, "utf8");

// 处理表单提交的数据
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // 获取表单数据
    $id = $_POST["id"];
    $goodsname = $_POST["goodsname"];
    $price = $_POST["price"];
    $type = $_POST["type"];
    $detail = $_POST["detail"];
    $brief = $_POST["brief"];

   // 处理图片上传
if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
    $uploadDir = "./save_image/"; // 指定保存图片的文件夹路径
    $imageName = $_FILES["image"]["name"]; // 获取上传图片的原始文件名
    $imagePath = $uploadDir . $imageName; // 拼接保存图片的完整路径

    // 将上传的临时文件移动到指定路径
    move_uploaded_file($_FILES["image"]["tmp_name"], $imagePath);

    // 读取保存的图片文件的二进制数据
    $imageData = file_get_contents($imagePath);
    
    // 在此之后，您可以将 $imageData 存储到数据库或进行其他操作
} else {
    // 处理图片上传失败的情况
}

// 根据不同的操作类型执行相应的数据库操作
$action = $_POST["action"];
if ($action == "add") {
    // 添加商品
    $sql = "INSERT INTO goods (id, goodsname, price, type, detail, brief, img) VALUES (?, ?, ?, ?, ?, ?, ?)";
    // 准备插入数据的参数数组
    $params = array($id, $goodsname, $price, $type, $detail, $brief, $imageData);
    // 创建预处理语句
    $stmt = mysqli_prepare($conn, $sql);
    // 将参数绑定到预处理语句中的占位符
    mysqli_stmt_bind_param($stmt, 'sssssbs', ...$params);
    // 执行预处理语句
    if (mysqli_stmt_execute($stmt)) {
        echo "添加商品成功";
    } else {
        echo "添加商品失败: " . mysqli_error($conn);
    }
    // 关闭预处理语句
    mysqli_stmt_close($stmt);
}
 elseif ($action == "delete") {
    // 删除商品
    $sql = "DELETE FROM goods WHERE id='$id'";
    if (mysqli_query($conn, $sql)) {
        echo "删除商品成功";
    } else {
        echo "删除商品失败: " . mysqli_error($conn);
    }
} elseif ($action == "update") {
    // 更新商品信息
    $sql = "UPDATE goods SET goodsname=?, price=?, type=?, detail=?, brief=? WHERE id=?";
    // 准备更新数据的参数数组
    $params = array($goodsname, $price, $type, $detail, $brief, $id);
    
    // 如果有新的图片上传，则更新图片数据
    if (!empty($_FILES['image']['tmp_name'])) {
        $imageData = file_get_contents($_FILES['image']['tmp_name']);
        $sql = "UPDATE goods SET goodsname=?, price=?, type=?, detail=?, brief=?, img=? WHERE id=?";
        $params[] = $imageData; // 将图片数据添加到参数数组中
    }
    // 创建预处理语句
    $stmt = mysqli_prepare($conn, $sql);
    // 将参数绑定到预处理语句中的占位符
    if (count($params) > 6) {
        mysqli_stmt_bind_param($stmt, 'sssssbs', ...$params);
    } else {
        mysqli_stmt_bind_param($stmt, 'sssssb', ...$params);
    }
    // 执行预处理语句
    if (mysqli_stmt_execute($stmt)) {
        if (mysqli_affected_rows($conn) > 0) {
            echo "更新商品信息成功";
        } else {
            echo "商品不存在";
        }
    } else {
        echo "更新商品信息失败: " . mysqli_error($conn);
    }
    // 关闭预处理语句
    mysqli_stmt_close($stmt);
}
elseif($action == "search")
{
    $sql = "SELECT * FROM goods";
    $result = mysqli_query($conn, $sql);

    // 检查是否有查询结果
    if(mysqli_num_rows($result) > 0){
        // 将查询结果存储在数组中
        $rows = array();
        while($row = mysqli_fetch_assoc($result)){
            $rows[] = $row;
        }

        // 将查询结果编码为 JSON 数据
        $jsonData = json_encode($rows);

        // 存储 JSON 数据到文件
        $filename = "./json/search_result.json";
        file_put_contents($filename, $jsonData);

        // 跳转到展示查询结果的网页
        header("Location: show_query_result.php?filename=$filename");
        exit;
    } else {
        echo "没有查询到任何结果";
    }
}
}

mysqli_close($conn);

?>
