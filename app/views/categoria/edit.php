<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alterar Dados da Categoria</title>
</head>
<body>
    <h1>Alterar dados da Categoria</h1>
    <?php

        //mesagem
        if(isset($_SESSION['msg_categoria'])):
            echo $_SESSION['msg_categoria'];
            unset($_SESSION['msg_categoria']);
        endif;

        foreach($DadosCategoriaSelecionada as $dadoCategoria):
        
        endforeach;
    ?>
    <form action="" method="POST">

        <input type="hidden" name="id" id="" placeholder="ID" value="<?php echo $dadoCategoria['id'];?>">
        
        <input type="text" name="categoria" id="" placeholder="Categoria" value="<?php echo $dadoCategoria['categoria'];?>">

        <br><br>

        <textarea name="descricao" id="" cols="32" rows="5"><?php echo $dadoCategoria ['descricao'] ?></textarea>
     
        <br><br>

        <input type="submit" name="alterar_categoria" Value="Guardar">

        <button type="submit" name ="voltar">Cancelar</button>
    </form>
</body>
</html>