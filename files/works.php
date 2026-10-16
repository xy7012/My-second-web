<?php
// 开启输出缓冲
ob_start();
session_start();
include("../conn/conn.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="icon" href="../images/logo.png" sizes="32x32">
    <link rel="stylesheet" href="../css/works.css">
    <title>薪火传茶</title>
    <?php if (!isset($_SESSION['username'])): ?>
        <script>
            function showLoginAlert() {
                // 创建提示元素
                const alertDiv = document.createElement('div');
                alertDiv.className = 'alert'; // 简化CSS类名
                alertDiv.textContent = '请先登录后再发表评论，正在跳转登录页面...';
                // 插入到页面
                document.body.appendChild(alertDiv);
                // 2秒后执行跳转
                setTimeout(() => {
                    window.location.href = "LAR.php";
                }, 2000);
                return false;
            }

            // 统一事件处理函数（绑定到提交按钮）
            function handleCommentClick() {
                if (!<?php echo isset($_SESSION['username']) ? 'true' : 'false'; ?>) {
                    showLoginAlert();
                    return false;
                }
                return true;
            }
        </script>
    <?php else: ?>
        <script>
            function handleCommentClick() {
                return true;
            }
        </script>
    <?php endif; ?>
</head>
<body>
    <button id="backToTop" title="回到顶部">
        <img src="../images/wd.png" alt="返回顶部按钮">
    </button>
    <header class="header">
        <div class="logo-container">
            <a href="../index.php" class="logo-container-a"><i class="fas fa-home"></i></a>
            <span class="logo-text">中国茶·千年韵</span>
        </div>
        <div class="search-container">
            <form class="search-box" method="post">
                <a href="search.php">
                    <input type="search" class="search-input" placeholder="搜索..." aria-label="搜索" name='search'>
                    <button type="submit" class="search-button">
                        <svg class="search-icon" viewBox="0 0 24 24">
                            <path d="M15.5 14h-.79l-.28-.27C15.41 12.59 16 11.11 16 9.5 16 5.91 13.09 3 9.5 3S3 5.91 3 9.5 5.91 16 9.5 16c1.61 0 3.09-.59 4.23-1.57l.27.28v.79l5 4.99L20.49 19l-4.99-5zm-6 0C7.01 14 5 11.99 5 9.5S7.01 5 9.5 5 14 7.01 14 9.5 11.99 14 9.5 14z" />
                        </svg>
                    </button>
                </a>
            </form>
        </div>
        <nav class="nav-links">
            <a href="../files/LAR.php"><i class="fas fa-bounce">登陆/注册</i></a>
            <i class="fa-solid fa-list-ul"></i>
        </nav>
    </header>
    <section class="banner-section">
        <div class="text-box">
            <h2>
                <span class="text-1">豆香兰韵</span>
                <br>
                <span class="text-2">扁形，乾隆钦点御茶</span>
            </h2>
        </div>
        <div class="right-text">
            <h1>
                <span class="rain-text">西湖龙井</span>
                <br>
                <span class="sub-text">龙井浮春一盏霞</span>
            </h1>
        </div>
        <div class="text-bottem">
            <h1>一杯茶，品人生沉浮；平常心，造万千世界。</h1>
        </div>
    </section>
    <div class="nav">
        <ul>
            <li style="--index:0">
                <a href="../index.php">
                    <span class="fh"><i class="fas fa-home"></i></span>
                    <span class="text">茶韵千年</span>
                </a>
            </li>
            <li style="--index:1">
                <a href="history.php">
                    <span class="fh"><i class="fa-solid fa-book"></i></span>
                    <span class="text">茶史溯源</span>
                </a>
            </li>
            <li style="--index:2">
                <a href="practice.php">
                    <span class="fh"><i class="fas fa-mortar-pestle"></i></span>
                    <span class="text">匠造之法</span>
                </a>
            </li>
            <li style="--index:3">
                <a href="category.php">
                    <span class="fh"><i class="fas fa-leaf"></i></span>
                    <span class="text">茶类浩瀚</span>
                </a>
            </li>
            <li style="--index:2">
                <a href="opus.php">
                    <span class="fh"><i class="fa-solid fa-seedling"></i></span>
                    <span class="text">薪火传茶</span>
                </a>
            </li>
            <li style="--index:2">
                <a href="user.php">
                    <span class="fh"><i class="fa-solid fa-user"></i></span>
                    <span class="text">个人中心</span>
                </a>
            </li>
        </ul>
    </div>
    <div class="kg"></div>
    <button onclick="goBack()" id="back">
        <img src="../images/back.png" alt="返回">
    </button>
    <?php
    $id = $_GET['id'];
    $sql_works = "SELECT * FROM opus WHERE id='$id'";
    $rsl_works = $conn->query($sql_works);
    $data = $rsl_works->fetch_assoc();
    ?>

    <div class="more">
        <h1><?php echo $data['name']; ?></h1>
        <img src="../images/<?php echo $data['image']; ?>" alt="">
        <p style="font-size:25px"><?php echo $data['txt']; ?></p>
    </div>
    <!-- <input type="button" value="返回" onclick="back()"> -->
    <script type="text/javascript">
        function back(){
            window.history.back();
        }
    </script>
    <?php
    // 处理表单提交（使用预处理语句防注入）
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (!isset($_SESSION['username'])) {
            die("请先登录后再发表评论");
        }
        if (!empty($_POST['comment'])) {
            $username = $_SESSION['username'];
            $comment = $_POST['comment'];

            // 预处理语句插入评论（包含time字段）
            $sql_comment = "INSERT INTO comments (name, txt, time) VALUES ('$username', '$comment', NOW())";
            $rsl_comment = $conn->query($sql_comment);
            if ($rsl_comment) {
                header("Location: works.php?id={$id}"); // 提交后刷新当前作品页
                // 清空输出缓冲区并关闭
                ob_end_clean();
                exit;
            }
        }
    }

    // 获取评论数据（按time倒序排序）
    $comments = array();
    $query = "SELECT * FROM comments ORDER BY time DESC";
    $result = $conn->query($query);
    if ($result) {
        while ($txt = $result->fetch_assoc()) {
            $comments[] = $txt;
        }
        mysqli_free_result($result);
    } else {
        die("获取评论失败: " . $conn->error);
    }
    mysqli_close($conn);
    ?>

    <div class="comment-section">
        <div class="comment-form">
            <h2>发表评论</h2>
            <form method="POST">
                <div class="form-group">
                    <label>评论内容：</label>
                    <textarea name="comment" rows="4" required></textarea> <!-- 移除冗余事件绑定 -->
                </div>
                <div class="tjpl"><button type="submit" onclick="return handleCommentClick()">提交评论</button></div> <!-- 事件绑定到按钮 -->
            </form>
        </div>

        <div class="comments-list">
            <h2>最新评论</h2>
            <?php if (empty($comments)): ?>
                <p>暂无评论。</p>
            <?php else: ?>
                <?php foreach ($comments as $comment): ?>
                    <div class="comment">
                        <div class="comment-header">
                            <span class="comment-author"><?= htmlspecialchars($comment['name']) ?></span>
                            <!-- 格式化时间为YYYY/MM/DD HH:mm:ss -->
                            <span class="comment-time"><?= date('Y/m/d H:i:s', strtotime($comment['time'])) ?></span>
                        </div>
                        <p><?= nl2br(htmlspecialchars($comment['txt'])) ?></p>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </div>

    <?php
    include("footer.html");
    // 输出缓冲区内容
    ob_end_flush();
    ?>
    <script>
        function goBack() {
            const currentUrl = new URL(window.location.href);
            currentUrl.hash = ''; // 忽略哈希部分
            const currentUrlWithoutHash = currentUrl.href;
            const maxAttempts = 5;
            let attempts = 0;
                
            function isStillOnCurrentPage() {
                const nowUrl = new URL(window.location.href);
                nowUrl.hash = '';
                return nowUrl.href === currentUrlWithoutHash;
            }
        
            function tryBack() {
                attempts++;
                if (attempts > maxAttempts || !isStillOnCurrentPage()) {
                    if (isStillOnCurrentPage()) {
                        window.location.replace('/');
                    }
                    return;
                }
                history.back();
                setTimeout(() => {
                    if (isStillOnCurrentPage()) {
                        tryBack();
                    }
                }, 100);
            }
        
            if (document.referrer) {
                const referrerUrl = new URL(document.referrer);
                referrerUrl.hash = '';
                const currentUrlObj = new URL(currentUrlWithoutHash);
            
                // 情况1：来自登录页
                if (referrerUrl.pathname.includes('LAR.php')) {
                    history.go(-2);
                    setTimeout(() => {
                        if (isStillOnCurrentPage() || new URL(window.location.href).pathname.includes('LAR.php')) {
                            window.location.replace('/');
                        }
                    }, 300);
                }
                // 情况2：referrer与当前页相同（忽略哈希）
                else if (referrerUrl.href === currentUrlObj.href) {
                    tryBack();
                }
                // 情况3：其他内部页面
                else {
                    window.location.replace(document.referrer);
                }
            }
            // 情况4：无referrer或外部来源
            else {
                window.location.replace('/');
            }
        }
        // 显示/隐藏控制
        window.onscroll = function() {
            const btn = document.getElementById('backToTop');
            if (document.documentElement.scrollTop > 200) {
                btn.style.display = "block";
            } else {
                btn.style.display = "none";
            }
        };

        // 平滑滚动
        document.getElementById('backToTop').addEventListener('click', function() {
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });

            // 兼容旧版浏览器的备选方案
            /* const scrollStep = -window.scrollY / (500 / 15);
            const scrollInterval = setInterval(function(){
                if(window.scrollY !== 0) {
                    window.scrollBy(0, scrollStep);
                } else {
                    clearInterval(scrollInterval);
                }
            }, 15); */
        });
        // 添加滚动进度显示
        window.addEventListener('scroll', function() {
            const btn = document.getElementById('backToTop');
            const scrollHeight = document.documentElement.scrollHeight - window.innerHeight;
            const progress = Math.round((window.scrollY / scrollHeight) * 100);
            btn.dataset.progress = progress + '%';
        });
    </script>
</body>
</html>