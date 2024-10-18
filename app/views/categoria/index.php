<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Categorias</title>
</head>
<body>
    <h1>Categorias Cadastradas</h1>

    <?php 
        if(isset($_SESSION['msg_categoria'])): 
            echo $_SESSION['msg_categoria']; 
            unset($_SESSION['msg_categoria']);
        endif;
    ?>

    <table>
        <tr>
            <th>ID</th>
            <th>Categoria</th>
            <th>Descrição</th>
            <th>Opções</th>
        </tr>
        <?php
            
            foreach($categorias as $categoriaDado)
            {
        ?>

        <tr>
            <td><?php echo htmlspecialchars(strip_tags($categoriaDado['id']));?></td>
            
            <td><?php echo htmlspecialchars(strip_tags($categoriaDado['categoria'])); ?></td>
            
            <td><?php echo htmlspecialchars(strip_tags($categoriaDado['descricao'])); ?></td>

            <td>
                <a href="../public/index.php?url=AlterarCategoria&id=<?php echo htmlspecialchars(strip_tags($categoriaDado['id'])); ?>">Alterar</a>/

                <a href="../public/index.php?url=eliminarCategoria&id=<?php echo htmlspecialchars(strip_tags($categoriaDado['id'])); ?>">Eliminar</a>/

                <a href="../public/index.php?url=verCategoria&id=<?php echo htmlspecialchars(strip_tags($categoriaDado['id'])); ?>">Ver</a>
            </td>
        </tr>

        <?php }//fecho foreach ?>

    </table>
</body>
</html>