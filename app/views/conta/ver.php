<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dados da Categoria</title>
</head>
<body>

    <h1>Dados da Categoria</h1>

    <?php
        foreach($DadosCategoriaSelecionada as $dadoCategoria):
        
        endforeach;
    ?>

    <form action="" method="POST">

        <p>Categoria: <?php echo $dadoCategoria['categoria'];?></p>
        
        <p>Descrição: <?php echo $dadoCategoria['descricao'];?></p>

        <br>

        <button type="submit" name ="voltar">Voltar</button>

    </form>

</body>
</html>