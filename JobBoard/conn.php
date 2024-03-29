<?php
    
    $servername = 'localhost';
    $username = 'Qiu';
    $password = '1234';
    $dbname = 'database';

    $conn = new mysqli($servername, $username, $password, $dbname);

    if(!empty($conn->connect_error)){
        die('conn連線錯誤'.$conn->connect_error.'<br>');
    }
    
?>