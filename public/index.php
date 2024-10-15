<?php
require_once '../vendor/autoload.php';
//require_once '../app/config/url.php';
require_once '../app/models/CategoriaModel.php';
require_once '../app/controllers/CategoriaController.php';

use app\controllers\CategoriaController;

$categoriaController = new CategoriaController();

echo"<a href='../app/views/categoria/add.php'> Categoria</a> <br>";

$pagina = filter_input(INPUT_GET, 'pagina', FILTER_DEFAULT);

echo $pagina;
//$categoriaController->InserirCategoria();exit;
if($pagina == 'addCategoria'):
    
    //chamada do metodo Adicionar Categoria
    $categoriaController->InserirCategoria();

    elseif($pagina == 'indexCategoria'):
        
        //Chamada do metodo para Consultar Categoria
        $categoriaController->indexController();
        
    /*elseif(is_integer($pagina)):
        $categoriaController->apagarCategoriaController($id);*/
endif;
