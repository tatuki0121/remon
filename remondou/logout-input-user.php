<?php session_start(); ?>
<?php require 'header.php'; ?>
<?php require 'nav.php'; ?>
<p>ログアウトしますか？</p>
<form action="logout-output-user.php">
    <input type="submit" value="ログアウト">
<?php require 'footer.php'; ?>