<?php session_start();?>
<?php $css = 'logout-output-user.css';?>
<?php require 'header.php'; ?>
<?php
if(isset($_SESSION['user'])){
     unset($_SESSION['user']); 
     echo '<p>ログアウト完了しました。</p>'; 
    }else{ 
        echo'<p>すでにログアウトしています。</p>';
     }
     ?>
<form action="login-1.php">
<p><input type="submit" value="ログイン画面へ"></p>
</form>
<?php require 'footer.php'; ?>