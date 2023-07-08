<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./css/login.css">
    <script src="./jqurey/jquery3.6.3.js"></script>
    <script>
        function changing() {
            document.getElementById('img').
            src = "test1.php?" + Math.random();
        }
    </script>
</head>

<body background="./img/login/bg.jpg">
    <div class=box id="regbox">
        <div class=title>
            <h2>用户登录</h2>
        </div>
        <form action="login.php" method="post">
            <table class=login>
                <tr>
                    <th>用户名<span style="color:red">*</span></th>
                    <td><input type="text" name="username" /></td>
                </tr>
                <tr style="position: relative; top:21px;">
                    <th>密码<span style="color:red">*</span></th>
                    <td><input type="password" name="password" /></td>
                </tr>
                <tr style="position: relative; top:35px;">
                    <th>验证码<span style="color:red">*</span></th>
                    <td>
                        <input type="text" name="yzm">
                    </td>
                </tr>
                <tr style="position: relative; top:40px;">
                    <td></td>
                    <td>
                        <span id="s11"><img src="test1.php" name="img" id="img"></span>
                        <a href="#" id="aa" onclick="changing()">换一张</a>
                    </td>
                </tr>
                <tr style="position: relative; top:45px;">
                    <th></th>
                    <td><input type="submit" value="登录" name="submit" class="reg-btn" />
                        <a href="register.php"><input type="button" value='前往注册' class="reg-btn"></a>
                    </td>
                </tr>
            </table>
        </form>
    </div>
</body>

</html>

<?php
session_start();
$link = mysqli_connect('localhost', 'root', '', 'user');
mysqli_query($link, "SET NAMES 'utf8'");
if (!$link) {
    exit('数据库连接失败!'); //数据库失败报错
}

if (isset($_POST['submit'])) {
    $username = $_POST["username"];
    $password = $_POST["password"];
    //下面的if如果不加strlen(trim($_POST['']))，无法执行else部分的语句
    if (!empty($username) || !empty($password)) {
        if (isset($_POST['yzm'])) {
            $checkstr = $_POST['yzm'];
            $captcha = $_SESSION['captcha'];
            if (strcmp($checkstr, $captcha)) {
                echo "<script>alert('验证码错误,请重新登录');</script>";
            } else {
                $username = $_POST["username"];
                $pwd = $_POST["password"];
                //echo $username,$pwd;
                $sql = "select * from user where username='$username' and password='$pwd';";
                $result = mysqli_query($link, $sql);
                $row = mysqli_num_rows($result);
                if (!$row) {
                    echo "<script>alert('账号不存在或密码错误,请检查账号和密码或者点击前往注册');</script>";
                } else {
                    if ($username == 'admin') {
                        echo "<script>alert('即将进入管理页面');location='manage.php'</script>";
                    } else {
                        if($username=='admin1'){
                        $_SESSION['username']=$username;
                        echo "<script>alert('即将进入管理页面');location='db_connect.php'</script>";
                    }else
                        echo "<script>alert('欢迎');location='index.php'</script>";
                    }
                }
            }
        } else {
            echo "<script>alert('请输入验证码！');</script>";
        }
    } else {
        //如果用户名或密码为空执行下面的语句
        echo "<script>alert('请完整输入用户名和密码!');</script>";
    }
}
?>