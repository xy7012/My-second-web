<?php
session_start();

// 检查用户是否已经登录
if (isset($_SESSION['username'])) {
    header("location:user.php");
    exit;
}

// 初始化登录尝试次数
if (!isset($_SESSION['login_attempts'])) {
    $_SESSION['login_attempts'] = 0;
}

// 检查是否处于禁止登录状态
if (isset($_SESSION['blocked_until']) && time() < $_SESSION['blocked_until']) {
    $remaining_time = $_SESSION['blocked_until'] - time();
    echo "<script>alert('登录尝试次数已达到上限，请在 ". $remaining_time ." 秒后再试');";
    echo "setTimeout(function(){window.location.href='LAR.php';}, 2000);</script>";
    exit;
} else {
    // 如果禁止登录时间已过，重置禁止登录状态，但不重置登录尝试次数
    unset($_SESSION['blocked_until']);
}

include("../conn/conn.php"); // 包含数据库连接文件

if (isset($_POST['login'])) {
    $yhm = $_POST['login_yhm'];
    $mima = $_POST['login_mm'];

    // 防止 SQL 注入（简化版）
    $username = mysqli_real_escape_string($conn, $yhm);
    $mima = mysqli_real_escape_string($conn, $mima);

    $sql_login = "SELECT * FROM login WHERE username='$username' AND passwd='$mima'";
    $rsl_login = $conn->query($sql_login);

    if ($rsl_login->num_rows > 0) {
        while ($data = $rsl_login->fetch_assoc()) {
            $_SESSION['username'] = $username;
            $_SESSION['power'] = $data['power'];
        }
        // 登录成功，重置登录尝试次数
        $_SESSION['login_attempts'] = 0;
        header("location:user.php");
        exit;
    } else {
        // 登录失败，增加登录尝试次数
        $_SESSION['login_attempts']++;
        $remaining_attempts = 3 - $_SESSION['login_attempts'];

        if ($remaining_attempts > 0) {
            echo "<script>alert('用户名或密码错误，你还剩 ". $remaining_attempts ." 次尝试机会');";
            echo "setTimeout(function(){window.location.href='LAR.php';}, 2000);</script>";
        } else {
            // 达到最大尝试次数，设置禁止登录 1 分钟
            $_SESSION['blocked_until'] = time() + 60;
            echo "<script>alert('登录尝试次数已达到上限，请在 1 分钟后再试');";
            echo "setTimeout(function(){window.location.href='LAR.php';}, 2000);</script>";
        }
    }
}
?>