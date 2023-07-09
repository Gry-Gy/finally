<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>后台管理界面</title>
    <link rel="stylesheet" href="./css/db_connect.css">
    <link rel="stylesheet" href="./css/show_query_result.css">
    <script src="./jqurey/jquery3.6.3.js"></script>
    <script src="./js/db_connect.js" ></script>
    <script>
      
    </script>
</head>
<body>
<div class="container">
    <header class="header">
        <div class="left"> 
            <h2>家电后台管理系统</h2>
        </div>
       <div class="right">
            <div class="hrone">
                <h3>这是gry的数据后台</h3>
            </div>
            <div class="hrtwo">
               <?php
               include "login_name.php";
               ?>
               <a href="login.php">[退出]</a>
            </div>
       </div>
    </header>
    <div class="leftMenu">
        <ul>
            <li class="sum">
                <a href="#">总和</a>
                <span class="arrow"></span>
            </li>
            <li class="form1" id="form1-link"><a href="#">商品信息</a></li>
            <li class="form2" id="form2"><a href="#">全部商品信息</a></li>
            <li class="form3"><a href="#">表单三</a></li>
        </ul>
    </div>
    <div class="mainContent">

        <div class="one">
           <h1>这是购物商场家电的后台数据库管理系统</h1>
        </div>

        <div class="two">
            <?php
                include "goods_manger.php";
            ?>
        </div>

        <div class="three">
            
         <?php
        include "show_query_result.php";
         ?>
         
        </div>

        <div class="four">
        </div>
    </div>
</div>



</body>
</html>
