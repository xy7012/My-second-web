<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      /* display: flex; */
      justify-content: center;
      align-items: center;
      min-height: 100vh;
      /* background: #222327; */
    }

    .nav ul li a {
      text-decoration: none;
    }

   .nav {
      bottom: 0;
      position: fixed;
      /* position: relative; */
      width: 100%;
      height: 60px;
      background:  #4F9DA6;
      display: flex;
      justify-content: center;
      align-items: center;
      /* border-radius: 10px; */
      justify-content: center;
      align-items: center;
      min-height: 100vh;
    }

   .nav ul {
      display: flex;
      width: 600px;
    }

   .nav ul li {
      height: 60px;
      flex: 1;
      position: relative;
      list-style: none;
      z-index: 2;
      display: flex;
      justify-content: center;
      align-items: center;
    }

   .nav ul li .fh {
      position: relative;
      display: flex;
      justify-content: center;
      align-items: center;
      width: 55px;
      height: 55px;
      border-radius: 50%;
      cursor: pointer;
      transition: 0.5s;
      transition-delay: 0s;
    }

   .nav ul li .fh i {
      color: #222327;
      font-size: 1.5em;
      z-index: 2;
    }

   .nav ul li .fh::before {
      content: "";
      position: absolute;
      bottom: 0;
      left: 50%;
      transform: translateX(-50%);
      width: 100%;
      height: 0;
      background: orange;
      border-radius: 70%;
      transition: 0.5s;
      transition-delay: 0s;
      opacity: 0;
    }

   .nav ul li:hover .fh {
      transform: translateY(-25px);
    }

   .nav ul li:hover .fh i {
      color: white;
    }

   .nav ul li:hover .fh::before {
      height: 100%;
      opacity: 1;
      transition-delay: 0.25s;
    }
    .nav ul li a .text{
      position: absolute;
      color:rgb(0, 0, 0);
      font-weight: 400;
      font-size: 0.7em;
      letter-spacing: 0.05em;
      transition: 0.5s;
      opacity: 0;
      transform: translateY(20px); 
      text-align: center;
    }
    .nav ul li:hover a .text{
      opacity: 1;
      transform:translateY(-20px);
    }
  </style>
</head>

<body>
  <div class="nav">
    <ul>
      <li style="--index:0">
        <a href="../index.php">
          <span class="fh"><i class="fas fa-home"></i></span>
          <span class="text">茶韵千年</span>
        </a>
      </li>
      <li style="--index:1">
        <a href="">
          <span class="fh"><i class="fa-solid fa-book"></i></span>
          <span class="text">茶史溯源</span>
          </a>
      </li>
      <li style="--index:2">
        <a href="../files/practice.php">
          <span class="fh"><i class="fas fa-mortar-pestle"></i></span>
          <span class="text">匠造之法</span>
        </a>
      </li>
      <li style="--index:3">
        <a href="../files/category.php">
          <span class="fh"><i class="fas fa-leaf"></i></span>
          <span class="text">茶类浩瀚</span>
        </a>
      </li>
      <!-- <li style="--index:4">
        <a href="../files/story.php">
          <span class="fh"><i class="fas fa-leaf"></i></span>
          <span class="text">茶人列传</span>
        </a>
      </li> -->
      <li style="--index:2">
        <a href="../files/works.php">
          <span class="fh"><i class="fa-solid fa-seedling"></i></span>
          <span class="text">薪火传茶</span>
        </a>
      </li>
      <li style="--index:2">
        <a href="../files/user.php">
          <span class="fh"><i class="fa-solid fa-user"></i></span>
          <span class="text">个人中心</span>
        </a>
      </li>
    </ul>
  </div>
</body>

</html>
    