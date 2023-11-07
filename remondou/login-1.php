<?php require 'db-connect.php'; ?>
<?php require 'header.php'; ?>
<?php require 'nav.php'; ?>
<h1>ログイン</h1>
<p>会員の方は登録時に入力されたE-mailとパスワードでログインしてください。</p>
<form action="top.php" method="post">
    メールアドレス　<input type="text" name="mail"><br>
    パスワード　<input type="password" name="password"><br>
    <input type="submit" value="ログイン">
    <?php
    if(!isset($_SESSION['user'])){
    echo 'メールアドレスまたはパスワードが違います。';
    }else if (empty($mail) || empty($password)) {
        echo "メールアドレスとパスワードは必須項目です。";
    }
    ?>
</form>
<form action="sign-up-1.php" method="post">
    <input type="submit" value="新規会員登録">
</form>
<?php require 'footer.php'; ?>