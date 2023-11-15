<?php session_start(); ?>
<?php require 'db-connect.php'; ?>
<?php
$mail='';
$emassage='';
if(isset($_POST['but'])){
    unset($_SESSION['user']);
    if (empty($_POST['mail']) || empty($_POST['pass'])) {
        $emassage= "メールアドレスとパスワードは必須項目です。" ;
    }else{
        $pdo=new PDO($connect, USER, PASS);
        
        //メールアドレスで検索する
        $sql=$pdo->prepare('select * from user where mail=?');
        $sql->execute([$_POST['mail']]);
        
        foreach($sql as $row){
            if(password_verify($_POST['pass'],$row['pass'])){
                //ログイン済みのユーザー情報をセッションに格納
                $_SESSION['user']=['user_id'=>$row['user_id'], 'mail'=>$row['mail'],
                    'pass'=>$_POST['pass'], 'torokubi'=>$row['torokubi'], 'kousinbi'=>$row['kousinbi']];
                    $mail = $row['mail'];
            }
        }
        $hashpass = password_hash($_POST['pass'],PASSWORD_DEFAULT);
        if(empty($mail)){
            $emassage = 'メールアドレスまたはパスワードが違います。';
        }else{
            if(($mail == $_POST['mail']) && ((password_verify($_POST['pass'],$hashpass))) == true ){
                header("Location: top.php");
                exit();
            }else{
                $emassage = 'メールアドレスまたはパスワードが違います。';
            }
        }
    }
    require 'header.php';
    echo '<h1>ログイン</h1>';
    echo $emassage;
    echo '<p>会員の方は登録時に入力されたE-mailとパスワードでログインしてください。</p>';
    echo '<form action="login-1.php" method="post">';
    echo 'メールアドレス　<input type="text" name="mail"><br>';
    echo 'パスワード　<input type="password" name="pass"><br>';
    echo '<p><input type="submit" name="but" value="ログイン"></p>';
    echo '</form>';
    echo '<p>まだ会員登録されていない方</p>';
    echo '<form action="sign-up-1.php" method="post">';
    echo '<input type="submit" value="新規会員登録">';
    echo '</form>';
}else{
    require 'header.php';
    echo '<h1>ログイン</h1>';
    echo '<p>会員の方は登録時に入力されたE-mailとパスワードでログインしてください。</p>';
    echo '<form action="login-1.php" method="post">';
    echo 'メールアドレス　<input type="text" name="mail"><br>';
    echo 'パスワード　<input type="password" name="pass"><br>';
    echo '<p><input type="submit" name="but" value="ログイン"></p>';
    echo '</form>';
    echo '<p>まだ会員登録されていない方</p>';
    echo '<form action="sign-up-1.php" method="post">';
    echo '<input type="submit" value="新規会員登録">';
    echo '</form>';
}
?>
<?php require 'footer.php'; ?>