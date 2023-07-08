<?php
$conn = mysqli_connect('localhost', 'root', '') or die('连接失败');
mysqli_select_db($conn, "spgl") or die('选择数据库失败');
mysqli_set_charset($conn, "utf8");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["id"];
    $goodsname = $_POST["goodsname"];
    $price = $_POST["price"];
    $type = $_POST["type"];
    $detail = $_POST["detail"];
    $brief = $_POST["brief"];
    // 处理图片上传
    if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
        $uploadDir = "save_image/"; // 指定保存图片的文件夹路径
        $imageName = $_FILES["image"]["name"]; // 获取上传图片的原始文件名
        $imagePath = $uploadDir . $imageName; // 拼接保存图片的完整路径
        // 将上传的临时文件移动到指定路径
        move_uploaded_file($_FILES["image"]["tmp_name"], $imagePath);
        // 读取保存的图片文件的二进制数据
        $imageData = file_get_contents($imagePath);
        // 在此之后，您可以将 $imageData 存储到数据库或进行其他操作
    } else {
        // 处理图片上传失败的情况
        $imageData = null;
    }
    // 根据不同的操作类型执行相应的数据库操作
    $action = $_POST["action"];
    if ($action == "add") {

      include "add_goods.php";

    } elseif ($action == "delete") {

    include "delete_goods.php";

    }   
elseif ($action == "update")
 {
    include "updata_goods.php";
}

}
mysqli_close($conn);
?>
