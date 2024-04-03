<?php
    require('conn.php');
    $id = $_GET['id'];
    $sql = "SELECT * FROM jobs WHERE id = " . $id;
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Jobs Board 後台管理 - 修改職缺</title>
</head>
<body>
    <div class="container">
        <h1>Jobs Board</h1>
        <a href="./admin.php">返回後台</a>
        <form method="POST" action="handle_update.php">
            <div>職缺名稱：<input type="text" name="title" value="<?php echo $row['Title']; ?>"></div>
            <div>職缺描述：<textarea rows="10" name="description"><?php echo $row['Description']; ?></textarea></div>
            <div>薪資範圍：<input type="text" name="salary" value="<?php echo $row['Salary']; ?>"></div>
            <div>職缺連結：<input type="link" name="link" value="<?php echo $row['Link']; ?>"></div>
            <input type="hidden" name="id" value="<?php echo $row['Id'] ?>">
            <input type="submit" value="送出">
        </form>
    </div>
</body>
</html>