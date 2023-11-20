<?php require 'db-connect.php'; ?>
<?php require 'header.php'; ?>
<?php require 'nav.php'; ?>
<?php
    echo '<link rel="stylesheet" href="css/shohinitirankensaku.css">';
    echo '<form action="shohinitirankensaku.php" method="post">';
    echo '<input type="text" name="keyword">';
      
    $alcoholoption=array(3,5,7,9,25);
    echo '<select name="selected_alcohol">';
    echo '<option value="">度数</option>';
    foreach ($alcoholoption as $value) {
    echo '<option value="', $value, '">',  $value, '</option>';
    }
    echo '</select>';
    echo '<input type="submit" value="🔍">';
    echo '</form>';
    echo '<table>';
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

    echo '<tbody>';
    foreach ($sql as $row) {
        echo '<tr>';
        //echo '<td>', '<img src="image/',$row['image'],'"weight="100" height="100"></td>';
        echo '<td><img src="image/', $row['image'], '" width="100" height="100"></td>';
        echo '<td>', '<a href=shohinsyosai.php?id=',$row['shohin_id'],'>', $row['name'],'</a></td>';
        echo '</tr>';
    }
    echo '</tbody>';
    echo '</table>';
  
?>
<?php require 'footer.php';?>
