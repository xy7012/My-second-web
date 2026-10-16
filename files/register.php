<?php
session_start();
include("../conn/conn.php"); // 包含数据库连接文件

if(isset($_POST['register'])){
    $username = $_POST['register_yhm'];
    $mima = $_POST['register_mm'];

    // 验证用户名和密码是否为空
    if(empty($username) || empty($mima)) {
        echo "<script>alert('用户名和密码不能为空');";
        echo "setTimeout(function(){window.location.href='LAR.php';}, 2000);</script>";
        exit; // 停止后续代码执行
    }

    // 验证用户名和密码长度
    if(strlen($username) > 10 || strlen($mima) > 10) {
        echo "<script>alert('用户名和密码长度不能超过10个字符');";
        echo "setTimeout(function(){window.location.href='LAR.php';}, 2000);</script>";
        exit; // 停止后续代码执行
    }

    // 防止SQL注入（简化版）
    $username = mysqli_real_escape_string($conn, $username);
    $mima = mysqli_real_escape_string($conn, $mima);

    // 检查用户名是否已存在
    $checkSql = "SELECT * FROM login WHERE username='$username'";
    $checkResult = $conn->query($checkSql); 

    if($checkResult->num_rows > 0) {
        echo "<script>alert('用户名已存在');";
        echo "setTimeout(function(){window.location.href='LAR.php';}, 2000);</script>";
        exit; // 停止后续代码执行
    }

    // 插入新用户
    $insertSql = "INSERT INTO login (`power`,`username`, `passwd`) VALUES ('普通用户','$username', '$mima')";

    if($conn->query($insertSql) === TRUE) {
        $_SESSION['username'] = $username; // 注册成功后自动登录
        header("location:user.php");
    } else {
        echo "<script>alert('注册失败，请重试');";
        echo "setTimeout(function(){window.location.href='LAR.php';}, 2000);</script>";
    }
}
$conn->close();
?>