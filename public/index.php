<?php
  require_once '../vendor/autoload.php';
  require_once '../app/models/CategoriaModel.php';
  require_once '../app/controllers/CategoriaController.php';
  require_once '../app/controllers/ContaController.php';
  include_once '../app/config/config.php';
  include_once '../app/views/menu.php';

  use app\controllers\CategoriaController;
  use app\controllers\ContaController;
  use app\controllers\HomeController;

  $categoriaController = new CategoriaController();
  $contaController = new ContaController();


  $url = (!empty(filter_input(INPUT_GET,'url', FILTER_DEFAULT)) ? filter_input(INPUT_GET, 'url', FILTER_DEFAULT): 'HomeController');

 $id =filter_input(INPUT_GET, 'id', FILTER_DEFAULT);

  //converter a url de uma string para um array
  //$url = array_filter(explode('/',$url));
  //var_dump($url[1]);exit;
  //criar o caminho da página com o nome que esta na primeira posição do array criado e atribuir a extensão .php
  
  if($url == '/Categoria')
  {
    $categoriaController->indexController();

  }elseif($url == '/Categoria/add') {

    $categoriaController->InserirCategoria();

  }elseif($url == 'EliminarCategoria') {

    $categoriaController->ApagarCategoriaController($id);
  
  }elseif($url == 'AlterarCategoria') {

    $categoriaController->AlterarCategoriaController($id);

  }elseif($url == 'VerCategoria') {

    $categoriaController->VerUmaCategoriaController($id);

  //Inicio Conta
  }elseif($url == '/Conta') {

    $contaController->VerTodasContas();

  }elseif($url == '/Conta/add') {

    $contaController->AddConta();

  }elseif($url == 'AlterarConta') {

    $contaController->AlterarDadoConta($id);

  }else{
    HomeController:: Inicio();
  }
