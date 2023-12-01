<?php session_start(); ?>
<?php require 'db-connect.php'; ?>
<?php
$css = 'admin_toroku_kanryo.css';
require 'admin-header.php';
if (
    !isset($_SESSION['item']['name']) && !isset($_SESSION['item']['capa']) && !isset($_SESSION['item']['dosu']) &&
    !isset($_SESSION['item']['price']) && !isset($_SESSION['item']['suryo']) && !isset($_SESSION['item']['img']) &&
    !isset($_SESSION['item']['exp'])
) {
    die("初めからやり直してください。<a href='https://aso2201406.penne.jp/remondou/admin_toroku_input.php'>初めからやり直す</a>");
}
// セッション変数からデータを取得
$name = $_SESSION['item']['name'];
$capa = $_SESSION['item']['capa'];
$dosu = $_SESSION['item']['dosu'];
$price = $_SESSION['item']['price'];
$suryo = $_SESSION['item']['suryo'];
$img = $_SESSION['item']['img'];
$exp = $_SESSION['item']['exp'];

// データベースに接続
$pdo = new PDO($connect, USER, PASS);

// データベースに商品を登録するクエリ
$stmt = $pdo->prepare('INSERT INTO shohin (name, exp, volume, alcohol, price, stock, image) VALUES (?, ?, ?, ?, ?, ?, ?)');
$stmt->execute([$name, $exp, $capa, $dosu, $price, $suryo, $img]);

// 商品登録の処理が終わったらセッションを終了
unset($_SESSION['item']);
?>

<h1>商品登録</h1>
<hr>

<?php
if ($stmt->rowCount() > 0) {
    // 登録が成功した場合のメッセージを表示
    echo "<p>商品登録が完了しました</p>";
} else {
    echo "<p>商品登録に失敗しました。</p>";
}
?>
<form action="admin-shohinitiran.php" method="post">
    <p><input type="submit" name="admin-shohinitiran.php" value="商品一覧に戻る"></p>
</form>