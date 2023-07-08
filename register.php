<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./css/login.css">
</head>

<body background="./img/login/bg.jpg">
    <div class="box" id="regbox">
        <div class=title>
            <h2>账号注册</h2>
        </div>
        <form action="register.php" method="post">
            <table class=login>
                <tr style="position: relative; top:25px;">
                    <th>用户名<span style="color:red">*</span></th>
                    <td><input type="text" name="username" /></td>
                </tr>
                <tr style="position: relative; top:40px;">
                    <th>密码<span style="color:red">*</span></th>
                    <td><input type="password" name="password" /></td>
                </tr>
                <tr style="position: relative; top:56px;">
                    <th>确认密码<span style="color:red">*</span></th>
                    <td><input type="password" name="ppassword" /></td>
                </tr>
                <tr style="position: relative; top:80px; left:-15px">
                    <th></th>
                    <td>
                        <input type="submit" value="注册" name="regist" class="reg-btn" />
                        <a href="login.php"><input type="button" value='前去登录' class="reg-btn"></a>
                    </td>
                </tr>
            </table>
        </form>
    </div>
</body>

</html>
<?php
//连接数据库
$link = mysqli_connect('localhost', 'root', '', 'user');
mysqli_query($link, "SET NAMES 'utf8'");
if (!$link) {
    exit('数据库连接失败!'); //数据库失败报错
}
if (isset($_POST['regist'])) {
    if (isset($_POST['username']) && isset($_POST['password']) && isset($_POST['ppassword'])) {
        $username = $_POST["username"];
        $pwd = $_POST["password"];
        $ppwd = $_POST["ppassword"];
        if (strlen(trim($_POST['username'])) && strlen(trim($_POST['password'])) && strlen(trim($_POST['ppassword']))) {
            if ($ppwd == $pwd) {
                $sql = "insert into user values ('$username','$pwd');"; //添加账户的sql语句
                $select = "select username from user where username='$username'"; //查找注册账号的用户名的sql语句
                $result = mysqli_query($link, $select); //执行sql语句
                $row = mysqli_num_rows($result); //返回记录数
                if (!$row) { //记录数不存在则说明该账户没有被注册过
                    if (mysqli_query($link, $sql)) { //insert语句是否成功执行
                        //注册成功，前往登录
                        echo "<script>alert('注册成功，请登录');location='login.php'</script>";
                    } else { //注册失败，重新注册
                        echo "<script>alert('注册失败，请重新注册');location='regsiter.php'</script>";
                    }
                } else { //存在记录数则说明注册的用户已存在
                    echo "<script>alert('该用户已经存在，请直接登录
                    ');location='login.php'</script>";
                }
            } else {
                echo "<script>alert('两次输入的密码不一致，请重新注册');</script>";
            }
        } else {
            echo "<script>alert('账号或密码不能为空!');location='register.php'</script>";
        }
    }
}
?>