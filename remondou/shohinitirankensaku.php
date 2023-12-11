<?php require 'db-connect.php'; ?>
<?php $css = 'shohinitirankensaku.css'; ?>
<?php require 'nav.php'; ?>
<?php
    echo '<form action="shohinitirankensaku.php" method="post">';
    echo '<div id="kensaku">'; 
    echo '<input type="text" name="keyword">';
      
    $alcoholoption=array(3,5,7,9,25);
    echo '<select name="selected_alcohol">';
    echo '<option value="">度数</option>';
    foreach ($alcoholoption as $value) {
    echo '<option value="', $value, '">',  $value, '</option>';
    }
    echo '</select>';
    echo '<input type="submit" value="🔍">';
    echo '</div>';
    echo '</form>';
    $pdo = new PDO($connect, USER, PASS);
    if(isset($_POST['keyword'])){
        if(!empty($_POST['keyword']) && !empty($_POST['selected_alcohol'])){
            $sql = $pdo->prepare('SELECT * FROM shohin WHERE name LIKE ? AND alcohol = ?');
            $sql->execute(['%'.$_POST['keyword'].'%', $_POST['selected_alcohol']]);
        }else if(!empty($_POST['keyword']) && empty($_POST['selected_alcohol'])){
            $sql = $pdo->prepare('SELECT * FROM shohin WHERE name LIKE ?');
            $sql->execute(['%'.$_POST['keyword'].'%']);
        }else if(empty($_POST['keyword']) && !empty($_POST['selected_alcohol'])){
            $sql = $pdo->prepare('SELECT * FROM shohin WHERE alcohol = ?');
            $sql->execute([$_POST['selected_alcohol']]);
        }else{
            $sql = $pdo->query('SELECT * FROM shohin');
        }
    }else{
        $sql = $pdo->query('SELECT * FROM shohin');
    }

$cnt = 0;
    foreach ($sql as $row) {
        if( $cnt % 4 == 0 ){
            echo '<div class="columns is-desktop">';
        }
    
        /*
        echo '<div class="card m-5 p-5">';
            echo '<div class="card-header">';
            echo '<div class="card-footer-item">';
            echo '<img src="image/', $row['image'], '" width="100" height="100"><br>';
            echo '<a href=shohinsyosai.php?id=',$row['shohin_id'],'>', $row['name'],'</a>';
            echo '</div>';
            echo '</div>';
        echo '</div>';
        */

echo '
<div class="column">
        <div class="card">
  <header class="card-header">
    <p class="card-header-title">'
    ,$row['name'],
    '</p>
  </header>
  <div class="card-image">
    <figure class="image">
      <img src="image/', $row['image'], '" alt="イメージ">
    </figure>
  </div>
  <div class="card-content">
    <div class="content">
      <strong><a href=shohinsyosai.php?id=',$row['shohin_id'],'>', $row['name'],'はこちら！！</a></strong>
      <br><br>
      ', $row['exp'],'
    </div>
  </div>
  </div>
</div>';
$cnt++;
if( $cnt % 4 == 0 ){
    echo '</div>';
}

    }
?>
<?php require 'footer.php';?>
