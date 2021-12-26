<?php
    require_once('header.php');
    require_once('connection.php');
?>
<div class="col-md-4">
<form action="alunos.php" method="POST">
<select class="form-control" name="idpessoa">
    <option>selecionar pessoa</option>
<?php
    $stmt = $pdo->query('select id,nome from pessoas');
    while($linha = $stmt->fetch(pdo::FETCH_ASSOC)){
        echo "<option value={$linha['id']}>{$linha['nome']}</option>";
    }
?>
<input class="form-control" name="matricula" placeholder="informe o número da matricula"/>
<br>
<input type="submit" value="salvar" class="btn btn-success btn-sm">
</form>
</select>
</div>
<?php
    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        $stmt = $pdo->prepare('INSERT INTO ALUNOS (cadastro,id_pessoa) values (:cadastro,:id_pessoa)');
        $stmt->execute(array(
            ':cadastro' => $_POST['matricula'],
            ':id_pessoa' => $_POST['idpessoa']
        ));
    }
?>