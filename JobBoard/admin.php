<?php
    require_once('./conn.php');

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Jobs Board</title>
</head>
<body>
    <div class="container">
        <div class="nav">
            <?php
                // 檢查用戶是否登入
                require_once('./check_login.php');
            ?>
        </div>
        <h1>Jobs Board 後台管理</h1>
        <a href="./add.php">新增職缺</a>
        <div class="job__cards">
            <?php
                $sql = "select * from jobs";
                $result = $conn -> query($sql);
                if($result){
                    while($row = $result -> fetch_assoc()){
                        echo '<div class="job__card">
                                <div class="job__title">
                                    <h2>'.$row['Title'].'</h2>
                                </div>
                                <div class="job__desc">
                                    <p>'.$row['Description'].'</p>
                                </div>
                                <div class="job__salary">
                                    <p>薪資範圍：'.$row['Salary'].'</p>
                                </div>
                                <div class="job__time">
                                    <p>更新日期：'.$row['Created'].'</p>
                                    <p>到期日期：'.$row['Expiry'].'</p>
                                </div>
                                <div class="job__link">
                                    <a href="delete.php?id='.$row["Id"].'">刪除職缺</a>
                                    <a href="update.php?id='.$row["Id"].'">修改職缺</a>
                                </div>
                              </div>';
                    }
                }else{
                    echo $conn->error;
                }
            ?>
        </div>
    </div>
</body>
</html>