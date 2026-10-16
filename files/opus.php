<?php
session_start();
include("../conn/conn.php");
include("header.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>薪火传茶</title>
    <link rel="stylesheet" href="../css/opus.css">
</head>

<body>
    <div class="wenan">
        <div class="bjtp">
            <h1>传承与新生</h1>
        </div>
        <p class="top">古老的茶篓与科技的实验室相遇，传统炭焙与生态茶园相拥。新一代茶人，用守旧的执著与创新的勇气，让中国茶穿越时空：它可以是匠人手心的粗陶碗，也是都市青年杯中的冷萃香；是外交礼单上的文化名片，也是世界舌尖的东方答案。</p>
    </div>


    <div class="opus">
        <ul>
            <?php
            $sql_opus = "SELECT * FROM opus";
            $rsl_opus = $conn->query($sql_opus);
            if ($rsl_opus->num_rows > 0) {
                while ($data = $rsl_opus->fetch_assoc()) {
                    $shortTxt = mb_substr($data['txt'], 0, 50, 'UTF-8');
                    if (mb_strlen($data['txt'], 'UTF-8') > 50) {
                        $shortTxt .= '...';
                    }
            ?>
                    <li>
                        <a href="works.php?id=<?php echo $data['id']; ?>">
                            <div class="portfolio-item">
                                <div class="item-image">
                                    <img src="../images/<?php echo $data['image']; ?>" alt="作品">
                                </div>
                                <div class="item-content">
                                    <h2 class="item-title"><?php echo $data['name']; ?></h2>
                                    <p class="item-description">
                                        <?php echo $shortTxt; ?>
                                    </p>
                                </div>
                                <a href="works.php?id=<?php echo $data['id']; ?>" class="more-button">更多</a>
                            </div>
                        </a>
                        <?php if (isset($_SESSION['power']) && $_SESSION['power'] == '管理员') { ?>
                            <input type="button" value="修改" class="button-box" onclick="location.href='edit.php?id=<?php echo $data['id']; ?>'">
                            <input type="button" value="删除" class="button-box" onclick="location.href='del.php?id=<?php echo $data['id']; ?>'">
                        <?php } ?>
                    </li>
            <?php
                }
            }
            ?>
        </ul>
    </div>
    <!-- 上传文件 -->
    <input type="submit" value="上传图片" onclick="location.href='404opus.html'" class="shangchuanimage">
    <!-- 增删改 -->
    <?php if (isset($_SESSION['power']) && $_SESSION['power'] == '管理员') { ?>
        <input type="button" value="新增" class="button-box" onclick="location.href='add.php'" style="margin: auto;display:block;">
    <?php } ?>
    <div class="xmkg"></div>
</body>

</html>
<?php include("footer.html"); ?>