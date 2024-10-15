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
                $_SESSION['msg_categoria'] = "<p style=color:green>Digite a Categoria</p> <br>";
                header("location:../../public/index.php?pagina=indexCategoria");
            }else if(empty($descricao))
            {
                /*$_SESSION['msg_categoria'] = "<p style=color:red>Digite a Descrição</p> <br>";
                header("location:../../public/index.php?pagina=addCategoria");*/
            }else{
                
                //inserir os valores nos metodos de acesso a categoria model
                $this->categoriaModel->setCategoria($categoria);

                $this->categoriaModel->setDescricao($descricao);

                if($this->categoriaModel->CadastrarCategoria())
                {
                    $_SESSION['msg_categoria'] = "<p style=color:green >Nova Categoria Cadastrada com sucesso</p>";
                    //header("location:../app/views/categoria/cadastrarCategoria.php");
                }else
                {
                    $_SESSION['msg_categoria'] = "<p style=color:green >Falha ao Cadastrar Nova Categoria com sucesso</p>";
                    //header("location:../app/views/categoria/cadastrarCategoria.php");
                }
            }
        }

        header("location:../public/index.php");
    } 

    //Alterar Dados da categoria
    public function ApagarCategoriaController($pagina)
    {
        $this->categoriaModel->setId($pagina);
        $this->categoriaModel->ApagarCategoria();
        header("Location:../app/views/categoria/index.php?pagina=indexCategoria");
    }
}