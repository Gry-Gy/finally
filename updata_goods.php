<?php
 // 更新商品信息
 $sql = "UPDATE goods SET";
 $params = array();  
 if (!empty($goodsname)) {
     $sql .= " goodsname=?,";
     $params[] = $goodsname;
 }
 if (!empty($price)) {
     $sql .= " price=?,";
     $params[] = $price;
 }
 if (!empty($type)) {
     $sql .= " type=?,";
     $params[] = $type;
 }
 if (!empty($detail)) {
     $sql .= " detail=?,";
     $params[] = $detail;
 }
 if (!empty($brief)) {
     $sql .= " brief=?,";
     $params[] = $brief;
 }
 $sql = rtrim($sql, ","); // 去除最后一个逗号 
 // 判断是否有更新的属性
 if (!empty($params)) {
     $sql .= " WHERE id=?";
     $params[] = $id; 
     // 创建预处理语句
     $stmt = mysqli_prepare($conn, $sql);  
     if ($stmt) { // 检查预处理语句是否创建成功
         // 将参数绑定到预处理语句中的占位符
         mysqli_stmt_bind_param($stmt, str_repeat('s', count($params)), ...$params);
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
     } else {
         echo "创建预处理语句失败: " . mysqli_error($conn);
     }
 }

?>