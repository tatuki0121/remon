<?php session_start(); ?>
<?php require 'db-connect.php'; ?>
<?php require 'header.php'; ?>
<?php require 'nav.php'; ?>

    <?php
        if(isset($_POST['but'])){
            unset($_SESSION['user']);
            if (empty($_POST['mail']) || empty($_POST['pass'])) {
                echo "メールアドレスとパスワードは必須項目です。";
            }else{
                $pdo=new PDO($connect, USER, PASS);
                
                //メールアドレスで検索する
                $sql=$pdo->prepare('select * from user where mail=?');
                $sql->execute([$_POST['mail']]);
                
                foreach($sql as $row){
                    if(password_verify($_POST['pass'], $row['pass']) == true){
                        //ログイン済みのユーザー情報をセッションに格納
                        $_SESSION['user']=['user_id'=>$row['user_id'], 'mail'=>$row['mail'], 'pass'=>$row['pass'], 'torokubi'=>$row['torokubi'], 'kousinbi'=>$row['kousinbi']];
                    }
                }
                if(isset($_SESSION['user'])){
                    header("Location: top.php");
                    exit();
                }else{
                    echo 'メールアドレスまたはパスワードが違います。';
                }
            }
        }
    ?>
    <h1>ログイン</h1>
    <p>会員の方は登録時に入力されたE-mailとパスワードでログインしてください。</p>
    <form action="login-1.php" method="post">
    メールアドレス　<input type="text" name="mail"><br>
    パスワード　<input type="password" name="pass"><br>
    <p><input type="submit" name="but" value="ログイン"></p>
    </form>
    <p>まだ会員登録されていない方</p>
    <form action="sign-up-1.php" method="post">
        <input type="submit" value="新規会員登録">
    </form>
<?php require 'footer.php'; ?>