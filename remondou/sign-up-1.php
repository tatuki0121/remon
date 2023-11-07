<?php session_start(); ?>
<?php require 'db-connect.php'; ?>
<?php require 'header.php'; ?>
<?php
if(isset($_POST['send'])){
    // DB問合せ
    $pdo = new PDO($connect,USER,PASS);

    if(){
        
    }
    // 存在してる場合→エラーメッセージ　画面はこのまま
    // 存在しない場合、セッションに登録して確認画面へ遷移 header(location)
}
    echo '新規ユーザー登録';
    echo '<form action="sign-up-1.php" method="post">';
    echo '<p>メールアドレス<input type="text" name="mail"></p>';
    echo '<p>パスワード<input type="text" name="pass"></p>';
    echo '<input type="button" value="登録" name="send">';
    echo '</form>';
?>
<?php require 'footer.php'; ?>