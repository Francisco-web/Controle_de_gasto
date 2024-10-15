<?php session_start();?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alterar Dados da Categoria</title>
</head>
<body>
    <h1>Alterar dados da Categoria</h1>

    <form action="../../../public/index.php?pagina=AlterarCategoria" method="POST">
        <input type="text" name="categoria" id="" placeholder="Categoria">
        <input type="text" name="descricao" id="" placeholder="Descrição">
        <input type="submit" name="cadastrar_categoria" Value="Guardar">
        <button type="submit" name ="voltar">Cancelar</button>
    </form>
</body>
</html>