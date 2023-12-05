<?php session_start(); ?>
<?php require 'db-connect.php'; ?>
<?php
$emasagge='';
if(!isset($_SESSION['user'])){
    echo 'ログインしていません。ログインしてください';
}else{
    $id=$_SESSION['user']['user_id'];
    $mail=$_SESSION['user']['mail'];
    $pass=$_SESSION['user']['pass'];
    if(isset($_POST['send'])){
        // DB問合せ
        $pdo = new PDO($connect,USER,PASS);
        $sql1 = $pdo->prepare("select * from user where mail=?");
        
        $sql1->execute([$_POST['mail']]);
        
        $data1 = $sql1->fetchAll();
        
        $check;
        $ifdata = password_verify($_POST['pass'],password_hash($_SESSION['user']['pass'],PASSWORD_DEFAULT));
        //メールアドレスの形式確認
        if (preg_match("/^([a-zA-Z0-9])+([a-zA-Z0-9\._-])*@([a-zA-Z0-9_-])+([a-zA-Z0-9\._-]+)+$/", $_POST['mail'])) {
            $check=true;
        } else {
            $check=false;
        }

        foreach($data1 as $row){
            $id = $row['user_id'];
            $mail = $row['mail'];
            $pass = $row['pass'];
        }
        if($check === true && strlen($_POST['pass']) > 5){
            if(empty($data1) || ($mail == $_SESSION['user']['mail'] && $ifdata == false)){
                    // 存在しない場合、セッションに再登録して確認画面へ遷移 header(location)
                $_SESSION['ruser']=[
                    'rmail' => $_POST['mail'],'rpass' => $_POST['pass'],
                ];
                header('Location: user-update-d.php');
                exit();
            }else{
                if($mail == $_SESSION['user']['mail'] &&  $ifdata == true){
                    //ユーザー情報が更新されていなかった場合
                    $emasagge = '情報を変更してください。';
                    $pass = $_POST['pass'];
                }else if(!empty($data1) && $id != $_SESSION['user']['user_id']){
                    //メールアドレスが既に使用されていた場合
                    $emasagge = '入力されたメールアドレスは既に使用されています。';
                    $pass = $_POST['pass'];
                }    
            }
        }else{
            //エラー項目の確認
            if($_POST['mail'] == ''){
                //メールアドレスが空の場合
                $emasagge = 'メールアドレスを入力してください。';
            }else if($_POST['pass'] == '' && isset($_POST['mail'])){
                //パスワードが空の場合
                $emasagge = 'パスワードを入力してください。';
            }else if(strlen($_POST['pass']) < 6 && isset($_POST['mail'])){
                //パスワードが6文字未満の場合
                $emasagge = 'パスワードは６文字以上に設定してください。';
            }else if($check === false){
                //正しいメールアドレスの形式ではない場合
                $emasagge = 'メールアドレスは正しい形式で入力してください。';
            }
            $mail=$_POST['mail'];
            $pass=$_POST['pass'];
        }
    }
    // 存在してる場合→エラーメッセージ　画面はこのまま     ]
    $css = 'user-update.css';
    require 'nav.php';
    echo '<h1><div class="title is-4 mt-6 mb-6">';
    echo 'ユーザー情報更新';
    echo '</div></h1>';
    echo '<div id="box" class="has-background-grey-lighter pt-1 pb-1 is-harfwidth">';
    echo '<table class="mt-6">';
    echo '<form action="user-update.php" method="post">';
    echo '<tr>';
    echo '<th>メールアドレス</th><td><input type="text" name="mail" value="',$mail,'"></td>';
    echo '</tr>';
    echo '<tr>';
    echo '<th>パスワード</th><td><input type="text" name="pass" value="',$pass,'"></td>';
    echo '</tr>';
    echo '</table>';
    echo '</div>';
    echo '<div class="columns is-mobile is-centered">';
    echo '<p class="error has-text-danger is-centered mt-4">',$emasagge,'</p>';
    echo '</div>';
    echo '<div id="button"><input type="submit" value="登録" name="send"></div>';
    echo '</form>';
}
//password_verify($_POST['pass'],password_hash($_SESSION['user']['pass'],PASSWORD_DEFAULT))
?>
<?php require 'footer.php'; ?>