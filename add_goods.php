<?php
// 添加商品
$id = $_POST['id']; // 假设id是通过表单提交的字段名
// 检查数据库中是否已存在相同的ID
$checkSql = "SELECT COUNT(*) FROM goods WHERE id = ?";
$stmt = mysqli_prepare($conn, $checkSql);
mysqli_stmt_bind_param($stmt, 's', $id);
mysqli_stmt_execute($stmt);
mysqli_stmt_bind_result($stmt, $count);
mysqli_stmt_fetch($stmt);
mysqli_stmt_close($stmt);

if ($count > 0) {
    $response = array("error" => "已存在相同的ID，添加失败");
    echo json_encode($response);
} else {
    // 继续进行插入操作
    $sql = "INSERT INTO goods (id, goodsname, price, type, detail, brief, img) VALUES (?, ?, ?, ?, ?, ?, ?)";
    // 准备插入数据的参数数组
    $params = array($id, $goodsname, $price, $type, $detail, $brief, $imageData);
    // 创建预处理语句
    $stmt = mysqli_prepare($conn, $sql);
    // 将参数绑定到预处理语句中的占位符
    mysqli_stmt_bind_param($stmt, 'sssssss', ...$params);
    // 执行预处理语句
    if (mysqli_stmt_execute($stmt)) {
        $response = array("success" => "添加成功");
        echo json_encode($response);
    } else {
        $response = array("error" => "添加商品失败: " . mysqli_error($conn));
        echo json_encode($response);
    }
    // 关闭预处理语句
    mysqli_stmt_close($stmt);
}
?>
