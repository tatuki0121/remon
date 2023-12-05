<?php session_start(); ?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/logout-input-admin.css">
    <title>ログアウト</title>
</head>
<body>

<div class="all">
    <p><img src="image/!.png" class="centered-image"></p>

    <div class="logout">
        <p>ログアウトしますか？</p>
    </div>

    <div class="form">
        <form action="admin-top.php" method="POST">
            <input type="submit" value="トップ画面へ">
        </form>
        <form action="logout-output-admin.php" method="POST">
            <input type="submit" value="ログアウト">
        </form>
    </div>
</div>

<?php require 'footer.php'; ?>

</body>
</html>
