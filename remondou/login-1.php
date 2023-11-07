<?php session_start(); ?>
<?php require 'db-connect.php'; ?>
<?php require 'header.php'; ?>
<?php require 'nav.php'; ?>
<h1>ログイン</h1>
<p>会員の方は登録時に入力されたE-mailとパスワードでログインしてください。</p>
<form action="top.php" method="post">
    メールアドレス　<input type="text" name="mail"><br>
    パスワード　<input type="password" name="pass"><br>
    <p><input type="submit" value="ログイン"></p>
    <?php
    unset($_SESSION['user']);
    $pdo=new PDO($connect, USER, PASS);
    
    //loginIDで検索する
    $sql=$pdo->prepare('select * from user where login=?');
    $sql->execute([$_POST['login']]);
    
    // echo password_hash( $_POST['password'], PASSWORD_DEFAULT);
    foreach($sql as $row){
        // if(password_verify($_POST['password'], $row['password']) == true){
        if(password_verify($_POST['password'], $row['password']) == true){
            //ログイン済みのユーザー情報をセッションに格納
            $_SESSION['customer']=['id'=>$row['id'], 'name'=>$row['name'], 'address'=>$row['address'], 'login'=>$row['login'], 'password'=>$row['password']];
        }
    }
    if(!isset($_SESSION['user'])){
    echo 'メールアドレスまたはパスワードが違います。';
    }
    if (empty($mail) || empty($pass)) {
        echo "メールアドレスとパスワードは必須項目です。";
    }
    ?>
</form>
<form action="sign-up-1.php" method="post">
    <input type="submit" value="新規会員登録">
</form>
<?php require 'footer.php'; ?>