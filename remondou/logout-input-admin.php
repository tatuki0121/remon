<?php session_start(); ?>


<p><img src="image/!.png" class="centered-image"></p>

<div class = "all">

<div class = "logout">
<p>ログアウトしますか？</p>
</div>
<link rel = "stylesheet" href = "css/logout-input-admin.css">

<div class = "form">
<form action="admin-top.php" method="POST">
    <input type="submit" value="トップ画面へ">
</form>
<form action="logout-output-admin.php" method="POST">
    <input type="submit" value="ログアウト">
</form>
</div>
</div>
<?php require 'footer.php'; ?>