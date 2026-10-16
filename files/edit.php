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
            <h1 align='center'>修改</h1>
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
                <input type="submit" value="确定修改" name='edit'>
            </form>

            <!-- 没有预览时显示的返回按钮 -->
            <button id="backButtonBeforePreview">返回</button>

            <div id="loadingMsg" class="loading" style="display: none;">
                正在修改......
            </div>

            <div id="preview" class="opus">
                <ul></ul> <!-- 初始无任何子元素 -->
            </div>

            <button id="backButtonAfterPreview" style="display: none;">返回</button>

    <?php
        }
    }
    if (isset($_POST['edit'])) {
        $img_name =htmlentities($_POST['img_name']);
        $name_name =htmlentities($_POST['name_name']);
        $txt =htmlentities($_POST['txt']);

        // 执行更新操作
        $sql_update_opus = "UPDATE `opus` SET `image`='$img_name',`name`='$name_name',`txt`='$txt' WHERE id='$id'";
        $sql_update_opus=mysqli_real_escape_string($conn,$sql_update_opus);
        $rsl_update_opus = $conn->query($sql_update_opus);

        if ($rsl_update_opus) {
            $sql_new_img = "SELECT * FROM opus WHERE name='$name_name'";
            $rsl_new_img = $conn->query($sql_new_img);
            $data_new_img = $rsl_new_img->fetch_assoc();

            // 显示加载状态
            echo '<script>
                // 创建提示元素
                const alertDiv = document.createElement("div");
                alertDiv.className = "alert";
                alertDiv.textContent = "修改成功！";
                document.body.appendChild(alertDiv);

                // 2秒后隐藏加载状态，显示预览内容
                setTimeout(function() {
                    // 动态创建预览项
                    const previewUl = document.getElementById("preview").querySelector("ul");
                    const portfolioItem = document.createElement("li");
                    portfolioItem.innerHTML = `
                        <a href="#">
                            <div class="portfolio-item">
                                <div class="item-image">
                                    <img src="../images/' . $data_new_img['image'] . '" alt="">
                                </div>
                                <div class="item-content">
                                    <h2 class="item-title">' . $name_name . '</h2>
                                    <p class="item-description">' . $txt . '</p>
                                </div>
                                <!-- 动态添加“更多”按钮 -->
                                <a href="#" class="more-button">更多</a>
                            </div>
                        </a>
                    `;
                    
                    // 插入预览项
                    previewUl.appendChild(portfolioItem);
                    
                    // 显示预览区域和对应按钮
                    document.getElementById("preview").style.display = "block";
                    document.getElementById("backButtonBeforePreview").style.display = "none";
                    document.getElementById("backButtonAfterPreview").style.display = "block";
                    
                    // 移除提示元素
                    alertDiv.remove();
                }, 2000);
            </script>';
        }
    }
    ?>

    <script>
        // 为两个返回按钮添加点击事件
        document.getElementById('backButtonBeforePreview').addEventListener('click', function() {
            window.history.back();
        });
        document.getElementById('backButtonAfterPreview').addEventListener('click', function() {
            window.history.back();
        });
    </script>
</body>

</html>
<?php include("footer.html"); ?>