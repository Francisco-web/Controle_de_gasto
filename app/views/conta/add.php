<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adicionar Conta</title>
</head>
<body>
    
    <h1>Adicionar Nova Conta</h1>

    <?php 
        if(isset($_SESSION['msg_add_conta']))
        {
            echo $_SESSION['msg_add_conta']; 
            unset($_SESSION['msg_add_conta']);
        }
    ?>

    <br>
    
    <form action="" method="POST">

        <input type="text" name="tipo_conta" id="" placeholder="Tipo de Conta">
        
        <br><br>

        <input type="text" name="valor_conta" id="" placeholder="Valor a Inserir">
        
        <br><br>

        <select name="banco" id="">
            <option value="">Seleciona o Banco</option>
            <option value="BAI">BAI</option>
            <option value="BFA">BFA</option>
        </select>

        <br><br>

        <select name="categoria_id" id="">

            <option value="">Seleciona Categoria</option>

            <?php

                $ordem = 1;
                foreach($categorias as $categoriaDado)
                {
            ?>

            <option value="<?php echo $categoriaDado['id']; ?>"><?php echo $ordem++;?>- <?php echo $categoriaDado['categoria'] ?></option>

            <?php }?>

        </select>
        
        <br><br>

        <textarea name="descricao" id="" cols="30" rows="10" placeholder="Descrição"></textarea>

        <br><br>
        
        <input type="submit" name="guardar_conta" Value="Guardar">
        <button type="reset">Cancelar</button>
    </form>

</body>
</html>