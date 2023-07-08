<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>商品的增删改查</title>
    <link rel="stylesheet" href="./css/goods_manger.css">
    <script src="./js/goods_manger.js" ></script>
    <script>
    k`1 `
    </script>
</head>
<body>
<script src="./jqurey/jquery3.6.3.js"></script>
<script src="./js/goods_manger.js" async></script>

<form id="myForm" method="POST" enctype="multipart/form-data" action="process.php">
    <label for="id">ID:</label>
    <input type="text" id="id" name="id" required><br>

    <label for="goodsname">商品名称:</label>
    <input type="text" id="goodsname" name="goodsname" required><br>

    <label for="image">图片:</label>
    <input type="file" id="image" name="image" required><br>
    <label for="price">价格:</label>
    <input type="text" id="price" name="price" required><br>
    <label for="type">类别:</label>
    <input type="text" id="type" name="type" required><br>
    <label for="detail">详情:</label>
    <textarea id="detail" name="detail" required></textarea><br>
    <label for="brief">简介:</label>
    <input type="text" id="brief" name="brief" required><br>
    <input type="button" value="添加商品" onclick="addGoods()">
</form>

<form id="deleteForm" method="POST" action="process.php">
    <label for="id">ID:</label>
    <select name="id" id="id" required>
        <?php
        include "search_all_goods_id.php";
        ?>
    </select><br>

    <input type="hidden" id="action" name="action" value="delete">
    <input type="button" value="删除商品" onclick="deleteGoods()">
</form>

<form id="updateForm" method="POST" enctype="multipart/form-data" action="process.php">
    <label for="id">ID:</label>
    <select name="id" id="id" required>
        <?php
             include "search_all_goods_id.php";
        ?>

    </select><br>
    <label for="goodsname">商品名称:</label>
    <input type="text" id="goodsname" name="goodsname" required><br>
    <label for="image">图片:</label>
    <input type="file" id="image" name="image" required><br>
    <label for="price">价格:</label>
    <input type="text" id="price" name="price" required><br>

    <label for="type">类别:</label>
    <input type="text" id="type" name="type" required><br>

    <label for="detail">详情:</label>
    <textarea id="detail" name="detail" required></textarea><br>

    <label for="brief">简介:</label>
    <input type="text" id="brief" name="brief" required><br>

    <input type="button" value="更新商品信息" onclick="updateGoods()">
</form>
<!-- <form id="searchForm" method="POST" action="process.php">
    <label for="id">ID:</label>
    <input type="text" id="id" name="id" required><br>

    <input type="hidden" id="action" name="action" value="search">
    <input type="button" value="查询商品信息" onclick="searchGoods()">
</form> -->
</body>
</html>
