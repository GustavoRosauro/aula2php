<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Escola</title>
</head>

<body>
    <?php
        require_once('header.php');
    ?>
    <div class="col-md-4">
    <form action="index.php" method="post">
        <input name="nome" class="form-control" placeholder="informe o nome" />
        <input name="email" class="form-control" placeholder="informe o e-mail" />
        <br>
        <input type="submit" value="salvar" class="btn btn-success btn-sm"/>
    </form>
    </div>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Nome</th>
                <th>Email</th>
            </tr>
        </thead>
        <tbody>
            <?php
            require_once('connection.php');
            $stmt = $pdo->query("select id,nome,email from pessoas");
            while ($linha = $stmt->fetch(PDO::FETCH_ASSOC)) {
                echo        "<tr>
                                <td>{$linha['nome']}</td>
                                <td>{$linha['email']}</td>
                                <td><a href='delete.php?id={$linha['id']}'>remover</a></td>
            </tr>";
            }
            ?>
        </tbody>
    </table>
</body>
<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    require_once('connection.php');
    $stmt = $pdo->prepare('INSERT INTO pessoas (nome,email,datacad) values (:nome,:email,sysdate())');
    $stmt->execute(array(
        ':nome' => $_POST['nome'],
        ':email' => $_POST['email']
    ));
    header('Location: index.php');
}
?>

</html>