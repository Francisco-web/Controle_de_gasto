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
    <form action="../public/index.php?pagina=AlterarCategoria&id=<?php echo $dadoCategoria['id'];?>" method="POST">
        <input type="text" name="categoria" id="" placeholder="Categoria" value="<?php echo $dadoCategoria['categoria'];?>">
        <input type="text" name="descricao" id="" placeholder="Descrição" value="<?php echo $dadoCategoria ['descricao'] ?>">
        <input type="submit" name="alterar_categoria" Value="Guardar">
        <button type="submit" name ="voltar">Cancelar</button>
    </form>
</body>
</html>