<?php session_start(); ?>
<?php require 'db-connect.php'; ?>
<?php require 'admin-header'; ?>
<h1>USER</h1>
<hr>

<form action="user-delete.php" method="post">
    <input type="submit" value="ユーザー情報削除"><br>
</form>


<h1>Commodity Management</h1>
<hr>
<form action="shohin-management.php" method="post">
    <input type="submit" value="商品管理"><br>
</form>

<?php require 'footer.php'; ?>