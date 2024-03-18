<?php
   require('conn.php');

   if(!isset($_COOKIE["user_id"])){
      die('<meta http-equiv="refresh" content="1; url=index.php">');
   }

   $title = $_POST['title'];
   $desc = $_POST['description'];
   $salary = $_POST['salary'];
   $link = $_POST['link'];
   $created = (new DateTime())->format('Y-m-d');
   $expiry = ((new DateTime())->modify('+10 days'))->format('Y-m-d');

   if(!isset($_COOKIE['user_id'])){
      echo "請先登入會員，頁面即將轉跳";
      die('<meta http-equiv="refresh" content="5; url=./login.html"> ');
   }else{
      $created_by = $_COOKIE['user_id'];
   }

   if(empty($title)|| empty($desc) || empty($salary) || empty($link)){
      echo '因為您的資料有缺<br>';
      echo '網頁將自動轉跳回上一頁<br>';
      die('<meta http-equiv="refresh" content="5; url=./add.html"> ');
   }

   $sql = "INSERT INTO jobs(Title, Description, Salary, Link, Created, Expiry, CreatedBy) 
            VALUES('$title', '$desc', '$salary', '$link', '$created', '$expiry', '$created_by')";

   $result = $conn->query($sql);

   if($result){
      echo '新增成功<br>';
      die('<meta http-equiv="refresh" content="5; url=admin.php">');
   }else{
      echo '傳輸失敗'.$conn->error;
   }
?>  