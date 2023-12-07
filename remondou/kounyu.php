<?php session_start(); ?>
<?php $css = 'kounyu.css'; ?>
<?php
$id = $_GET['id'];
/*
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
*/
if(isset($_POST['nowbuy'])){
    require 'kounyu-kakunin.php';
}else if(isset($_POST['cart-in'])){
    require 'cart-in.php';
}else{
    echo '不正なアクセスです';
}
?>