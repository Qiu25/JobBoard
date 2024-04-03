<?php
    require_once('./conn.php');
    if($_GET){
        $order = $_GET["order"];
        $sort = $_GET["sort"];
        $sql = "SELECT * from jobs ORDER BY $order $sort";
    }else{
        $sql = "SELECT * from jobs";
    }
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
        <?php
            // 檢查用戶是否登入
            require_once('./check_login.php');
            $user_email = $_COOKIE['user_email'];
        ?>
        <h1>Jobs Board 後台管理</h1>
        <div class="order">
            <h3>Order By : </h2>
            <?php
            if($_GET){
                if($order == "title"){
                    if($sort !== "ASC"){
                        echo '<a class="sort_asc" href="admin.php?order=title&sort=ASC">Title</a>';
                        echo '<a class="sort_asc" href="admin.php?order=salary&sort=ASC">Salary</a>';
                        echo '<a class="sort_asc" href="admin.php?order=created&sort=ASC">CreatTime</a>';
                    }else{
                        echo '<a class="sort_desc" href="admin.php?order=title&sort=DESC">Title</a>';
                        echo '<a class="sort_asc" href="admin.php?order=salary&sort=ASC">Salary</a>';
                        echo '<a class="sort_asc" href="admin.php?order=created&sort=ASC">CreatTime</a>';
                    }
                }
                if($order == "salary"){
                    if($sort !== "ASC"){
                        echo '<a class="sort_asc" href="admin.php?order=title&sort=ASC">Title</a>';
                        echo '<a class="sort_asc" href="admin.php?order=salary&sort=ASC">Salary</a>';
                        echo '<a class="sort_asc" href="admin.php?order=created&sort=ASC">CreatTime</a>';
                    }else{
                        echo '<a class="sort_asc" href="admin.php?order=title&sort=ASC">Title</a>';
                        echo '<a class="sort_desc" href="admin.php?order=salary&sort=DESC">Salary</a>';
                        echo '<a class="sort_asc" href="admin.php?order=created&sort=ASC">CreatTime</a>';
                    }
                }
                if($order == "created"){
                    if($sort !== "ASC"){
                        echo '<a class="sort_asc" href="admin.php?order=title&sort=ASC">Title</a>';
                        echo '<a class="sort_asc" href="admin.php?order=salary&sort=ASC">Salary</a>';
                        echo '<a class="sort_asc" href="admin.php?order=created&sort=ASC">CreatTime</a>';
                    }else{
                        echo '<a class="sort_asc" href="admin.php?order=title&sort=ASC">Title</a>';
                        echo '<a class="sort_asc" href="admin.php?order=salary&sort=ASC">Salary</a>';
                        echo '<a class="sort_desc" href="admin.php?order=created&sort=DESC">CreatTime</a>';
                    }
                }
            }else{
                echo '<a class="sort_asc" href="admin.php?order=title&sort=ASC">Title</a>'; 
                echo '<a class="sort_asc" href="admin.php?order=salary&sort=ASC">Salary</a>';
                echo '<a class="sort_asc" href="admin.php?order=created&sort=ASC">CreatTime</a>';
            }
            ?>
        </div>
        <div class="job__cards">
            <?php
                $sql = "select * from jobs WHERE `Email` = '$user_email'";
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