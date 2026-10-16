<?php include("conn/conn.php");?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>茶韵千年</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="icon" href="images/logo.png" sizes="50x50">
    <link rel="stylesheet" href="css/index.css">        
    </style>
<body>
    <button id="backToTop" title="回到顶部">
        <img src="images/wd.png" alt="返回顶部按钮">
    </button>
    <header class="header">
        <div class="logo-container">
            <a href="index.php" class="logo-container-a" style="cursor: url('images/cursor.cur'),auto;"><i class="fas fa-home"></i></a>
            <span class="logo-text">中国茶·千年韵</span>
        </div>
        <div class="search-container">
            <form class="search-box" action="files/search.php" method="post">
                <a href="files/search.php">
                    <input type="search" class="search-input" placeholder="搜索..." aria-label="搜索" name="search">
                    <button type="submit" class="search-button">
                        <svg class="search-icon" viewBox="0 0 24 24">
                            <path d="M15.5 14h-.79l-.28-.27C15.41 12.59 16 11.11 16 9.5 16 5.91 13.09 3 9.5 3S3 5.91 3 9.5 5.91 16 9.5 16c1.61 0 3.09-.59 4.23-1.57l.27.28v.79l5 4.99L20.49 19l-4.99-5zm-6 0C7.01 14 5 11.99 5 9.5S7.01 5 9.5 5 14 7.01 14 9.5 11.99 14 9.5 14z"/>
                        </svg>
                    </button>
                </a>
            </form>
        </div>
        <nav class="nav-links">
            <a href="files/LAR.php" style="cursor: url('images/cursor.cur'),auto;"><i class="fas fa-bounce">登录/注册</i></a>
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
                <a href="index.php">
                    <span class="fh"><i class="fas fa-home"></i></span>
                    <span class="text">茶韵千年</span>
                </a>
            </li>
            <li style="--index:1">
                <a href="files/history.php">
                    <span class="fh"><i class="fa-solid fa-book"></i></span>
                    <span class="text">茶史溯源</span>
                </a>
            </li>
            <li style="--index:2">
                <a href="files/practice.php">
                    <span class="fh"><i class="fas fa-mortar-pestle"></i></span>
                    <span class="text">匠造之法</span>
                </a>
            </li>
            <li style="--index:3">
                <a href="files/category.php">
                    <span class="fh"><i class="fas fa-leaf"></i></span>
                    <span class="text">茶类浩瀚</span>
                </a>
            </li>
            <li style="--index:2">
                <a href="files/opus.php">
                    <span class="fh"><i class="fa-solid fa-seedling"></i></span>
                    <span class="text">薪火传茶</span>
                </a>
            </li>
            <li style="--index:2">
                <a href="files/user.php">
                    <span class="fh"><i class="fa-solid fa-user"></i></span>
                    <span class="text">个人中心</span>
                </a>
            </li>
        </ul>
    </div>
    <div class="jscwh">
        <div class="video-container">
            <div class="box1">
                <video src="video/6.mp4" controls></video>
            </div>  
            <div class="box2"></div>  
        </div>
        <div class="jsc">
            <h1>茶席方寸，自有天地</h1>
            <p>紫砂壶里乾坤转，</p>
            <p>盖碗起落见禅心。</p>
            <p>看蜷缩的叶在沸水中苏醒、旋转、沉浮，</p>
            <p>茶汤从琥珀色渐染成月色，</p>
            <p>水与器的私语中，</p>
            <p>喧嚣悄然退场，</p>
            <p>只余杯底一朵绽放的春天。</p>
            <p class="ra">——茶是液态的《易经》，一阴一阳在沉浮中见道</p>
        </div>
    </div>
    <div class="container">
        <div class="decorative-block"></div>
        <div class="checkerboard">
            <div class="checkerboard-cell image-cell"">
                <img src="images/index-sj1.jpg" alt="">
            </div>
            <div class="checkerboard-cell bg-primary">
                <p class="stm">《山泉煎茶有怀》</p>
                <p>坐酌泠泠水，看煎瑟瑟尘。</p>
                <p>无由持一碗，寄与爱茶人。</p>
                <p class="leftt">—— 白居易</p>
            </div>
            <div class="checkerboard-cell image-cell"">
                <img src="images/index-sj2.jpg" alt="">
            </div>
            <div class="checkerboard-cell bg-primary">
                <p class="stm">《诗茶》</p>
                <p>茗香凝素纸，小令入茶烹。</p>
                <p>细琢芳菲溢，精雕妙趣生。</p>
                <p class="leftt">—— 李洪岩</p>
            </div>
            <div class="checkerboard-cell bg-primary">
                <p class="stm">《茶》</p>
                <p>清香可醉人，取水试沾唇。</p>
                <p>啜饮如甘露，凡心亦忘尘。</p>
                <p class="leftt">—— 段云</p>
            </div>
            <div class="checkerboard-cell image-cell"">
                <img src="images/index-sj3.jpg" alt="">
            </div>
            <div class="checkerboard-cell bg-primary">
                <p class="stm">《谢徐玑惠茶》</p>
                <p>不拟分奇品，遥将寄野人。</p>
                <p>角开秋月满，香入井泉新。</p>
                <p class="leftt">—— 徐照</p>
            </div>
            <div class="checkerboard-cell image-cell"">
                <img src="images/index-sj4.jpg" alt="">
            </div>
        </div> 
    </div>
    <div class="timeline-container">
        <div class="wenan">
            <div class="bjtp">
                <h1>茶史承千年</h1>
            </div>
            <p class="top">一片茶叶，自神农指尖滑落，便写就了五千年的东方诗篇。</p>
            <p class="sj">从《茶经》墨香到丝绸之路驼铃，从唐宋风雅到现代茶席，中国茶，是时光的沉淀，是匠心的凝练，是山水与人文共舞的传奇。</p]>
            <p class="lef">——这是自然的馈赠，更是敬畏的起点。</p>
        </div>
        <div class="container-one">
            <div class="panel active" style="background-image: url(images/history1.jpg)">
                <h3>宋朝时期</h3>
            </div>
            <div class="panel" style="background-image: url(images/history3.jpg)">
                <h3>元代——赵孟頫《斗茶图》</h3>
            </div>
            <div class="panel" style="background-image: url(images/history-md.jpg)">
                <h3>明朝时期</h3>
            </div>
            <div class="panel" style="background-image: url(images/history-yc.jpg)">
                <h3>元朝时期</h3>
            </div>
            <div class="panel" style="background-image: url(images/history-td.jpg)">
                <h3>唐代——《唐人宫乐图》</h3>
            </div>
        </div>
        <div class="timeline">
        <?php
            $sql_history = "SELECT * FROM `history` ORDER BY id LIMIT 2;";
            $rsl_history = $conn->query($sql_history);
            if ($rsl_history->num_rows > 0) {
                while ($data = $rsl_history->fetch_assoc()) {
        ?>
            <div class="timeline-item">
                <h3><?php echo $data['date'];?></h3>
                <p><?php echo $data['information'];?></p>
            </div>
        <?php
                }
            }
        ?>
        </div>
        <div class="gdxy">
            <div class="btn">
                <a href="files/history.php">更多</a>
            </div>
        </div>
    </div>
    <div class="zz">
        <div class="wenan">
            <div class="bjtp">
                <h1>草木淬匠魂</h1>
            </div>
            <p class="top">“杀青、揉捻、发酵、焙火……茶从不急于完成自己。”</p>
            <p class="sj">铁锅中的翻炒，是茶青与高温的共舞；竹筛上的轻揉，是力道与柔情的博弈；炭火旁的守候，是耐心与时间的私语。代代相传的技艺，无需精密仪器，只凭掌心感知湿度，眼眸捕捉色泽，呼吸丈量火候。</p>
            <p class="lef">——每一道工序，都是匠人与茶的无声契约。</p>
        </div>
        <?php
            $sql_knowledge="SELECT * FROM knowledge LIMIT 3";
            $rsl_knowledge=$conn->query($sql_knowledge);
            if($rsl_knowledge->num_rows>0){
                while($data_history=$rsl_knowledge->fetch_assoc()){
        ?>
            <div class="value-card">
                <h3><?php echo $data_history['name'];?></h3>
                <p><?php echo $data_history['mean'];?></p>
            </div>
        <?php }}?>
        </div>
        <div class="gdxy" style="margin-right: 160px;">
            <div class="btn yd">
                <a href="files/practice.php">更多</a>
            </div>
        </div>
    </div>
    <div class="carousel">
    <div class="carousel-items" id="carouselItems">
        <!-- 复制整个图片组 -->
        <div class="carousel-item"><img src="images/index1.jpg" alt="内容1"></div>
        <div class="carousel-item"><img src="images/index2.jpg" alt="内容2"></div>
        <div class="carousel-item"><img src="images/index3.jpg" alt="内容3"></div>
        <div class="carousel-item"><img src="images/index4.jpg" alt="内容4"></div>
        <div class="carousel-item"><img src="images/index5.jpg" alt="内容5"></div>
        <div class="carousel-item"><img src="images/index6.jpg" alt="内容6"></div>
        <div class="carousel-item"><img src="images/index7.jpg" alt="内容7"></div>
        <div class="carousel-item"><img src="images/index8.jpg" alt="内容8"></div>
        <div class="carousel-item"><img src="images/index9.jpg" alt="内容9"></div>
        <div class="carousel-item"><img src="images/index10.jpg" alt="内容10"></div>
        <!-- 复制整个图片组以实现无缝循环 -->
        <div class="carousel-item"><img src="images/index1.jpg"" alt="内容1(复制)"></div>
        <div class="carousel-item"><img src="images/index2.jpg" alt="内容2(复制)"></div>
        <div class="carousel-item"><img src="images/index3.jpg" alt="内容3(复制)"></div>
        <div class="carousel-item"><img src="images/index4.jpg" alt="内容4(复制)"></div>
        <div class="carousel-item"><img src="images/index5.jpg" alt="内容5(复制)"></div>
        <div class="carousel-item"><img src="images/index6.jpg" alt="内容6(复制)"></div>
        <div class="carousel-item"><img src="images/index7.jpg" alt="内容7(复制)"></div>
        <div class="carousel-item"><img src="images/index8.jpg" alt="内容8(复制)"></div>
        <div class="carousel-item"><img src="images/index9.jpg" alt="内容9(复制)"></div>
        <div class="carousel-item"><img src="images/index10.jpg" alt="内容10(复制)"></div>
    </div>
  </div>
    <footer>
        <p>0911社主办 版权所有：广州市天河区天河职业高级中学 网络2301班 Copyright 0911 Society XINHUANET.com All Rights Reserved.</p>
        <p>---广州市天河职业高级中学©戴韵熙 &^v^& ©何聃杨编辑---</p>
    </footer>
    <div class="dxkg"></div>
</body>
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
<script>
    const carouselItems = document.getElementById('carouselItems');
    let isPaused = false;
    
    // 鼠标悬停暂停/恢复
    carouselItems.addEventListener('mouseenter', () => {
      if (!isPaused) {
        carouselItems.style.animationPlayState = 'paused';
        isPaused = true;
      }
    });
    
    carouselItems.addEventListener('mouseleave', () => {
      if (isPaused) {
        carouselItems.style.animationPlayState = 'running';
        isPaused = false;
      }
    });
</script>
<script>
    window.onload = function() {
        const panels = document.querySelectorAll('.panel')
        panels.forEach(panel => {
            panel.addEventListener('click', () => {
                removeActiveClasses()
                panel.classList.add('active')
            })
        })
        function removeActiveClasses() {
            panels.forEach(panel => {
                panel.classList.remove('active')
            })
        }
    }
</script>
</html>