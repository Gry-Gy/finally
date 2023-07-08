<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./css/household appliance.css">
    <link rel="stylesheet" href="./swiper/swiper-bundle.min.css">
    <script src="./jqurey/jquery3.6.3.js"></script>
    <script src="./swiper/swiper-bundle.min.js"></script>
    <script src="./household appliance.js"></script>
    <script src="./household appliance.js" async></script>
</head>
<body>
    <div class="top">

    </div>
    <div class="container">
        <div class="main">
            <div class="main_left">
            <ul>
                <li><a href="#">冰箱</a></li>
                <li><a href="#">洗衣机</a></li>
                <li><a href="#">空调</a></li>
                <li><a href="#">电视机</a></li>
                <li><a href="#">微波炉</a></li>
                <li><a href="#">咖啡机</a></li>
            </ul>
            </div>
            <div class="main_right">
        <div class="swiper mySwiper">
            <div class="swiper-wrapper">
                <?php
            $images = array("./images/001.png", "./images/002.png", "./images/003.png", "./images/004.png", "./images/005.png", "./images/006.png", "./images/007.png", "./images/001.png", "./images/002.png");
            foreach ($images as $image) {
            echo '<div class="swiper-slide"><img src="'.$image.'" alt=""></div>';
                    }
                    ?>
            </div>
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
                <div class="swiper-pagination"></div>
        </div>
            </div>
        </div>
        <div class="main_next">
            <h2><em>明星产品</em></h2>
            <div class="one">
                <img src="./images/009.jpg" alt="">
                <div class="state">
                    <h2>Redmi K20 Pro</h2>
                    <h5>骁龙855处理器, 弹出式极界全面屏</h5>
                    <em style="color: red;">2299元&nbsp;</em><del>3000元</del>
                </div>
            </div>
            <div class="two">
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
                    echo '<em style="color: red;">' . $row['price'] . '元&nbsp;</em>';
                    echo '<del>' . ($row['price'] + 300) . '元</del>';
                    echo '</div>';
                    echo '</div>';
           }
       } else {
           echo '没有查询到任何结果';
       }
       mysqli_close($conn);
            ?>
</div>


        </div>
    </div>
   
</body>
</html>