<?php
     require('conn.php');

     $title = $_POST['title'];
     $desc = $_POST['description'];
     $salary = $_POST['salary'];
     $link = $_POST['link'];
     $created = (new DateTime())->format('Y-m-d');
     $expiry = ((new DateTime())->modify('+10 days'))->format('Y-m-d');

     if(empty($title)|| empty($desc) || empty($salary) || empty($link)){
        echo '因為您的資料有缺<br>';
        echo '網頁將自動轉跳回上一頁<br>';
        die('<meta http-equiv="refresh" content="5; url=./add.html"> ');
     }

     $sql = "INSERT INTO jobs(Title, Description, Salary, Link, Created, Expiry) 
             VALUES('$title', '$desc', '$salary', '$link', '$created', '$expiry')";
 
     $result = $conn->query($sql);

     if($result){
        echo '新增成功<br>';
        echo '<a href="./add.html">回上一頁</a>';
     }else{
        echo '傳輸失敗'.$conn->error;
     }
?>  