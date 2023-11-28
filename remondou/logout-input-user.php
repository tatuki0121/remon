<?php session_start(); ?>
<?php require 'header.php'; ?>
<?php require 'nav.php'; ?>
<p>ログアウトしますか？</p>
<link rel="stylesheet" href="css/logout-input-user.css">
<form action="logout-output-user.php">
    <p><input type="submit" value="ログアウト"></p>
<?php require 'footer.php'; ?>