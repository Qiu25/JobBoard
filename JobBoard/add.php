<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Jobs Board 後台管理 - 新增職缺</title>
</head>
<body>
    <div class="container">
        <?php
            // 檢查用戶是否登入或是畫面導向
            require_once("./check_login.php");
        ?>
        <h1>Jobs Board - 新增職缺</h1>
        <a href="./admin.php">返回後台</a>
        <form method="POST" action="handle_add.php">
            <div>職缺名稱：<input type="text" name="title"></div>
            <div>職缺描述：<textarea rows="10" name="description"></textarea></div>
            <div>薪資範圍：<input type="text" name="salary"></div>
            <div>職缺連結：<input type="link" name="link"></div>
            <input type="submit" value="送出">
        </form>
    </div>
</body>
</html>