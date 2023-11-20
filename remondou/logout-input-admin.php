<?php session_start(); ?>
<p><img src="image/!.jpg"></p>
<p>ログアウトしますか？</p>
<form action="admin-top.php" method="POST">
    <input type="submit" value="トップ画面へ">
</form>
<form action="logout-output-admin.php" method="POST">
    <input type="submit" value="ログアウト">
</form>
<?php require 'footer.php'; ?>