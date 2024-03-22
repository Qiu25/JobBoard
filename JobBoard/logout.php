<?php
  require('conn.php');

  setcookie("user_email", "");
  setcookie("user_name", "");

  echo "登出成功，即將轉跳";
  die('<meta http-equiv="refresh" content="5; url=index.php">');
?>