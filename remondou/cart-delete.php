<?php session_start(); ?>
<?php $css='cart-delete.css'; ?>
<?php require 'nav.php'; ?>
<?php
unset($_SESSION['item'][$_GET['id']]);
echo 'カートから商品を削除しました。';
echo '<div class="has-text-centered mt-6 mb-6 is-size-3">カートから商品を削除しました。</div>';
?>
<?php
echo '<div id="button">';
echo '<form action = "cart.php">';
echo '<input type = "submit" value = "カート一覧に戻る">';
echo '</form>';
echo '<form action = "top.php">';
echo '<input type = "submit" value = " トップ画面に戻る">';
echo '</form>';
echo '</div>';
?>
<?php require 'footer.php'; ?>