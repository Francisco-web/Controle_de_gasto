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

    //método Selecionar todas Categoria
    public function indexController()
    {
        
        $categoria = $this->categoriaModel->index();

        $categorias = $categoria->fetchAll(\PDO::FETCH_ASSOC);

        //redereciona para página categoria/ index.php
        require_once '../app/views/categoria/index.php';
    }

    //método ver um unico registo.
    public function VerUmaCategoriaController($id)
    {
        //função para inserir id da categoria no model da categoria 
        $this->categoriaModel->setId($id);

        //mostrar dados do usuario selecionado
        $categoria = $this->categoriaModel->SelecionarUmaCategoria();

        $DadosCategoriaSelecionada = $categoria->fetchAll(\PDO::FETCH_ASSOC);
        
        //redirecionar para página categoria/ edit.php
        require_once '../app/views/categoria/ver.php';
    }

    //método Inserir Categoria
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

    //método Alterar Dados da categoria
    public function AlterarCategoriaController($id)
    {
        //função para inserir id da categoria no model da categoria 
        $this->categoriaModel->setId($id);

        //mostrar dados do usuario selecionado
        $categoria = $this->categoriaModel->SelecionarUmaCategoria();
        $DadosCategoriaSelecionada = $categoria->fetchAll(\PDO::FETCH_ASSOC);
        
        //redereciona para página categoria/ edit.php
        require_once '../app/views/categoria/edit.php';
        
        //verificar se o botão foi clicado para receber os valores do formulario
        if(isset($_POST['alterar_categoria']))
        {
            //receber os valores vindo do formulario através do metodo POST
            $categoria = htmlspecialchars(strip_tags($_POST['categoria']));

            $descricao = htmlspecialchars(strip_tags($_POST['descricao']));

            $id = htmlspecialchars(strip_tags($_POST['id']));

            //verificar se a variavel está vazia
            if(empty($categoria))
            {
                $_SESSION['msg_categoria'] = "<p style=color:red>Digite a Categoria</p> <br>";

                header("location:../public/index.php?pagina=AlterarCategoria&id=$id");

            }else if(empty($descricao))
            {
                $_SESSION['msg_categoria'] = "<p style=color:red>Digite a Descrição</p> <br>";

                header("location:../public/index.php?pagina=AlterarCategoria&id=$id");

            }else if(empty($id))
            {
                $_SESSION['msg_categoria'] = "<p style=color:red>Id não encontrado.</p> <br>";

                header("location:../public/index.php?pagina=AlterarCategoria&id=$id");

            }else{
                
                //inserir os valores nos metodos de acesso a categoria model
                $this->categoriaModel->setCategoria($categoria);

                $this->categoriaModel->setDescricao($descricao);

                $this->categoriaModel->AlterarCategoria();

                header("location:../public/index.php?pagina=AlterarCategoria&id=$id");
            }
        }
        
    }

    //método Apagar Dados da categoria
    public function ApagarCategoriaController($id)
    {
        $this->categoriaModel->setId($id);

        $this->categoriaModel->ApagarCategoria();

        header("Location:../public/index.php?pagina=indexCategoria");
    }
}