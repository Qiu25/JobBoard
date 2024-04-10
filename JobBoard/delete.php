<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="delete.css">
</head>
<div class="container">
    <?php
        require('conn.php');
        $id = $_GET['id'];

        echo '<p>確認是否刪除?</p>';
        echo '<a class="deleteCheck" href="delete.php?del_check=y&id='.$id.'">是</a>';
        echo '<a class="deleteCheck" href="delete.php?del_check=n&id=">否</a>';  
        
        echo '<br>';

        if($_GET){
            if($_GET['del_check'] == 'y'){
                $sql = "DELETE FROM jobs WHERE id = " . $_GET['id'];
    
                if($conn->query($sql)){
                    echo '刪除成功，即將頁面轉跳';
                    echo '<br>';
                    die('<meta http-equiv="refresh" content="5; url=./admin.php"> ');
                }else{
                    echo 'fail';
                }
            }elseif($_GET['del_check'] == 'n'){
                die('<meta http-equiv="refresh" content="0; url=./admin.php"> ');
            }
        }
        
    ?>
</div>