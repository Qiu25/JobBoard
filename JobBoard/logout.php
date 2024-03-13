<?php
  require('conn.php');

  session_start();

  session_destroy();

  echo "登出成功，即將轉跳";
  die('<meta http-equiv="refresh" content="5; url=index.php">');
?>