<?php session_start(); ?>
<?php require 'header.php'; ?>
<?php require 'nav.php'; ?>
<?php
unset($_SESSION['item'][$_GET['id']]);
echo 'カートから商品を削除しました。';
?>
<?php
echo '<form action = "cart.php">';
echo '<input type = "submit" value = "カートに戻る">';
echo '</form>';
echo '<form action = "top.php">';
echo '<input type = "submit" value = "TOPに戻る">';
echo '</form>';
<?php require 'footer.php'; ?>