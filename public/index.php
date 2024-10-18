<?php
    require_once '../vendor/autoload.php';
    require_once '../app/models/CategoriaModel.php';
    require_once '../app/controllers/CategoriaController.php';

    use app\controllers\CategoriaController;

    $categoriaController = new CategoriaController();

    include_once '../app/config/config.php';

  $url = (!empty(filter_input(INPUT_GET,'url', FILTER_DEFAULT)) ? filter_input(INPUT_GET, 'url', FILTER_DEFAULT): 'HomeController');

    //converter a url de uma string para um array
    //$urli = array_filter(explode('/',$url));

    //criar o caminho da página com o nome que esta na primeira posição do array criado e atribuir a extensão .php
    var_dump($url);exit;
    if($url == 'Categoria')
    {
      $categoriaController->indexController();

    }else {
      false;
    }
