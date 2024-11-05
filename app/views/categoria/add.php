<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adicionar Categoria</title>
</head>
<body>
    
    <h1>Adicionar Nova Categoria</h1>

    <?php 
        if(isset($_SESSION['msg_cadastrar_categoria']))
        {
            echo $_SESSION['msg_cadastrar_categoria']; 
            unset($_SESSION['msg_cadastrar_categoria']);
        }
    ?>

    <br>
    
    <form action="" method="POST">

        <input type="text" name="categoria" id="" placeholder="Categoria">
        
        <br><br>

        <input type="text" name="descricao" id="" placeholder="Descrição">

        <br><br>
        
        <input type="submit" name="cadastrar_categoria" Value="Guardar">
        <button type="reset">Cancelar</button>
    </form>

</body>
</html>