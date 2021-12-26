<?php
    $id = $_GET['id'];
    if($id > 0){
        require_once('connection.php');
        $stmt = $pdo->prepare('delete from pessoas where id = :id');
        $stmt->execute(array(
            'id'=> $id
        ));
    }
    header('Location: index.php');