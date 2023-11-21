<?php session_start(); ?>
<?php require 'header.php'; ?>
<?php require 'nav.php'; ?>
<?php
unset($_SESSION['item'][$_GET['id']]);
echo 'カートから商品を削除しました。';
?>
<?php require 'footer.php'; ?>