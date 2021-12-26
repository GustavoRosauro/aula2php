<?php
    require_once('connection.php');
    $id = $_GET['id'];
    $stmt = $pdo->prepare('delete from alunos where id = :id');
    $stmt->execute(array(
        ':id'=>$id
    ));
    header('Location: consultaal.php');