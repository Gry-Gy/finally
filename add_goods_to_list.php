<?php
 $conn = mysqli_connect('localhost', 'root', '') or die('连接失败');
 mysqli_select_db($conn, 'spgl') or die('选择数据库失败');
 mysqli_set_charset($conn, 'utf8');
 $sql = 'SELECT id, goodsname, price, type, detail, brief, img FROM goods';
 $result = mysqli_query($conn, $sql);
 if (mysqli_num_rows($result) > 0) {
     while ($row = mysqli_fetch_assoc($result)) {
 echo '<div class="tleft">';
 // 将二进制图片数据转换为 Base64 编码
 $imageData = base64_encode($row['img']);
 echo '<a href="#"><img src="data:image/jpeg;base64,' . $imageData . '" alt=""></a>';
 echo '<div class="states">';
 echo '<h2>' . $row['goodsname'] . '</h2>';
 echo '<h5>' . $row['detail'] . '</h5>';
 echo '<em style="color: red;">' . $row['price'] . '&nbsp;</em>';
 echo '<del>' . ($row['price'] + 300) . '元</del>';
 echo '</div>';
 echo '</div>';
}
} else {
echo '没有查询到任何结果';
}
mysqli_close($conn);
