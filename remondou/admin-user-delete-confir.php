<?php session_start(); ?>
<?php require 'db-connect.php'; ?>
<link rel="stylesheet" href="css/admin-user-delete-confir.css">
<?php

if (isset($_SESSION['admin']) ) {
    $pdo = new PDO($connect, USER, PASS);
    $sql = $pdo->prepare('select * from user where user_id=?');
    $sql->execute([$_POST['user_id']]);
    $result = $sql->fetchAll();

if(isset($_POST['return'])){
    //ユーザー削除画面へ
    header('Location:admin-user-delete.php');
    exit;
}else if(isset($_POST['delete'])){
    //ユーザー削除完了画面へ
    header('Location:user-delete-comp.php');
    exit;
}else{
    require 'admin-header.php';
    echo '<link rel="stylesheet" href="css/admin-user-delete-confir.css">';
    echo '<body>';
    echo '<h1>ユーザー削除確認</h1>';
    echo '<hr>';
    echo '<table>';
    echo '<tr>';
    echo '<th>ユーザーID</th>';
    echo '<th>メールアドレス</th>';
    echo '<th>登録日</th>';
    echo '<th>更新日</th>';

    foreach($result as $row){
        echo '<tr>';
        echo '<td>', $row['user_id'], '</td>';
        echo '<td>', $row['mail'], '</td>';
        echo '<td>', $row['torokubi'], '</td>';
        echo '<td>', $row['kousinbi'], '</td>';
        echo '</tr>';
        $_SESSION['u_delete'] =[
            'user_id'=>$row['user_id']
        ]; 
    }
    echo '</table>';

    echo '上記の情報を削除しますか？';
    
    echo '<td><form action="admin-user-delete-confir.php" method="post">';
    echo '<input type="hidden" name="user_id" value="',$user_id,'">';
    echo '<input type="submit" name="return" value="戻る">';
    echo '<input type="submit" name="delete" value="削除">';
    echo '</form></td>';
    echo '</body>';
    echo '</html>';
}
}else{
    echo 'ログインされていません。';
}
?>