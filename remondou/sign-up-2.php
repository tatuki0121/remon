<?php session_start(); ?>
<?php require 'db-connect.php'; ?>
<?php $css= 'sign-up-2.css'; ?>
<?php
    if(isset($_POST['send'])){
        // DB問合せ
        $pdo = new PDO($connect,USER,PASS);
        $sql = $pdo->prepare("insert into user (mail,pass,torokubi)values (?,?,CURRENT_DATE)");
        $sql->execute([$_SESSION['suser']['mail'],password_hash($_SESSION['suser']['pass'],PASSWORD_DEFAULT)]);
        unset($_SESSION['suser']);
        header('Location: touroku-kanryou.php');
        exit();
    }else if(isset($_POST['return'])){
        header('Location: sign-up-1.php');
    }else{

        require 'header.php';
        echo '<h1>新規ユーザー登録確認</h1>';
        echo '<div class="box">';
        echo '<table>';
        echo '<form action="sign-up-2.php" method="post">';
        echo '<tr>';
        echo '<th>メールアドレス</th><td><input type="text" name="mail" value="',$_SESSION['suser']['mail'],'" readonly></td>';
        echo '</tr>';
        echo '<tr>';
        echo '<th>パスワード</th><td><input type="text" name="pass" value="',$_SESSION['suser']['pass'],'" readonly></td>';
        echo '</tr>';
        echo '</table>';
        echo '</div>';
        echo '<p class="p1">上記情報を登録してよろしいですか？</p>';
        echo '<div id="button">';
        echo '<input type="submit" value="戻る" name="return">';
        echo '<input type="submit" value="登録" name="send">';
        echo '</div>';
        echo '</form>';
    }
?>
</body>
</html>
<?php require 'footer.php'; ?>