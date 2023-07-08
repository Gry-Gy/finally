<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<div class="main_next">
    <h2><em>明星产品</em></h2>
    <?php
        // 假设从数据库获取了需要输出的数据
        $products = [
            [
                'image' => './images/009.jpg',
                'name' => 'Redmi K20 Pro',
                'description' => '骁龙855处理器, 弹出式极界全面屏',
                'price' => '2299元',
                'original_price' => '3000元'
            ],
            // 可添加更多产品数据
        ];
        foreach ($products as $product) {
            echo '<div class="one">';
            echo '<img src="' . $product['image'] . '" alt="">';
            echo '<div class="state">';
            echo '<h2>' . $product['name'] . '</h2>';
            echo '<h5>' . $product['description'] . '</h5>';
            echo '<em style="color: red;">' . $product['price'] . '&nbsp;</em><del>' . $product['original_price'] . '</del>';
            echo '</div>';
            echo '</div>';
        }
    ?>
    <div class="two">
        <div class="tleft">
            <img src="./images/010.jpg" alt="">
            <div class="states">
                <h2><?php echo 'Redmi K20 Pro'; ?></h2>
                <h5><?php echo '骁龙855处理器, 弹出式极界全面屏'; ?></h5>
                <em style="color: red;"><?php echo '2299元&nbsp;'; ?></em><del><?php echo '3000元'; ?></del>
            </div>
        </div>
        <div class="tright">
            <img src="./images/010.jpg" alt="">
            <div class="states">
                <h2><?php echo 'Redmi K20 Pro'; ?></h2>
                <h5><?php echo '骁龙855处理器, 弹出式极界全面屏'; ?></h5>
                <em style="color: red;"><?php echo '2299元&nbsp;'; ?></em><del><?php echo '3000元'; ?></del>
            </div>
        </div>
    </div>
</div>

</body>
</html>