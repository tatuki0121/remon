<?php session_start(); ?>
<?php require 'db-connect.php'; ?>
<?php
$email='';
$emassage='';
$password='';
if(isset($_POST['but'])){
    unset($_SESSION['admin']);
    if (empty($_POST['mail']) || empty($_POST['pass'])) {
        $emassage= "メールアドレスとパスワードは必須項目です。" ;
    }else{
        $pdo=new PDO($connect, USER, PASS);
        
        //メールアドレスで検索する
        $sql=$pdo->prepare('select * from admin where email=? and password=?');
        $sql->execute([$_POST['mail'],$_POST['pass']]);
        
        foreach($sql as $row){
            if($_POST['pass'] == $row['password'] && $_POST['mail'] == $row['email']){
                //ログイン済みのユーザー情報をセッションに格納
                $_SESSION['admin']=['admin_id'=>$row['admin_id'], 'email'=>$row['email'],
                    'password'=>$row['password'], 'torokubi'=>$row['torokubi'], 'kousinbi'=>$row['kousinbi']];
                    $email = $row['email'];
                    $password = $row['password'];
            }
        }
        if(empty($email)){
            $emassage = 'メールアドレスまたはパスワードが違います。';
        }else{
            if($email == $_POST['mail'] && $_POST['pass'] == $password){
                header("Location: admin-top.php");
                exit();
            }else{
                $emassage = 'メールアドレスまたはパスワードが違います。';
            }
        }
    }
}
require 'admin-login-header.php';
echo '<h1>ログイン</h1>';
echo '<div class="box">';
echo '<table>';
echo '<form action="admin-login.php" method="post">';
echo '<tr>';
echo '<th>メールアドレス</th>　<td><input type="text" name="mail"></td>';
echo '</tr>';
echo '<tr>';
echo '<th>パスワード</th>　<td><input type="password" name="pass"></td>';
echo '</tr>';
echo '</table>';
echo '</div>';
echo '<p class="error">',$emassage, '</p>';
echo '<p><input type="submit" name="but" value="ログイン"></p>';
echo '</form>';

?>
<?php require 'footer.php'; ?>