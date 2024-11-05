<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contas</title>
</head>
<body>
    <h1>Contas Registradas</h1>

    <?php 
        if(isset($_SESSION['msg_conta'])): 
            echo $_SESSION['msg_conta']; 
            unset($_SESSION['msg_conta']);
        endif;
    ?>

    <table>
        <tr>
            <th>Ordem</th>
            <th>Conta</th>
            <th>Valor</th>
            <th>Banco</th>
            <th>Categoria</th>
            <th>Descrição</th>
            <th>Opções</th>
        </tr>
        <?php
            $ordem = 1;
            foreach($contas as $contaDado)
            {
        ?>

        <tr>
            <td><?php echo htmlspecialchars(strip_tags($ordem ++));?></td>
            
            <td><?php echo htmlspecialchars(strip_tags($contaDado['tipo'])); ?></td>

            <td><?php echo htmlspecialchars(strip_tags($contaDado['valor'])); ?></td>

            <td><?php echo htmlspecialchars(strip_tags($contaDado['banco'])); ?></td>

            <td><?php echo htmlspecialchars(strip_tags($contaDado['categoria'])); ?></td>
            
            <td><?php echo htmlspecialchars(strip_tags($contaDado['descricao'])); ?></td>

            <td>
                <a href="../public/index.php?url=AlterarConta&id=<?php echo htmlspecialchars(strip_tags($contaDado['id'])); ?>">Alterar</a>/

                <a href="../public/index.php?url=EliminarConta&id=<?php echo htmlspecialchars(strip_tags($contaDado['id'])); ?>">Eliminar</a>/

                <a href="../public/index.php?url=VerConta&id=<?php echo htmlspecialchars(strip_tags($contaDado['id'])); ?>">Ver</a>
            </td>
        </tr>

        <?php }//fecho foreach ?>

    </table>
</body>
</html>