<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>茶韵千年</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="icon" href="../images/logo.png" sizes="32x32">
    <link rel="stylesheet" href="../css/header.css">
</head>

<body>
    <button id="backToTop" title="回到顶部">
        <img src="../images/wd.png" alt="返回顶部按钮">
    </button>
    <header class="header">
        <div class="logo-container">
            <a href="../index.php" class="logo-container-a" style="cursor: url('../images/cursor.cur'),auto;"><i class="fas fa-home"></i></a>
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
            <a href="../files/LAR.php" style="cursor: url('../images/cursor.cur'),auto;"><i class="fas fa-bounce">登陆/注册</i></a>
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
    <script>
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