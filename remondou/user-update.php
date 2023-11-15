<?php session_start(); ?>
<?php require 'db-connect.php'; ?>
<?php
$emasagge='';
$id;
$mail;
$pass;
if(isset($_POST['send'])){
    // DB問合せ
    $pdo = new PDO($connect,USER,PASS);
    $sql1 = $pdo->prepare("select * from user where mail=?");
    //$sql3 = $pdo->prepare("select user_id from user where mail=? and pass=?");

    $sql1->execute([$_POST['rmail']]);
    //$sql3->execute([$_POST['rmail'],$_POST['rpass']]);

    $data1 = $sql1->fetchAll();
    //$data3 = $sql3->fetchAll();

    foreach($data1 as $row){
        $id = $row['user_id'];
        $mail = $row['mail'];
        $pass = $row['pass'];
    }
    if($_POST['rmail'] != '' && strlen($_POST['rpass']) > 5){
        if(empty($data1) || ($mail == $_SESSION['user']['mail'] && 
        password_verify($_POST['rpass'],password_hash($_SESSION['user']['pass'],PASSWORD_DEFAULT)) == false)){
             // 存在しない場合、セッションに再登録して確認画面へ遷移 header(location)
        $_SESSION['ruser']=[
            'rmail' => $_POST['rmail'],'rpass' => $_POST['rpass'],
        ];
        header('Location: user-update-d.php');
        exit();
        }else{
            $ifdata = password_verify($_POST['rpass'],password_hash($_SESSION['user']['pass'],PASSWORD_DEFAULT));
            if($mail == $_SESSION['user']['mail'] &&  $ifdata == true){
                //ユーザー情報が更新されていなかった場合
                $emasagge = 'パスワードを変更してください。';
            }else if(!empty($data1) && $id != $_SESSION['user']['user_id']){
                //メールアドレスが既に使用されていた場合
                $emasagge = '入力されたメールアドレスは既に使用されています。';
            }
        }
    }else{
        //エラー項目の確認
        if($_POST['rmail'] == ''){
           //メールアドレスが空の場合
           $emasagge = 'メールアドレスを入力してください。';
       }else if($_POST['rpass'] == '' && isset($_POST['rmail'])){
           //パスワードが空の場合
           $emasagge = 'パスワードを入力してください。';
       }else if(strlen($_POST['rpass']) < 6 && isset($_POST['rmail'])){
           //パスワードが6文字未満の場合
           $emasagge = 'パスワードは６文字以上に設定してください。';
       }
    }
     // 存在してる場合→エラーメッセージ　画面はこのまま     ]
     require 'header.php';
     require 'nav.php';
     echo 'ユーザー情報更新';
     echo '<form action="user-update.php" method="post">';
     echo '<p>メールアドレス<input type="text" name="rmail" value="',$_POST['rmail'],'"></p>';
     echo '<p>パスワード<input type="text" name="rpass" value="',$_POST['rpass'],'"></p>';
     echo $emasagge;
     echo '<br>';
     echo '<input type="submit" value="登録" name="send">';
     echo '</form>';
}else{
    require 'header.php';
    require 'nav.php';
    echo 'ユーザー情報更新';
    echo '<form action="user-update.php" method="post">';
    echo '<p>メールアドレス<input type="text" name="rmail" value="',$_SESSION['user']['mail'],'"></p>';
    echo '<p>パスワード<input type="text" name="rpass" value="',$_SESSION['user']['pass'],'"></p>';
    echo '<input type="submit" value="登録" name="send">';
    echo '</form>';
}
?>
<?php require 'footer.php'; ?>