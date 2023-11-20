<?php
$pdo = new PDO($connect, USER, PASS);
$sql = $pdo->prepare('INSERT INTO product (id, name, price) VALUES (?, ?, ?)');
$sql->execute([$_POST['id'], $_POST['name'], $_POST['price']])
?>;