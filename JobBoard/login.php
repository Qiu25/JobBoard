<?php
  require('conn.php');

  // $_SERVER['REQUEST_METHOD'] & isset() 
  if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['login'])){

    $email = $_POST['email'];
    $password = $_POST['password'];
    
    // 驗證是否輸入正確
    if(!$email || !$password){
      die('請輸入信箱或密碼。');
    }
    
    // 查詢資料庫驗證Email是否存在
    $sql = "SELECT `Email`, `Password` FROM `user` WHERE `Email` = '$email'";
    $result = $conn->query($sql);

    // 驗證密碼
    if($result->num_rows > 0){
      $row = $result->fetch_assoc();
      // 驗證成功
      if(password_verify($password, $row["Password"])){
        // 設定Cookie
        setcookie("user_id", $row["Email"], time()+3600);
        
        
        // echo $_COOKIE["user_id"];

        echo "Login Seccessfull";
        die('<meta http-equiv="refresh" content="5; url=index.php">');
      }else{
        echo 'Invalid Password!';
      }
    }else{
      echo 'User Not Found!';
    }
  }else{
    die('<meta http-equiv="refresh" content="1; url=login.html">');
  }
  
?>