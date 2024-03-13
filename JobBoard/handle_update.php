<?php require('conn.php')?>

<?php
    $title = $_POST['title'];
    $desc = $_POST['description'];
    $salary = $_POST['salary'];
    $link = $_POST['link'];
    $id = $_POST['id'];
    $created = (new DateTime())->format('Y-m-d');
    $expiry = ((new DateTime())->modify('+10 days'))->format('Y-m-d');

    $sql = "UPDATE jobs SET Title = '$title', 
            Description = '$desc', 
            Salary = '$salary',
            Link = '$link',
            Created = '$created',
            Expiry = '$expiry'
            WHERE id = '$id' ";

    if($conn->query($sql)){
        echo "修改成功，即將轉跳。";
        die('<meta http-equiv="refresh" content="5; url=./admin.php"> ');
    }else{
        echo "fail" . $conn->error;
    }
?>