<?php
  require_once("./check_login.php");

  $uri = $_SERVER['REQUEST_URI'];


  if(isset($_COOKIE["user_email"])){
    echo "<div class='nav'>";
    echo "<p>Welcome, " . $_COOKIE["user_name"] . "</p>";
    echo "<a href='./add.php'>新增職缺</a>";
    echo "<a href='./index.php'>回到主頁</a>";
    echo "<a href='./admin.php'>進入後台</a>";
    echo "<a href='./logout.php'>帳號登出</a>";
    echo "</div>";
  }else{
    echo "<div class='nav'>
          <a href='./signup.html'>帳號註冊</a>
          <a href='./login.html'>用戶登入</a>
          </div>";
  }

?>