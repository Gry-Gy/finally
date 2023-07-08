<?php
  // 删除商品
  $sql = "DELETE FROM goods WHERE id='$id'";
  if (mysqli_query($conn, $sql)) {
      echo "删除商品成功";
  } else {
      echo "删除商品失败: " . mysqli_error($conn);
  }

?>