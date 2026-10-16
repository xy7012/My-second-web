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
    <h1 align='center'>新增</h1>
    <form action="" method="post">
        <table border='1'>
            <tr>
                <td>图片名称</td>
                <td><input type="text" name="img_name" required></td>
            </tr>
            <tr>
                <td>名称</td>
                <td><input type="text" name="name_name" required></td>
            </tr>
            <tr>
                <td>描述</td>
                <td><textarea name="txt" rows="5" cols="35" required></textarea></td>
            </tr>
        </table>
        <input type="submit" value="确定新增" name='add'>
    </form>
    
    <!-- 没有预览时显示的返回按钮 -->
    <button id="backButtonBeforePreview">返回</button>
    
    <!-- 新增加载状态显示区域 -->
    <div id="loadingMsg" class="loading" style="display: none;">
        正在新增......
    </div>
    
    <!-- 新增预览区域（初始为空，提交后动态生成内容） -->
    <div id="preview" class="opus">
        <ul></ul> <!-- 初始无任何子元素 -->
    </div>
    
    <!-- 预览显示时显示的返回按钮，初始隐藏 -->
    <button id="backButtonAfterPreview" style="display: none;">返回</button>

    <?php
    if (isset($_POST['add'])) {
        $img_name = $_POST['img_name'];
        $name_name = $_POST['name_name'];
        $txt = $_POST['txt'];

        // 在 PHP 层面再次验证输入是否为空
        if (empty($img_name) || empty($name_name) || empty($txt)) {
            echo '<script>
                const alertDiv = document.createElement("div");
                alertDiv.className = "alert";
                alertDiv.textContent = "所有字段必须填写！";
                document.body.appendChild(alertDiv);

                setTimeout(function() {
                    alertDiv.remove();
                }, 2000);
            </script>';
        } else {
            $img_name = htmlentities($img_name, ENT_QUOTES, 'UTF-8');
            $name_name = htmlentities($name_name, ENT_QUOTES, 'UTF-8');
            $txt = htmlentities($txt, ENT_QUOTES, 'UTF-8');
            
            // 执行插入操作
            $sql_add_opus = "INSERT INTO `opus` (`image`, `name` ,`txt`) VALUES ('$img_name', '$name_name','$txt');";
            $sql_add_opus=mysqli_real_escape_string($conn,$sql_add_opus);
            $rsl_add_opus = $conn->query($sql_add_opus);
            
            if ($rsl_add_opus) {
                $sql_new_img = "SELECT * FROM opus WHERE name='$name_name'";
                $sql_new_img=mysqli_real_escape_string($conn,$sql_new_img);
                $rsl_new_img = $conn->query($sql_new_img);
                $data_new_img = $rsl_new_img->fetch_assoc();
                
                // 生成前端动态渲染代码
                echo '<script>
                    // 创建提示元素
                    const alertDiv = document.createElement("div");
                    alertDiv.className = "alert";
                    alertDiv.textContent = "新增成功！";
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
    }
    ?>

    <script>
        // 返回按钮点击事件
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