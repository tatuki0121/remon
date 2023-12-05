<?php session_start(); ?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/logout-output-admin.css">
    <title>ログアウト</title>
</head>
<body>

<div class="container">
    <?php
    if (isset($_SESSION['admin'])) {
        unset($_SESSION['admin']);
        echo '<div class="logout-message">ログアウト完了しました。</div><br><br>';
    } else {
        echo '<div class="logout-message">すでにログアウトしています。</div><br><br>';
    }
    ?>

    <form action="admin-login.php">
        <input type="submit" value="ログイン画面へ">
    </form>
</div>

<?php require 'footer.php'; ?>

</body>
</html>
