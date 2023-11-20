<?php session_start();?>
<?php require 'header.php'; ?>
<?php require 'nav.php'; ?>
<?php
if(isset($_SESSION['customer'])){
     unset($_SESSION['customer']); 
     echo 'ログアウト完了しました。'; 
    }else{ 
        echo'すでにログアウトしています。';
     }
     ?>
<form action="login-1.php">
<input type="submit" value="ログイン画面へ">
</form>
<?php require 'footer.php'; ?>