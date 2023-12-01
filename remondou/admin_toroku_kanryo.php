<?php session_start(); ?>
<?php require 'db-connect.php'; ?>
<?php require 'admin-header.php';
if (!isset($_SESSION['name'], $_SESSION['capa'], $_SESSION['dosu'], $_SESSION['price'], $_SESSION['suryo'], $_SESSION['img'], $_SESSION['exp'])) {
    die("初めからやり直してください。<a href='https://aso2201406.penne.jp/remondou/admin_toroku_input.php'>初めからやり直す</a>");
}
// セッション変数からデータを取得
$name = $_SESSION['name'];
$capa = $_SESSION['capa'];
$dosu = $_SESSION['dosu'];
$price = $_SESSION['price'];
$suryo = $_SESSION['suryo'];
$img = $_SESSION['img'];
$exp = $_SESSION['exp'];

// データベースに接続
$pdo = new PDO($connect, USER, PASS);

// データベースに商品を登録するクエリ
$stmt = $pdo->prepare('INSERT INTO shohin (name, exp, volume, alcohol, price, stock, image) VALUES (?, ?, ?, ?, ?, ?, ?)');
$stmt->execute([$name, $exp, $capa, $dosu, $price, $suryo, $img]);

// 商品登録の処理が終わったらセッションを終了
session_destroy();
?>

<h1>商品登録</h1>
<hr>

<?php
if ($stmt->rowCount() > 0) {
    // 登録が成功した場合のメッセージを表示
    echo "商品登録が完了しました";
} else {
    echo "商品登録に失敗しました。";
}
?>
<form action="admin-shohinitiran.php" method="post">
    <input type="submit" name="admin-shohinitiran.php" value="商品一覧に戻る">
</form>