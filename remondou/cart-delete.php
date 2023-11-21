<?php session_start(); ?>
<?php require 'header.php'; ?>
<?php require 'nav.php'; ?>
<?php
unset($_SESSION['item'][$_GET['id']]);
echo 'カートから商品を削除しました。';
?>
<?php
echo '<form action = "cart.php" method="post">';
echo '<input type = "submit" value = "カート一覧画面に戻る">';
echo '</form>';
echo '<form action = "top.php" method="post">';
echo '<input type = "submit" value = "トップ画面に戻る">';
echo '</form>';
?>
<?php require 'footer.php'; ?>