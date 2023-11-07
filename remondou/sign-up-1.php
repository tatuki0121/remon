<?php session_start(); ?>
<?php require 'db-connect.php'; ?>
<?php require 'header.php'; ?>
<?php
    $pdo = new PDO($connect,USER,PASS);
    echo '新規ユーザー登録';
    echo '<form action="sign-up-1.php" method="post">';
    echo '<p>メールアドレス<input type="text" name="mail"></p>';
    echo '<p>パスワード<input type="text" name="pass"></p>';
    echo '<input type="button" value="登録">';
    echo '</form>';
    echo '';
?>
<?php require 'footer.php'; ?>