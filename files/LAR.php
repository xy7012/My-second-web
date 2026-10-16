<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>登录/注册</title>
    <link rel="icon" href="../images/logo.png" sizes="50x50">
    <link rel="stylesheet" href="../css/LAR.css">
</head>

<body>
    <div class="container">
        <!--注册-->
        <div class="container-form container-signup">
            <form action="register.php" method="post" class="form" id="form1">
                <h2 class="form-title">注册账号</h2>
                <input type="text" placeholder="用户名" class="input" name="register_yhm" />
                <input type="password" placeholder="密码(最大长度为10)" class="input" name="register_mm" />
                <button type="submit" class="btn" name="register">注册</button>
            </form>
        </div>
        <!--登录-->
        <div class="container-form container-signin">
            <form action="login.php" method="post" class="form" id="form2">
                <h2 class="form-title">欢迎登录</h2>
                <input type="text" placeholder="用户名" class="input" name="login_yhm" />
                <input type="password" placeholder="密码" class="input" name="login_mm" />
                <a href="404LAR.html" class="link">忘记密码?</a>
                <button type="submit" class="btn" name="login">登录</button>
            </form>
        </div>
        <!--叠加层部分-->
        <div class="container-overlay">
            <div class="overlay">
                <div class="overlay-panel overlay-left">
                    <button class="btn" id="signIn">
                        已有账号，直接登录
                    </button>
                </div>
                <div class="overlay-panel overlay-right">
                    <button class="btn" id="signUp">
                        没有账号，点击注册
                    </button>
                </div>
            </div>
        </div>
    </div>
    <script>
        document.addEventListener("DOMContentLoaded", () => {
            const signInBtn = document.querySelector("#signIn");
            const signUpBtn = document.querySelector("#signUp");
            const container = document.querySelector(".container");

            signInBtn.addEventListener("click", () => {
                container.classList.remove("panel-active");
            });

            signUpBtn.addEventListener("click", () => {
                container.classList.add("panel-active");
            });
        });
    </script>
</body>

</html>