<?php
    require_once('./conn.php');
    require_once('./sort.php');
    
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
        <?php
            // 檢查用戶是否登入
            require_once('./check_login.php');
        ?>
        <h1>Jobs Board</h1>
        
        <div class="order">
            <h3>Order By : </h2>
            <?php
                // print_r($_GET);
                // echo '<br><br>';
                if($_GET){
                    if($order == "title"){
                        if($sort !== "ASC"){
                            echo '<a class="sort_asc" href="index.php?order=title&sort=ASC">Title</a>';
                            echo '<a class="sort_asc" href="index.php?order=salary&sort=ASC">Salary</a>';
                            echo '<a class="sort_asc" href="index.php?order=created&sort=ASC">CreatTime</a>';
                        }else{
                            echo '<a class="sort_desc" href="index.php?order=title&sort=DESC">Title</a>';
                            echo '<a class="sort_asc" href="index.php?order=salary&sort=ASC">Salary</a>';
                            echo '<a class="sort_asc" href="index.php?order=created&sort=ASC">CreatTime</a>';
                        }
                    }
                    if($order == "salary"){
                        if($sort !== "ASC"){
                            echo '<a class="sort_asc" href="index.php?order=title&sort=ASC">Title</a>';
                            echo '<a class="sort_asc" href="index.php?order=salary&sort=ASC">Salary</a>';
                            echo '<a class="sort_asc" href="index.php?order=created&sort=ASC">CreatTime</a>';
                        }else{
                            echo '<a class="sort_asc" href="index.php?order=title&sort=ASC">Title</a>';
                            echo '<a class="sort_desc" href="index.php?order=salary&sort=DESC">Salary</a>';
                            echo '<a class="sort_asc" href="index.php?order=created&sort=ASC">CreatTime</a>';
                        }
                    }
                    if($order == "created"){
                        if($sort !== "ASC"){
                            echo '<a class="sort_asc" href="index.php?order=title&sort=ASC">Title</a>';
                            echo '<a class="sort_asc" href="index.php?order=salary&sort=ASC">Salary</a>';
                            echo '<a class="sort_asc" href="index.php?order=created&sort=ASC">CreatTime</a>';
                        }else{
                            echo '<a class="sort_asc" href="index.php?order=title&sort=ASC">Title</a>';
                            echo '<a class="sort_asc" href="index.php?order=salary&sort=ASC">Salary</a>';
                            echo '<a class="sort_desc" href="index.php?order=created&sort=DESC">CreatTime</a>';
                        }
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
                            echo    '<div calss="job__createdby">';
                            echo        '<p>建立人員：'. $row['Founder'] .'</p>';
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