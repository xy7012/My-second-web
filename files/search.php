<?php
include("../conn/conn.php");
session_start();
?>
<!DOCTYPE html>
<html lang="zh-CN">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>茶韵千年</title>
    <link rel="icon" href="../images/logo.png" sizes="32x32">
    <link rel="stylesheet" href="../css/search.css">
</head>

<body>
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
    </script>
    <button onclick="goBack()" id="back">
        <img src="../images/back.png" alt="返回">
    </button>
    <main class="container">
        <div style="margin-bottom: 20px; font-size: 42px; color: var(--primary-color); font-weight: 500; margin-top: 80px;">
            <img src="../images/logo.png" alt="">
        </div>
        <div class="search-container">
            <form class="search-box" method="post">
                <input type="search" class="search-input" placeholder="搜索..." aria-label="搜索" name="search">
                <button type="submit" class="search-button" name="search_button">
                    <svg class="search-icon" viewBox="0 0 24 24">
                        <path d="M15.5 14h-.79l-.28-.27C15.41 12.59 16 11.11 16 9.5 16 5.91 13.09 3 9.5 3S3 5.91 3 9.5 5.91 16 9.5 16c1.61 0 3.09-.59 4.23-1.57l.27.28v.79l5 4.99L20.49 19l-4.99-5zm-6 0C7.01 14 5 11.99 5 9.5S7.01 5 9.5 5 14 7.01 14 9.5 11.99 14 9.5 14z" />
                    </svg>
                </button>
            </form>
        </div>
    </main>

    <?php if (!isset($_POST['search_button'])) : ?>
        <div class="rsb">
            <h1>作品</h1>
            <?php
            $sql_search = "SELECT * FROM opus ORDER BY id LIMIT 8";
            $sql_search=mysqli_real_escape_string($conn,$sql_search);
            $rsl_search = $conn->query($sql_search);
            if ($rsl_search->num_rows > 0) {
            ?>
                <div class="rank-container">
                    <?php
                    while ($data = $rsl_search->fetch_assoc()) {
                        if ($data['id'] % 2 == 1) { ?>
                            <ul class="rank-list">
                                <li class="rank-item">
                                    <span class="rank-num hot-top3"><?php echo $data['id']; ?></span>
                                    <span class="rank-text">
                                        <a href="works.php?id=<?php echo $data['id']; ?>">
                                            <?php echo $data['name'] ?>
                                        </a>
                                    </span>
                                </li>
                            </ul>
                        <?php } else { ?>
                            <ul class="rank-list">
                                <li class="rank-item">
                                    <span class="rank-num cold-top3"><?php echo $data['id']; ?></span>
                                    <span class="rank-text">
                                        <a href="works.php?id=<?php echo $data['id']; ?>">
                                            <?php echo $data['name'] ?>
                                        </a>
                                    </span>
                                </li>
                            </ul>
                        <?php } ?>
                <?php
                    }
                    echo '</ul></div>';
                }
                ?>
                </div>
            <?php endif; ?>

            <div class="search_alter">
                <?php
                if (isset($_POST['search_button'])) {
                    $search = $conn->real_escape_string($_POST['search']);
                    $sql_search2 = "SELECT * FROM opus WHERE name LIKE '%$search%'";
                    $rsl_search2 = $conn->query($sql_search2);

                    if ($rsl_search2->num_rows > 0) {
                        echo '<ul style="list-style:none; padding:0; max-width:1200px; margin:20px auto;">';
                        while ($data2 = $rsl_search2->fetch_assoc()) {
                            $shortTxt = mb_substr($data2['txt'], 0, 50, 'UTF-8');
                            $shortTxt .= (mb_strlen($data2['txt'], 'UTF-8') > 50) ? '...' : '';
                ?>
                            <li style="margin-bottom: 30px;">
                                <a href="works.php?id=<?php echo $data2['id']; ?>">
                                    <div class="portfolio-item">
                                        <div class="item-image">
                                            <img src="../images/<?php echo $data2['image']; ?>" alt="作品">
                                        </div>
                                        <div class="item-content">
                                            <h2 class="item-title"><?php echo $data2['name']; ?></h2>
                                            <p class="item-description"><?php echo $shortTxt; ?></p>
                                        </div>
                                        <a href="works.php?id=<?php echo $data2['id']; ?>" class="more-button">更多</a>
                                    </div>
                                </a>
                                <?php if (isset($_SESSION['power']) && $_SESSION['power'] == '管理员') : ?>
                                    <div style="margin-top:10px;">
                                        <input type="button" value="修改" onclick="location.href='edit.php?id=<?php echo $data2['id']; ?>'" class="ADE">
                                        <input type="button" value="删除" onclick="location.href='del.php?id=<?php echo $data2['id']; ?>'" class="ADE">
                                    </div>
                                <?php endif; ?>
                            </li>
                <?php
                        }
                        echo '</ul>';
                    } else {
                        echo '<p style="text-align:center; color:#666; margin:50px 0;">未找到相关作品</p>';
                    }
                }
                ?>
            </div>

            <footer class="footer">
                <p>© 0911</p>
            </footer>
</body>

</html>