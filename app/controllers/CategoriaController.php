<?php
namespace app\controllers;
use app\models\CategoriaModel;

session_start();

class CategoriaController
{
    private $categoriaModel;

    public function __construct()
    {
        $this->categoriaModel = new CategoriaModel();
    }

    //Selecionar todas Categoria
    public function indexController()
    {
        
        $categoria = $this->categoriaModel->index();
        $categorias = $categoria->fetchAll(\PDO::FETCH_ASSOC);
        require_once '../app/views/categoria/index.php';
    }

    //Inserir Categoria
    public function InserirCategoria()
    {
        //verificar se o botão foi clicado para receber os valores do formulario
        if(isset($_POST['cadastrar_categoria']))
        {
            //receber os valores vindo do formulario através do metodo POST
            $categoria = htmlspecialchars(strip_tags($_POST['categoria']));

            $descricao = htmlspecialchars(strip_tags($_POST['descricao']));

            //verificar se a variavel está vazia
            if(empty($categoria))
            {
                $_SESSION['msg_cadastrar_categoria'] = "<p style=color:red>Digite a Categoria</p> <br>";

                header("location:../app/views/categoria/add.php");

            }else if(empty($descricao))
            {
                $_SESSION['msg_cadastrar_categoria'] = "<p style=color:red>Digite a Descrição</p> <br>";

                header("location:../app/views/categoria/add.php");

            }else{
                
                //inserir os valores nos metodos de acesso a categoria model
                $this->categoriaModel->setCategoria($categoria);

                $this->categoriaModel->setDescricao($descricao);

                $this->categoriaModel->CadastrarCategoria();
            }
        }

        //Se o botão cadastrar não for clicado ou depois de terminar de executar a função acima, rederciona para a página anterior
        header("location:../app/views/categoria/add.php");
    } 

    //Alterar Dados da categoria
    public function AlterarCategoriaController($id)
    {
        //página categoria edit.php
        require_once '../app/views/categoria/edit.php';

        //verificar se o botão foi clicado para receber os valores do formulario
        if(isset($_POST['cadastrar_categoria']))
        {
            //receber os valores vindo do formulario através do metodo POST
            $categoria = htmlspecialchars(strip_tags($_POST['categoria']));

            $descricao = htmlspecialchars(strip_tags($_POST['descricao']));

            $this->categoriaModel->setId($id);

            //verificar se a variavel está vazia
            if(empty($categoria))
            {
                $_SESSION['msg_categoria'] = "<p style=color:red>Digite a Categoria</p> <br>";

                header("location:../app/views/categoria/edit.php");

            }else if(empty($descricao))
            {
                $_SESSION['msg_categoria'] = "<p style=color:red>Digite a Descrição</p> <br>";

                header("location:../app/views/categoria/edit.php");

            }else{
                
                //inserir os valores nos metodos de acesso a categoria model
                $this->categoriaModel->setCategoria($categoria);

                $this->categoriaModel->setDescricao($descricao);

                $this->categoriaModel->AlterarCategoria();
            }
        }
        
        header("Location:../public/index.php?pagina=alterar");
    }

    //Apagar Dados da categoria
    public function ApagarCategoriaController($id)
    {
        $this->categoriaModel->setId($id);

        $this->categoriaModel->ApagarCategoria();

        header("Location:../public/index.php?pagina=indexCategoria");
    }
}