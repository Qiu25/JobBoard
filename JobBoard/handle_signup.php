<?php
  require('conn.php');
  
  $email = $_POST['email'];
  $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
  $name = $_POST['name'];
  $telphone = $_POST['telephone'];
  
  if(!$email || !$password || !$name || !$telphone){
    echo '因為您的資料有缺<br>';
    echo '網頁將自動轉跳回上一頁，請重新填寫<br>';
    die('<meta http-equiv="refresh" content="5; url=signup.html"> ');
  }

  $sql = "SELECT * FROM user WHERE `Email` = '$email'";

  $result = $conn->query($sql);
  $row = $result -> fetch_assoc();
  
  if($row > 0){
    echo "這個信箱已經註冊過了。";
    echo '網頁將自動轉跳回上一頁，請重新填寫<br>';
    die('<meta http-equiv="refresh" content="5; url=signup.html"> ');
  }else{
    $sql = "INSERT INTO user(Email, Password, Name, Telephone)
          VALUES('$email', '$password', '$name', '$telphone')";

    $result = $conn->query($sql);

    if($result){
      echo '註冊成功';
      echo '頁面即將轉跳。';
      die('<meta http-equiv="refresh" content="5; url=login.html">');
    }else{
      echo $conn->error;
    }
  }

  

?>