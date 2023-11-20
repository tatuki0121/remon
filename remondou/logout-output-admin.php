<?php session_start();?>
<?php
if(isset($_SESSION['admin'])){
    unset($_SESSION['admin']);
    echo 'ログアウト完了しました。';
}else{
    echo'すでにログアウトしています。';
}
?>
<form action="admin-login.php">
    <input type="submit" value="ログイン画面へ">
<?php require 'footer.php'; ?>