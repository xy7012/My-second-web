<?php
session_start();
include("../conn/conn.php");

// 检查用户是否已登录
if (!isset($_SESSION['username'])) {
    header("location:LAR.php");
    exit;
}
$username = $_SESSION['username'];

// 密码修改逻辑前置
$showAlertScript = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $oldPassword = $_POST['yuan_passwd'];
    $newPassword = $_POST['new_passwd'];
    $confirmPassword = $_POST['new_passwds'];

    if ($newPassword !== $confirmPassword) {
        $showAlertScript = "<script>showAlert('两次输入的新密码不一致', 'error');</script>";
    } else {
        $sqlCheckOld = "SELECT * FROM login WHERE username='$username' AND passwd='$oldPassword'";
        $resultOld = $conn->query($sqlCheckOld);
        if ($resultOld->num_rows !== 1) {
            $showAlertScript = "<script>showAlert('原密码不正确', 'error');</script>";
        } elseif ($newPassword === $oldPassword) {
            $showAlertScript = "<script>showAlert('新密码不能与原密码一致', 'error');</script>";
        } else {
            $sqlUpdate = "UPDATE login SET passwd='$newPassword' WHERE username='$username'";
            if ($conn->query($sqlUpdate)) {
                $showAlertScript = "<script>showAlert('密码修改成功', 'success');</script>";
            } else {
                $showAlertScript = "<script>showAlert('密码修改失败: " . $conn->error . "', 'error');</script>";
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>个人中心</title>
    <link rel="stylesheet" href="../css/user.css">
    <link rel="icon" href="../images/logo.png" sizes="32x32">
    <script>
        function showAlert(message, type) {
            const alertDiv = document.createElement('div');
            alertDiv.className = 'logout-alert';
            alertDiv.textContent = message;
            alertDiv.style.color = type === 'error' ? 'white' : 'green';
            document.body.appendChild(alertDiv);
            setTimeout(() => {
                alertDiv.remove();
                if (type === 'success') window.location.reload();
                activateSectionByHash();
            }, 2000);
        }

        async function showLogoutAlert() {
            try {
                await fetch('logout.php');
                const alertDiv = document.createElement('div');
                alertDiv.className = 'logout-alert';
                alertDiv.textContent = '正在退出登录……';
                document.body.appendChild(alertDiv);
                setTimeout(() => window.location.href = '../index.php', 2000);
            } catch (error) {
                showAlert('退出失败: ' + error.message, 'error');
            }
        }

        function activateSectionByHash() {
            const hash = window.location.hash || '#personal-info';
            document.querySelectorAll('.content-section').forEach(section => {
                section.classList.toggle('active', section.id === hash.substring(1));
            });
            document.querySelectorAll('.nav-item').forEach(item => {
                item.classList.toggle('active', item.querySelector('a').hash === hash);
            });
        }
    </script>
</head>

<body>
    <?php echo $showAlertScript; ?>
    <button onclick="goBack()" id="back">
        <img src="../images/back.png" alt="返回">
    </button>
    <div class="container">
        <aside class="sidebar">
            <div class="profile">
                <img src="../images/nono/IMG_20250521_185236.jpg" alt="头像" class="avatar">
                <h2 class="username"><?php echo htmlspecialchars($username); ?></h2>
                <p class="user-info">茶烟袅袅迎君至，香气悠悠待客来。</p>
            </div>
            <nav>
                <ul class="nav-menu">
                    <li class="nav-item active" style="cursor: url('../images/cursor.cur'),auto;"><a href="#personal-info" class="nav-link">个人资料</a></li>
                    <li class="nav-item" style="cursor: url('../images/cursor.cur'),auto;"><a href="#account-security" class="nav-link">账户安全</a></li>
                    <li class="nav-item" style="cursor: url('../images/cursor.cur'),auto;"><a href="#my-orders" class="nav-link">作品留言</a></li>
                    <li class="nav-item" style="cursor: url('../images/cursor.cur'),auto;"><a href="#settings" class="nav-link">关于我们</a></li>
                </ul>
            </nav>
        </aside>

        <?php
        $sql_user = "SELECT * FROM login WHERE username='$username'";
        $rsl_user = $conn->query($sql_user);
        if ($rsl_user->num_rows > 0) {
            while ($data = $rsl_user->fetch_assoc()) :
        ?>
                <main class="main-content">
                    <section id="personal-info" class="content-section active">
                        <h2 class="section-title">个人资料</h2>
                        <div class="info-item">
                            <div class="info-label">用户名:</div>
                            <div class="info-content"><?php echo htmlspecialchars($username); ?></div>
                        </div>
                        <div class="info-item">
                            <div class="info-label">密码:</div>
                            <div class="info-content"><?php echo str_repeat('*', strlen($data['passwd'])); ?></div>
                        </div>
                    </section>

                    <section id="account-security" class="content-section">
                        <h2 class="section-title">账户安全</h2>
                        <form id="changePasswordForm" method="post">
                            <div class="info-item">
                                <div class="info-label">原密码</div>
                                <input type="password" class="password-input" placeholder="请输入原密码" required name="yuan_passwd">
                            </div>
                            <div class="info-item">
                                <div class="info-label">新密码</div>
                                <input type="password" class="password-input" placeholder="请输入新密码" required name="new_passwd">
                            </div>
                            <div class="info-item">
                                <div class="info-label">确认密码</div>
                                <input type="password" class="password-input" placeholder="请再次输入新密码" required name="new_passwds">
                            </div>
                            <div class="button-container">
                                <button type="submit" class="save-btn">保存修改</button>
                            </div>
                        </form>
                    </section>

                    <section id="my-orders" class="content-section">
                        <h2 class="section-title">作品留言</h2>
                        <?php
                        $sql_comments = "SELECT * FROM comments WHERE name='$username' ORDER BY time DESC";
                        $rsl_comments = $conn->query($sql_comments);
                        while ($comment = $rsl_comments->fetch_assoc()) :
                        ?>
                            <div class="info-item">
                                <div class="info-label"><?php echo htmlspecialchars($comment['txt']); ?></div>
                                <div class="info-content"><?php echo $comment['time']; ?></div>
                            </div>
                        <?php endwhile; ?>
                    </section>
                    <section id="settings" class="content-section">
                        <h2 class="section-title">关于我们</h2>
                        <div class="info-item">
                            <div class="info-label">网站制作人</div>
                            <div class="info-content">
                                09-戴韵熙
                                11-何聃杨
                            </div>
                        </div>
                        <div class="info-item">
                            <div class="info-label">心路历程</div>
                            <div class="info-content">戴指导有话说：累╯︿╰，非常累，上辈子杀人放火，这辈子做网站赎罪，我真的服了，原计划5月10号左右结束，后面调细节，结果交前还差两个页面，甚至不知道功能好不好使。这辈子都不想做网站了，我收回“好喜欢写网页那种感觉”这句话，当初年少轻狂，不知死活，把错觉当成喜欢，手机才是我的白月光，是我无可替代的白月光，是我一眼千年的初恋，是我这辈子非它不可的爱人。好了，到此为止吧。(￣__￣) . z Z
                            <br>
                            <br>
                            何指导有话说：做网页做到无话可说，好多东西啊w(ﾟДﾟ)w，好多细节啊，有时候设备还不给力，真的很崩溃(＠_＠;)，做多了还容易让人到脑子空空💔。
                            </div>
                        </div>
                    </section>
                </main>
        <?php endwhile;
        } ?>
    </div>

    <div class="logout-container">
        <button onclick="showLogoutAlert()" class="logout" style="cursor: url('../images/cursor.cur'),auto;">退出登录</button>
    </div>
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
                window.location.replace('index.php');
            }
        }
        // 水波纹效果
        document.querySelectorAll('button').forEach(button => {
            button.addEventListener('click', function(e) {
                // 获取按钮的位置信息
                const rect = this.getBoundingClientRect();

                // 计算点击位置相对于按钮的坐标
                const x = e.clientX - rect.left;
                const y = e.clientY - rect.top;

                // 创建水波纹元素
                const ripple = document.createElement('span');
                ripple.classList.add('ripple');

                // 设置水波纹的起始位置
                ripple.style.left = `${x}px`;
                ripple.style.top = `${y}px`;

                // 将水波纹添加到按钮中
                this.appendChild(ripple);

                // 动画结束后移除水波纹元素
                ripple.addEventListener('animationend', () => {
                    ripple.remove();
                });
            });
        });

        function showAlert(message, type) {
            const alertDiv = document.createElement('div');
            alertDiv.className = 'logout-alert';
            alertDiv.textContent = message;
            alertDiv.style.backgroundColor = type === 'error' ? '#ff4444' : '#4CAF50';
            document.body.appendChild(alertDiv);
            setTimeout(() => {
                alertDiv.remove();
                if (type === 'success') window.location.reload();
            }, 2000);
        }

        async function showLogoutAlert() {
            try {
                const response = await fetch('logout.php');
                if (!response.ok) {
                    throw new Error('退出失败');
                }
                showAlert('正在退出登录……', 'success');
                setTimeout(() => window.location.href = '../index.php', 2000);
            } catch (error) {
                showAlert('退出失败: ' + error.message, 'error');
            }
        }

        function activateSectionByHash() {
            const hash = window.location.hash || '#personal-info';
            document.querySelectorAll('.content-section').forEach(section => {
                section.classList.toggle('active', section.id === hash.substring(1));
            });
            document.querySelectorAll('.nav-item').forEach(item => {
                item.classList.toggle('active', item.querySelector('a').getAttribute('href') === hash);
            });
        }

        document.addEventListener('DOMContentLoaded', () => {
            document.querySelectorAll('.nav-link').forEach(link => {
                link.addEventListener('click', (e) => {
                    e.preventDefault();
                    window.location.hash = e.target.getAttribute('href');
                    activateSectionByHash();
                });
            });
            window.addEventListener('hashchange', activateSectionByHash);
            activateSectionByHash();
        });
    </script>
</body>

</html>