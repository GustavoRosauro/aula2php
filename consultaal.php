<?php
    require_once('header.php');
    require_once('connection.php');
?>
<table class="table table-striped">
    <thead>
        <tr>
        <th>Matricula</th> 
        <th>Nome</th>
        <th>Email</th> 
        </tr>
    </thead>
    <tbody>
        <?php
            $stmt = $pdo->query('SELECT 
                                        a.id,
                                         a.cadastro matricula,
                                         p.nome,
                                         p.email
                                     FROM alunos a 
                                     INNER JOIN pessoas p ON a.id_pessoa = p.id');
            while($linha = $stmt->fetch(PDO::FETCH_ASSOC)){
                echo "<tr>
                <td>{$linha['matricula']}</td>
                <td>{$linha['nome']}</td>
                <td>{$linha['email']}</td>
                <td><a href=deletealunos.php?id={$linha['id']}>remover</a></td>
                        </tr>";
            }
        ?>
    </tbody>
</table>