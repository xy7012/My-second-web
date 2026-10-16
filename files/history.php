<?php
include("../conn/conn.php");
include("header.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>茶史溯源</title>
  <link rel="stylesheet" href="../css/history.css">
</head>

<body>
  <div class="wenan">
    <div class="bjtp">
      <h1>茶史承千年</h1>
    </div>
    <p class="top">一片茶叶，自神农指尖滑落，便写就了五千年的东方诗篇。</p>
    <p class="sj">从《茶经》墨香到丝绸之路驼铃，从唐宋风雅到现代茶席，中国茶，是时光的沉淀，是匠心的凝练，是山水与人文共舞的传奇。</p>
    <p class="lef">——这是自然的馈赠，更是敬畏的起点。</p>
  </div>
  <div class="sp">
    <div class="bk">
      <video src="../video/1.mp4" controls></video>
    </div>
  </div>
  <div style="display: flex; gap: 2rem; padding: 2rem;" class="flex-container">
    <div class="carousel">
      <div class="carousel-items" id="carouselItems">
        <!-- 复制整个图片组 -->
        <div class="carousel-item"><img src="../images/history-sn.jpg" alt="内容1"></div>
        <div class="carousel-item"><img src="../images/history2.jpg" alt="内容2"></div>
        <div class="carousel-item"><img src="../images/history3.jpg" alt="内容3"></div>
        <div class="carousel-item"><img src="../images/history4.jpg" alt="内容4"></div>
        <div class="carousel-item"><img src="../images/history-td.jpg" alt="内容5"></div>
        <div class="carousel-item"><img src="../images/history1.jpg" alt="内容6"></div>
        <div class="carousel-item"><img src="../images/history-yc.jpg" alt="内容7"></div>
        <div class="carousel-item"><img src="../images/history-md.jpg" alt="内容8"></div>
        <div class="carousel-item"><img src="../images/history-qd.jpg" alt="内容9"></div>
        <!-- 复制整个图片组以实现无缝循环 -->
        <div class="carousel-item"><img src="../images/history-sn.jpg" alt="内容1(复制)"></div>
        <div class="carousel-item"><img src="../images/history2.jpg" alt="内容2(复制)"></div>
        <div class="carousel-item"><img src="../images/history3.jpg" alt="内容3(复制)"></div>
        <div class="carousel-item"><img src="../images/history4.jpg" alt="内容4(复制)"></div>
        <div class="carousel-item"><img src="../images/history-td.jpg" alt="内容5(复制)"></div>
        <div class="carousel-item"><img src="../images/history1.jpg" alt="内容6(复制)"></div>
        <div class="carousel-item"><img src="../images/history-yc.jpg" alt="内容7(复制)"></div>
        <div class="carousel-item"><img src="../images/history-md.jpg" alt="内容8(复制)"></div>
        <div class="carousel-item"><img src="../images/history-qd.jpg" alt="内容9(复制)"></div>
      </div>
    </div>
    <div class="timeline">
      <?php
      $sql_history = "SELECT * FROM `history` ORDER BY id;";
      $rsl_history = $conn->query($sql_history);
      if ($rsl_history->num_rows > 0) {
        while ($data = $rsl_history->fetch_assoc()) {
          if ($data['id'] % 2 == 1) {
      ?>
            <div class="timeline-item left">
              <div class="timeline-card">
                <h3><?php echo $data['date']; ?></h3>
                <p><?php echo $data['information']; ?></p>
              </div>
            </div>
          <?php
          } else {
          ?>
            <div class="timeline-item right">
              <div class="timeline-card">
                <h3><?php echo $data['date']; ?></h3>
                <p><?php echo $data['information']; ?></p>
              </div>
            </div>
      <?php
          }
        }
      }
      ?>
    </div>
  </div>
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
</body>

</html>
<?php include("footer.html"); ?>