<?php session_start(); ?>
<?php require 'db-connect.php'; ?>
<?php
if(isset($_POST['send'])){
    // DB問合せ
    $pdo = new PDO($connect,USER,PASS);
    $sql = $pdo->prepare("update user set mail=?, pass=?, kousinbi=CURRENT_DATE where user_id=?");
    $sql->execute([$_SESSION['ruser']['rmail'],password_hash($_SESSION['ruser']['rpass'],PASSWORD_DEFAULT),$_SESSION['user']['user_id']]);
    $_SESSION['user']=[
        'mail'=> $_SESSION['ruser']['rmail'],
        'pass'=> $_SESSION['ruser']['rpass']
    ];
    unset($_SESSION['ruser']);
    header('Location: user-update-complete.php');
    exit();
}else if(isset($_POST['return'])){
    header('Location: user-update.php');
}else{
    require 'header.php';
    require 'nav.php';
    echo 'ユーザー情報更新確認';
    echo '<form action="user-update-d.php" method="post">';
    echo '<p>メールアドレス<input type="text" name="mail" value="',$_SESSION['ruser']['rmail'],'" readonly></p>';
    echo '<p>パスワード<input type="text" name="pass" value="',$_SESSION['ruser']['rpass'],'" readonly></p>';
    echo '<input type="submit" value="戻る" name="return">';
    echo '<input type="submit" value="登録" name="send">';
    echo '</form>';
}
?>
</body>
</html>
<?php require 'footer.php'; ?>