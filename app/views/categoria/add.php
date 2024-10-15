<?php session_start();?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adicionar Categoria</title>
</head>
<body>
    
    <h1>Adicionar Nova Categoria</h1>

    <a href="../../../public/index.php?pagina=indexCategoria">Ver Categoria</a>
    
    <br><br>

    <?php 
        if(isset($_SESSION['msg_cadastrar_categoria']))
        {echo $_SESSION['msg_cadastrar_categoria']; unset($_SESSION['msg_cadastrar_categoria']);}
    ?>

    <br><br>
    
    <form action="../../../public/index.php?pagina=addCategoria" method="POST">
        <input type="text" name="categoria" id="" placeholder="Categoria">
        <input type="text" name="descricao" id="" placeholder="Descrição">
        <input type="submit" name="cadastrar_categoria" Value="Guardar">
        <button type="reset">Cancelar</button>
    </form>

</body>
</html>