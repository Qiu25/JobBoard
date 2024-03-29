<?php
    require('conn.php');

    $id = $_GET['id'];
    
    $sql = "DELETE FROM jobs WHERE id = " . $id;

    if($conn->query($sql)){
        echo '刪除成功，即將頁面轉跳';
        die('<meta http-equiv="refresh" content="5; url=./admin.php"> ');
    }else{
        echo 'fail';
    }
?>