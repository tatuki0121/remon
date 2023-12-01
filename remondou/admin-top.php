<?php session_start(); ?>
<?php require 'db-connect.php'; ?>
<?php $css = 'admin-top.css'; ?>
<?php require 'admin-header.php'; ?>
<h1>USER Management</h1>
<hr>

<form action="admin-user-delete.php" method="post">
    <input type="submit" value="ユーザー情報削除"><br>
</form>


<h1>Commodity Management</h1>
<hr>
<form action="admin-shohinitiran.php" method="post">
    <input type="submit" value="商品管理"><br>
</form>

<?php require 'footer.php'; ?>