<?php session_start();?>
<?php require 'header.php'; ?>
<?php require 'nav.php'; ?>
<?php
if(isset($_SESSION['user'])){
     unset($_SESSION['user']); 
     echo '<p>ログアウト完了しました。</p>'; 
    }else{ 
        echo'<p>すでにログアウトしています。</p>';
     }
     ?>
<link rel="stylesheet" href="css/logout-output-user.css">
<form action="login-1.php">
<p><input type="submit" value="ログイン画面へ"></p>
</form>
<?php require 'footer.php'; ?>