<?php session_start(); ?>
<?php require 'db-connect.php'; ?>
<?php require 'admin-header.php'; ?>
<?php
if (isset($_SESSION['admin']) ) {
    $user_id=$_POST['user_id'];
    $pdo = new PDO($connect, USER, PASS);
    //購入表の購入IDを取得
    $sql = $pdo->prepare('select purchase_id from purchase where user_id=?');
    $sql->execute([$user_id]);
    $history = $sql->fetchAll();   //削除ユーザが購入した購入履歴（複数あり）

    //購入詳細の削除
    $sql = $pdo->prepare('delete from purchase_detail where purchase_id=?');
    foreach($history as $value){
        $sql->execute([$value['purchase_id']]);
    }
    //購入表から削除
    $sql = $pdo->prepare('delete from purchase where user_id=?');
    $sql->execute([$user_id]);

    //ユーザーの削除命令文（ユーザー表）
    $sql = $pdo->prepare('delete from user where user_id=?');
    $sql->execute([$user_id]);
}
?>
<body>
<h1>ユーザー一覧</h1>
<hr>
<p>ユーザー削除完了しました</p>
<form action="admin-user-delete.php">
    <input type="submit" value="ユーザー一覧に戻る">
</form>
<form action="admin-top.php">
    <input type="submit" value="管理者トップに戻る">
</form>
</body>
</html>