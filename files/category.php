<?php
include("../conn/conn.php");
include("header.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>茶类浩繁</title>
    <link rel="stylesheet" href="../css/category.css">
</head>

<body>
    <div class="contantion">
        <div class="wenan">
            <div class="bjtp">
                <h1>茶色韵流芳</h1>
            </div>
            <p class="top">一片茶叶，自神农指尖滑落，便写就了五千年的东方诗篇。</p>
            <p class="sj">白瓷盏中，银针亭立如春雪初绽；紫砂壶内，普洱陈香似岁月低吟。轻啜一口，山岚在舌尖苏醒，暖意从喉间漫入心田。 </p>
            <p class="sj">茶道无喧，却让匆忙的现代人听见：“慢，是对生活最郑重的回答。”</p>
            <p class="lef">——舌尖淌过整片森林，喉间沉落一座古寺。</p>
        </div>
        <div class="dakuai">
            <div class="biaoti">
                <h2>传统茶 <span> ——淡中有味茶偏好，清茗一杯情更真。</span></h2>
            </div>
            <div class="category">
                <!-- 卡片 -->
                <?php
                $sql_category = "SELECT * FROM category WHERE variety='传统茶'";
                $rsl_category = $conn->query($sql_category);
                if ($rsl_category->num_rows > 0) {
                    while ($data = $rsl_category->fetch_assoc()) {
                ?>
                        <div class="kapian">
                            <div class="card">
                                <div class="front" style="background: url(../images/<?php echo $data['image']; ?>); background-position: center; background-size: cover;">
                                    <p><?php echo $data['guess']; ?></p>
                                </div>
                                <div class="back">
                                    <div class="hero threeD">
                                        <h2><?php echo $data['cha']; ?></h2>
                                        <div>
                                            <?php echo $data['special']; ?>
                                        </div>
                                    </div>
                                    <div class="desc threeD">
                                        <p class="gvge"><?php echo $data['p']; ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                <?php
                    }
                }
                ?>
            </div>
        </div>
        <div class="dakuai">
            <div class="biaoti">
                <h2 class="zsz">再加工茶 <span> ——炭火焙香，冷泉锁鲜，茶在工艺中重生。</span></h2>
            </div>
            <div class="category">
                <!-- 卡片 -->
                <?php
                $sql_category = "SELECT * FROM category WHERE variety='再加工茶'";
                $rsl_category = $conn->query($sql_category);
                if ($rsl_category->num_rows > 0) {
                    while ($data = $rsl_category->fetch_assoc()) {
                ?>
                        <div class="kapian">
                            <div class="card">
                                <div class="front" style="background: url(../images/<?php echo $data['image']; ?>); background-position: center; background-size: cover;">
                                    <p><?php echo $data['guess']; ?></p>
                                </div>
                                <div class="back">
                                    <div class="hero threeD">
                                        <h2><?php echo $data['cha']; ?></h2>
                                        <div>
                                            <?php echo $data['special']; ?>
                                        </div>
                                    </div>
                                    <div class="desc threeD">
                                        <p class="gvge"><?php echo $data['p']; ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                <?php
                    }
                }
                ?>
            </div>
        </div>
        <div class="dakuai">
            <div class="biaoti">
                <h2 class="zsz">特色茶 <span> ——茶无贵贱，有魂则灵；山不分高低，得韵则名。</span></h2>
            </div>
            <div class="category">
                <!-- 卡片 -->
                <?php
                $sql_category = "SELECT * FROM category WHERE variety='特色茶'";
                $rsl_category = $conn->query($sql_category);
                if ($rsl_category->num_rows > 0) {
                    while ($data = $rsl_category->fetch_assoc()) {
                ?>
                        <div class="kapian">
                            <div class="card">
                                <div class="front" style="background: url(../images/<?php echo $data['image']; ?>); background-position: center; background-size: cover;">
                                    <p><?php echo $data['guess']; ?></p>
                                </div>
                                <div class="back">
                                    <div class="hero threeD">
                                        <h2><?php echo $data['cha']; ?></h2>
                                        <div>
                                            <?php echo $data['special']; ?>
                                        </div>
                                    </div>
                                    <div class="desc threeD">
                                        <p class="gvge"><?php echo $data['p']; ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                <?php
                    }
                }
                ?>
            </div>
        </div>
        <div class="biaoti">
            <h2></h2>
        </div>
    </div>
    <?php
    include("footer.html");
    ?>
</body>

</html>