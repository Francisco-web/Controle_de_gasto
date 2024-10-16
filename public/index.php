<?php
    require_once '../vendor/autoload.php';
    //require_once '../app/config/url.php';
    require_once '../app/models/CategoriaModel.php';
    require_once '../app/controllers/CategoriaController.php';

    use app\controllers\CategoriaController;

    $categoriaController = new CategoriaController();

    echo"<a href='../app/views/categoria/add.php'> Categoria</a> <br>";

    $pagina = filter_input(INPUT_GET, 'pagina', FILTER_DEFAULT);
    $id = filter_input(INPUT_GET, 'id', FILTER_DEFAULT);

    echo "$pagina <br>";
    echo "id = $id";

    //$categoriaController->InserirCategoria();exit;
    if($pagina == 'addCategoria'):
        
        //chamada do método Adicionar Categoria
        $categoriaController->InserirCategoria();

        elseif($pagina == 'indexCategoria'):
            
            //Chamada do método para Consultar Categoria
            $categoriaController->indexController();

        elseif($pagina == 'eliminarCategoria'):
            
            //chamada do método eliminar Categoria
            $categoriaController->apagarCategoriaController($id);

        elseif($pagina == 'AlterarCategoria'):

            //chamada do método ver Categoria
            $categoriaController->AlterarCategoriaController($id);
           
        elseif($pagina == 'verCategoria'):

            //chamada do método ver Categoria
            $categoriaController->VerUmaCategoriaController($id);
    endif;
