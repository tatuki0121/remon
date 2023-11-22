<?php session_start(); ?>
<?php require 'header.php'; ?>
<?php require 'nav.php'; ?>
<?php
if(!isset($_SESSION['item'])){
    $_SESSION['item']=[];
}
$count=0;
if(isset($_SESSION['item'][$id])){
    $count=$_SESSION['item'][$id]['stock'];
}
$_SESSION['item'][$id]=[
    'shohin_id'=>$id,'stock'=>$count+$_POST['stock']
];
echo '<p>カートに商品を追加しました</p>';
echo '<form action="top.php" method="post">';
echo '<p><input type="submit" value="トップ画面へ"></p>';
echo '</form>';
?>
<?php require 'footer.php'; ?>
