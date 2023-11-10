<?php session_start(); ?>
<?php require 'db-connect.php'; ?>
<?php
$emasagge='';
if(isset($_POST['send'])){
    // DB問合せ
    $pdo = new PDO($connect,USER,PASS);
    $sql1 = $pdo->prepare("select * from user where mail=? and pass=?");
    $sql2 = $pdo->prepare("select * from user where mail=?");
    $sql1->execute([$_POST['mail'],$_POST['pass']]);
    $sql2->execute([$_POST['mail']]);
    $data2 = $sql2->fetchAll();
    if((empty($sql1->fetchAll()) && empty($data2)) && ($_POST['mail'] != '' && strlen($_POST['pass']) > 5)){
        // 存在しない場合、セッションに登録して確認画面へ遷移 header(location)
        $_SESSION['user']=[
            'mail' => $_POST['mail'],'pass' => $_POST['pass']
        ];
        header('Location: sign-up-2.php');
        exit();
    }else{
        //エラー項目の確認
        if($_POST['mail'] == ''){
            //メールアドレスが空の場合
            $emasagge = 'メールアドレスを入力してください。';
        }else if($_POST['pass'] == '' && isset($_POST['mail'])){
            //パスワードが空の場合
            $emasagge = 'パスワードを入力してください。';
        }else if(strlen($_POST['pass']) < 6 && isset($_POST['mail'])){
            //パスワードが6文字未満の場合
            $emasagge = 'パスワードは６文字以上に設定してください。';
        }else if(!empty($data2)){
            //メールアドレスが既に使用されていた場合
            $emasagge = '入力されたメールアドレスは既に使用されています。';
        }
         // 存在してる場合→エラーメッセージ　画面はこのまま     ]
        require 'header.php';
        echo '新規ユーザー登録';
        echo '<form action="sign-up-1.php" method="post">';
        echo '<p>メールアドレス<input type="text" name="mail" value="',$_POST['mail'],'"></p>';
        echo '<p>パスワード<input type="text" name="pass" value="',$_POST['pass'],'"></p>';
        echo $emasagge;
        echo '<br>';
        echo '<input type="submit" value="登録" name="send">';
        echo '</form>';
    }
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
?>
<?php require 'footer.php'; ?>
