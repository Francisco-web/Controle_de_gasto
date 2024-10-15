<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Categorias</title>
</head>
<body>
    <h1>Categorias Cadastradas</h1>

    <table>
        <tr>
            <th>ID</th>
            <th>Categoria</th>
            <th>Descrição</th>
        </tr>
        <?php
            
            foreach($categorias as $categoriaDado)
            {
        ?>

        <tr>
            <td><?php echo htmlspecialchars(strip_tags($categoriaDado['id']));?></td>
            <td><?php echo htmlspecialchars(strip_tags($categoriaDado['categoria'])); ?></td>
            <td><?php echo htmlspecialchars(strip_tags($categoriaDado['descricao'])); ?></td>
            <td><a href="">Alterar</a>/ <a href="">Eliminar</a>/ <a href="">Ver</a></td>
        </tr>

        <?php }//fecho foreach ?>

    </table>
</body>
</html>