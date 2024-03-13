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
    <link rel="stylesheet" href="./style.css">
    <title>Jobs Board</title>
</head>
<body>
    <div class="container">
        <div class="nav">
            <?php
                // 開啟會話
                session_start();
                // 檢查用戶是否登入
                if(!isset($_SESSION["user_id"])){
                    echo "<a href='./signup.html'>Sign Up</a>
                          <a href='./login.html'>Log In</a>";
                }else{
                    echo "<p>Welcome, " . $_SESSION["user_id"] . "</p>";
                    echo "<a href='./logout.php'>Log Out</a>";
                }
            ?>
        </div>
        <h1>Jobs Board</h1>
        <div class="order">
            <h3>Order By : </h2>
            <?php
            if($_GET){
                if($sort !== "ASC" && $order == "title"){
                    echo '<a class="sort_asc" href="index.php?order=title&sort=ASC">Title</a>';
                }else{
                    echo '<a class="sort_desc" href="index.php?order=title&sort=DESC">Title</a>';
                }
                if($sort !== "ASC" && $order == "salary"){
                    echo '<a class="sort_asc" href="index.php?order=salary&sort=ASC">Salary</a>';
                }else{
                    echo '<a class="sort_desc" href="index.php?order=salary&sort=DESC">Salary</a>';
                }
                if($sort !== "ASC" && $order == "created"){
                    echo '<a class="sort_asc" href="index.php?order=created&sort=ASC">CreatTime</a>';
                }else{
                    echo '<a class="sort_desc" href="index.php?order=created&sort=DESC">CreatTime</a>';
                }
            }else{
                echo '<a class="sort_asc" href="index.php?order=title&sort=ASC">Title</a>'; 
                echo '<a class="sort_asc" href="index.php?order=salary&sort=ASC">Salary</a>';
                echo '<a class="sort_asc" href="index.php?order=created&sort=ASC">CreatTime</a>';
            }

            ?>
        </div>
        <div class="job__cards">
            <?php
                $result = $conn -> query($sql);
                $today = (new DateTime())->format('Y-m-d');
                if($result){
                    while($row = $result -> fetch_assoc()){
                        if(strtotime($today) < strtotime($row['Expiry'])){
                            echo '<div class="job__card">';    
                            echo    '<div class="job__title">';
                            echo        '<h2>'.$row['Title'].'</h2>';
                            echo    '</div>';
                            echo    '<div class="job__desc">';
                            echo        '<p>'.$row['Description'].'</p>';
                            echo    '</div>';
                            echo    '<div class="job__salary">';
                            echo        '<p>薪資範圍：'.$row['Salary'].'</p>';
                            echo    '</div>';
                            echo    '<div class="job__link">';
                            echo        '<a href="'.$row['Link'].'">更多詳情</a>';
                            echo    '</div>';
                            echo    '<div class="job__created">';
                            echo        '<p>更新日期：'. $row['Created'] . '</p>';
                            echo    '</div>';
                            echo '</div>';
                        }
                    }
                }else{
                    echo $conn->error;
                }
            ?>
        </div>
    </div>
</body>
</html>