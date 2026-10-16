<!-- 检查样式 -->
<?php
include("../conn/conn.php");
include("header.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>薪火传茶</title>
    <link rel="stylesheet" href="../css/ADE.css">
</head>

<body>
    <?php
    $id = $_GET['id'];
    $sql_id = "SELECT * FROM opus WHERE id=$id";
    $rsl_id = $conn->query($sql_id);
    if ($rsl_id->num_rows > 0) {
        while ($data = $rsl_id->fetch_assoc()) {
    ?>
            <h1 align='center'>删除</h1>
            <form action="" method="post">
                <table border='1'>
                    <tr>
                        <td>图片名称</td>
                        <td><input type="text" name="img_name" value="<?php echo $data['image']; ?>"></td>
                    </tr>
                    <tr>
                        <td>名称</td>
                        <td><input type="text" name="name_name" value="<?php echo $data['name']; ?>"></td>
                    </tr>
                    <tr>
                        <td>描述</td>
                        <td><textarea name="txt" rows="5" cols="70"><?php echo $data['txt'];?></textarea></td>
                    </tr>
                </table>
                <input type="submit" value="确定删除" name='del'>
            </form>
            <div id="loadingMsg" class="loading" style="display: none;">
                删除成功
            </div>
            <button onclick="back()" id="back">返回</button>

    <?php
        }
    }
    if (isset($_POST['del'])) {
        $img_name = $_POST['img_name'];
        $name_name = $_POST['name_name'];

        // 执行更新操作
        $sql_del_opus = "DELETE FROM `opus` WHERE id='$id'";
        $rsl_del_opus = $conn->query($sql_del_opus);
        if ($rsl_del_opus) {
            echo '<script>
                // 创建提示元素
                const alertDiv = document.createElement("div");
                alertDiv.className = "alert";
                alertDiv.textContent = "删除成功";

                // 插入到页面
                document.body.appendChild(alertDiv);

                // 2秒后执行跳转
                setTimeout(() => {
                    window.location.href = "opus.php"; // 可替换为你需要跳转的页面
                }, 2000);
            </script>';
        }
    }
    ?>
    <script type="text/javascript">
        function back() {
            window.history.back();
        }
    </script>
</body>

</html>
<?php include("footer.html"); ?>