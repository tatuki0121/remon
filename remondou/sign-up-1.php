<?php session_start(); ?>
<?php require 'db-connect.php'; ?>
<?php $css= 'sign-up-1.css'; ?>
<?php
$emasagge='';
if(isset($_POST['send'])){
    // DB問合せ
    $pdo = new PDO($connect,USER,PASS);
    $sql2 = $pdo->prepare("select * from user where mail=?");
    $sql2->execute([$_POST['mail']]);
    $data2 = $sql2->fetchAll();
    $check;
    if (preg_match("/^([a-zA-Z0-9])+([a-zA-Z0-9\._-])*@([a-zA-Z0-9_-])+([a-zA-Z0-9\._-]+)+$/", $_POST['mail'])) {
        $check=true;
    } else {
        $check=false;
    }
    if(empty($data2) && ($check === true && strlen($_POST['pass']) > 5)){
        // 存在しない場合、セッションに登録して確認画面へ遷移 header(location)
        $_SESSION['suser']=[
            'mail' => $_POST['mail'],'pass' => $_POST['pass']
        ];
        header('Location: sign-up-2.php');
        exit();
    }else{
        //エラー項目の確認
        if($_POST['mail'] == ''){
            //メールアドレスが空の場合
            $emasagge = 'メールアドレスを入力してください。';
        }else if($check === false){
            $emasagge = 'メールアドレスは正しい形式で入力してください。';
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
        echo '<h1>新規ユーザー登録</h1>';
        echo '<div class="box">';
        echo '<table>'; 
        echo '<form action="sign-up-1.php" method="post">';
        echo '<tr>';
        echo '<th>メールアドレス</th><td><input type="text" name="mail" value="',$_POST['mail'],'"></td>';
        echo '</tr>';
        echo '<tr>';
        echo '<th>パスワード</th><td><input type="text" name="pass" value="',$_POST['pass'],'"></td>';
        echo '</tr>';
        echo '</table>';
        echo '</div>';
        echo '<p class="error">', $emasagge, '</p>';
        echo '<div id="button">';
        echo '<input type="submit" value="登録" name="send">';
        echo '</div>';
    }
}else{
    // 存在してる場合→エラーメッセージ　画面はこのまま     ]

    require 'header.php';
    echo '<h1>新規ユーザー登録</h1>';
    echo '<div class="box">';
    echo '<table>';
    echo '<form action="sign-up-1.php" method="post">';
    echo '<tr>';
    echo '<th>メールアドレス</th><td><input type="text" name="mail"></td>';
    echo '</tr>';
    echo '<tr>';
    echo '<th>パスワード</th><td><input type="password" name="pass"></td>';
    echo '</tr>';
    echo '</table>';
    echo '</div>';
    echo '<div id="button">';
    echo '<input type="submit" value="登録" name="send">';
    echo '</div>';
    echo '</form>';
}
/*if($error['mail'] == 'blank'){
    echo '※メールアドレスを入力してください。';
}*/
/*if($errir['pass'] == 'blank'){
            echo '※パスワードを入力してください。';
        }else if($error['pass'] == 'length'){
            echo '※パスワードは６文字以上に設定してください。';
        }*/
?>
<?php require 'footer.php'; ?>
