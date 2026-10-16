<?php
    include("../conn/conn.php");
    include("header.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>匠造之法</title>
    <link rel="stylesheet" href="../css/practice.css">
</head>
<body>
    <div class="zzbz">
        <div class="zz">
            <div class="wenan">
                <div class="bjtp">
                    <h1>草木淬匠魂</h1>
                </div>
                <p class="top">“杀青、揉捻、发酵、焙火……茶从不急于完成自己。”</p>
                <p class="sj">铁锅中的翻炒，是茶青与高温的共舞；竹筛上的轻揉，是力道与柔情的博弈；炭火旁的守候，是耐心与时间的私语。代代相传的技艺，无需精密仪器，只凭掌心感知湿度，眼眸捕捉色泽，呼吸丈量火候。</h4>
                <p class="lef">——每一道工序，都是匠人与茶的无声契约。</p>
            </div>
            <div class="sp">
                <div class="bk">
                    <video src="../video/3.mp4" controls></video>
                </div>
            </div>
                <?php 
                $sql_knowledge="SELECT * FROM knowledge";
                $rsl_knowledge=$conn->query($sql_knowledge);
                if($rsl_knowledge->num_rows>0){
                    while($data=$rsl_knowledge->fetch_assoc()){
                ?>
                <div class="value-card">
                    <h3><?php echo $data['name'];?></h3>
                    <p><?php echo $data['mean'];?></p>
                </div>
                <?php 
                    }
                }?>
        </div>
        <div class="container-tp">
        <!-- 第一列 -->
        <div class="col1">
            <div class="box top"><img src="../images/practice-cc.jpg" alt="茶叶晾晒"></div>
            <div class="box bottom"><img src="../images/practice-fj.jpg" alt="茶叶烘干"></div>
        </div>
        
        <!-- 第二列 -->
        <div class="col2">
            <div class="box top"><img src="../images/practice-caic.jpg" alt="采摘茶叶"></div>
            <div class="box bottom"><img src="../images/practice-sc.jpg" alt="炒制茶叶"></div>
        </div>
        
        <!-- 第三列 -->
        <div class="col3">
            <div class="box top"><img src="../images/practice-rc.jpg" alt="揉捻茶叶"></div>
            <div class="box bottom"><img src="../images/practice-zc.jpg" alt="压制茶饼"></div>
        </div>
    </div>
    </div>
    <?php
        include("footer.html");
    ?>
</body>
</html>