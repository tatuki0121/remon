<?php session_start(); ?>
<?php require 'db-connect.php'; ?>
<?php
if(isset($_POST['send'])){
    // DB問合せ
    $pdo = new PDO($connect,USER,PASS);
    $sql = $pdo->prepare("update user set mail=?, pass=?, kousinbi=CURRENT_DATE where user_id=?");
    $sql->execute([$_SESSION['ruser']['rmail'],password_hash($_SESSION['ruser']['rpass'],PASSWORD_DEFAULT),$_SESSION['user']['user_id']]);
    $_SESSION['user']['mail'] = $_SESSION['ruser']['rmail'];
    $_SESSION['user']['pass'] = $_SESSION['ruser']['rpass'];
    unset($_SESSION['ruser']);
    header('Location: user-update-completed.php');
    exit();
}else if(isset($_POST['return'])){
    header('Location: user-update.php');
}else{
    $css = 'user-update.css';
    require 'nav.php';
    echo '<h1><div class="title is-4 mt-6 mb-6">ユーザー情報更新確認</h1></div>';
    echo '<div id="box">';
    echo '<table class="mt-6">';
    echo '<form action="user-update-d.php" method="post">';
    echo '<tpppppr>';
    echo '<th>メールアドレス</th><td><input type="text" name="mail" value="',$_SESSION['ruser']['rmail'],'" readonly></td>';
    echo '</tr>';
    echo '<tr>';
    echo '<th>パスワード</th><td><input type="text" name="pass" value="',$_SESSION['ruser']['rpass'],'" readonly></td>';
    echo '</tr>';
    echo '</table>';
    echo '</div>';
    echo '<div class="columns is-mobile is-centered">';
    echo '<p class="mt-5">上記情報を登録してよろしいですか？</p>';
    echo '</div>';
    echo '<div id="button">';
    echo '<input class="mr-6 mt-4" type="submit" value="登録" name="send">';
    echo '<input type="submit" class="ml-6" value="戻る" name="return">';
    echo '</div>';
    echo '</form>';
}
?>
<?php require 'footer.php'; ?>