<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alterar Dados da Conta</title>
</head>
<body>
    <h1>Alterar dados da Conta</h1>
    <?php

        //mesagem
        if(isset($_SESSION['msg_categoria'])):
            echo $_SESSION['msg_categoria'];
            unset($_SESSION['msg_categoria']);
        endif;

        foreach($DadosContaSelecionada as $dadoConta):
        
        endforeach;
    ?>
    <form action="" method="POST">

        <input type="hidden" name="id" id="" placeholder="ID" value="<?php echo $dadoConta['id'];?>">
        
        <input type="text" name="tipo_conta" id="" placeholder="Tipo de Conta" value="<?php echo $dadoConta['tipo'];?>">
        
        <br><br>

        <input type="text" name="valor_conta" id="" placeholder="Valor a Inserir"value="<?php echo $dadoConta['valor'];?>">
        
        <br><br>

        <select name="banco" id="">
            <option value="">Seleciona o Banco</option>
            <option value="<?php if($dadoConta['banco'] == 'BAI'){echo "selected";}?>"><?php $dadoConta['banco']?> </option>
            <option value="<?php if($dadoConta['banco'] == 'BFA'){echo "selected";}?>">BFA</option>
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

        <textarea name="descricao" id="" cols="30" rows="10" placeholder="Descrição"><?php echo $dadoConta['descricao'];?></textarea>

        <br><br>

        <input type="submit" name="alterar_conta" Value="Guardar">

        <button type="submit" name ="voltar">Cancelar</button>
    </form>
</body>
</html>