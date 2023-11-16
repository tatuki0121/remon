<?php
$id = $_GET['id'];
$_SESSION['item'][$id]=['shohin_id'=>$id,'stock'=>$_POST['stock']];
if(isset($_POST['nowbuy'])){
    require 'kounyu-kakunin.php';
}else if(isset($_POST['cart-in'])){
    require 'cart-in.php';
}else {
    echo '不正なアクセスです';
}
?>