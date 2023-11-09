<?php session_start(); ?>
<?php require 'db-connect.php'; ?>
<?php
if(isset($_POST['send'])){
    // DB問合せ
    $pdo = new PDO($connect,USER,PASS);
    $sql = $pdo->prepare("select * from user where mail=? and pass=?");
    $sql->execute([$_POST['mail'],$_POST['pass']]);
    if(empty($sql->fetchAll())){
        // 存在しない場合、セッションに登録して確認画面へ遷移 header(location)
        $_SESSION['user']=[
            'mail' => $_POST['mail'],'pass' => $_POST['pass']
        ];
        header('Location: sign-up-2.php');
    }else{
        // 存在してる場合→エラーメッセージ　画面はこのまま     ]
        require 'header.php';
        echo '新規ユーザー登録';
        echo '<form action="sign-up-1.php" method="post">';
        echo '<p>メールアドレス<input type="text" name="mail"></p>';
        echo '<p>パスワード<input type="password" name="pass"></p>';
        echo '<input type="submit" value="登録" name="send">';
        echo '</form>';
    }
}
?>
<?php require 'footer.php'; ?>