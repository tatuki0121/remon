<?php session_start(); ?>
<?php require 'db-connect.php'; ?>
<?php
if(isset($_POST['send'])){
    // DB問合せ
    $pdo = new PDO($connect,USER,PASS);
    $sql = $pdo->prepare("update user set mail=?, pass=?, kousinbi=CURRENT_DATE where user_id=?");
    $sql->execute([$_SESSION['user']['mail'],password_hash($_SESSION['user']['pass'],PASSWORD_DEFAULT),$_SESSION['user']['user_id']]);
    $_SESSION['user']=[
        'mail'=> $_SESSION['user']['mail'],
        'pass'=> $_SESSION['user']['pass']
    ];
    unset($_SESSION['user']);
    header('Location: user-update-completed.php');
    exit();
}else if(isset($_POST['return'])){
    header('Location: user-update.php');
}else{
    require 'header.php';
    require 'nav.php';
    echo '<p>ユーザー情報更新確認</p>';
    echo '<form action="user-update-d.php" method="post">';
    echo '<p>メールアドレス<input type="text" name="mail" value="',$_SESSION['user']['mail'],'" readonly></p>';
    echo '<p>パスワード<input type="text" name="pass" value="',$_SESSION['user']['pass'],'" readonly></p>';
    echo '<input type="submit" value="戻る" name="return">';
    echo '<input type="submit" value="登録" name="send">';
    echo '</form>';
}
?>
</body>
</html>
<?php require 'footer.php'; ?>