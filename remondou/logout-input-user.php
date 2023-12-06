<?php session_start(); ?>
<?php require 'header.php'; ?>
<?php $css = 'logout-input-user.css'; ?>
<?php require 'nav.php'; ?>
<p>ログアウトしますか？</p>
<form action="logout-output-user.php">
    <p><input type="submit" value="ログアウト"></p>
<?php require 'footer.php'; ?>