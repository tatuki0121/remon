<?php session_start(); ?>
<?php require 'db-connect.php'; ?>
<?php require 'header.php'; ?>
<?php
if(isset($_POST['send'])){
    // DB問合せ
    $pdo = new PDO($connect,USER,PASS);
    $sql = $pdo->prepare("select * from user where mail=? or pass=? ");
    $sql->execute([$_POST['mail'],$_POST['pass']]);
    if(empty($sql->fetchAll())){
        // 存在しない場合、セッションに登録して確認画面へ遷移 header(location)
        $_SESSION['user']=[
            'mail' => $_POST['mail'],'pass' => $_POST['pass']
        ];
        header('Location: https://');
        exit();
    }else{
        // 存在してる場合→エラーメッセージ　画面はこのまま     ]
        echo 'メールアドレスかパスワードが重複しています。';
    }
}
    echo '新規ユーザー登録';
    echo '<form action="sign-up-1.php" method="post">';
    echo '<p>メールアドレス<input type="text" name="mail"></p>';
    echo '<p>パスワード<input type="text" name="pass"></p>';
    echo '<input type="button" value="登録" name="send">';
    echo '</form>';
?>
<?php require 'footer.php'; ?>