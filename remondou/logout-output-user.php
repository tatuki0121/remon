<?php session_start();?>
<?php require 'header.php'; ?>
<?php
if(isset($_SESSION['user'])){
    echo 'ログアウト完了しました。';
    unset($_SESSION['user']);
    echo '<form action="login-1.php">';
    echo '<input type="submit" value="ログイン画面へ">';
    echo '</form>'
}
?>
<?php require 'footer.php'; ?>