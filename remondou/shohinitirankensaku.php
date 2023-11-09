<?php require 'db-connect.php'; ?>
<?php require 'header.php'; ?>
<?php require 'nav.php'; ?>
<?php
    echo '<table>';
    $pdo = new PDO($connect, USER, PASS);

    if(isset($_POST['keyword'])){
        $keyword = $_POST['keyword'];
        $degree = isset($_POST['degree']) ? $_POST['degree'] : '';  // プルダウンメニューの度数

        if (!empty($degree)) {
            $sql = $pdo->prepare('SELECT * FROM shohin WHERE name LIKE ? AND degree = ?');
            $sql->execute(['%'.$keyword.'%', $degree]);
        } else {
            $sql = $pdo->prepare('SELECT * FROM shohin WHERE name LIKE ?');
            $sql->execute(['%'.$keyword.'%']);
        }
    } else {
        $sql = $pdo->query('SELECT * FROM shohin');
    }

    echo '<tbody>';
    foreach ($sql as $row) {
        echo '<tr>';
        echo '<td>' . $row['image'] . '</td><br>';
        echo '<td>' . $row['name'] . '</td>';
        echo '</tr>';
    }
    echo '</tbody>';
    echo '</table>';
?>

<form action="shohinitirankensaku.php" method="post">
    <input type="text" name="keyword">
    <input type="submit" value="🔍">
    <select>
        <option value="3">3%</option>
        <option value="5">5%</option>
        <option value="7">7%</option>
        <option value="9">9%</option>
    </select>
</form>
<?php require 'footer.php';?>

<?php
    //echo '<table>';
    //$pdo = new PDO($connect,USER,PASS);
    //if(isset($_POST['keyword'])){
        //$sql = $pdo->prepare('select * from shohin where name like ?');
        //$sql->execute(['%'.$_POST['keyword'].'%']);

    //}else{
        //$sql=$pdo->query('select * from shohin');
    //}
    //foreach($sql as $row){
        //$id=$row['shohin_id'];
        //echo '<tr>';
        //echo '<td>',$id, '</td>';
        //echo '<td>';
        //echo '<a href="shohinsyousai.php?shohin_id=',$id,'">',$row['name'],'</a>';
        //echo '</td>';
        //echo '</tr>';
    //}
    //echo '</table>';
?>