<?php
    namespace app\controllers;

    use app\models\ContaModel;
    use app\models\CategoriaModel;
    
    //session_start();

    class ContaController
    {
        private $contaModel;
        private $categoriaModel;
        public function __construct()
        {
            $this->contaModel = new ContaModel();
            $this->categoriaModel = new CategoriaModel();
        }

        public function Categoria_ID()
        {
            
            $categoria = $this->categoriaModel->index();

            $categorias = $categoria->fetchAll(\PDO::FETCH_ASSOC);

            //redereciona para página Conta/ index.php
            require_once '../app/views/conta/add.php';
        }

        public function AddConta(){
            ContaController::Categoria_ID();

            if(isset($_POST['guardar_conta']))
            {
                $tipo = htmlspecialchars(strip_tags($_POST['tipo_conta']));
                $valor = htmlspecialchars(strip_tags($_POST['valor_conta'])) ;
                $banco = htmlspecialchars(strip_tags($_POST['banco'])) ;
                $descricao = htmlspecialchars(strip_tags($_POST['descricao']));
                $categoria = htmlspecialchars(strip_tags($_POST['categoria_id']));

                //verificar se foi inserido valores nas variáveirs
                if(empty($tipo))
                {
                    $_SESSION['msg_conta'] = '<p style:color=warning>Digite o Tipo de conta.';
                    header("location:../app/views/conta/add.php");
                
                }else if(empty($valor))
                {
                    $_SESSION['msg_conta'] = '<p style:color=warning>Insira o valor.</p>';
                    header("location:../app/views/conta/add.php");

                } else if(empty($banco))
                {
                    $_SESSION['msg_conta'] = '<p style:color=warning>Seleciona o banco.</p>';
                    header("location:../app/views/conta/add.php");

                }else if(empty($descricao))
                {
                    $_SESSION['msg_conta'] = '<p style:color=warning>Digite uma descrição.</p>';
                    header("location:../app/views/conta/add.php");

                }else if(empty($categoria))
                {
                    $_SESSION['msg_conta'] = '<p style:color=warning>Seleciona a Categoria</p>';
                    header("location:../app/views/conta/add.php");

                }else{
                    $this->contaModel->setTipo($tipo);
                    $this->contaModel->setValor($valor);
                    $this->contaModel->setBanco($banco);
                    $this->contaModel->setDescricao($descricao);
                    $this->contaModel->setCategoria_id($categoria);
                    $this->contaModel->Add();
                    
                    header("location:../public/index.php?url=/Conta/add");
                }
            }
           
        }

        public function VerTodasContas()
        {
            $conta = $this->contaModel->TodasContas();
            $contas = $conta->fetchAll(\PDO::FETCH_ASSOC);

            require_once '../app/views/conta/index.php';
        }

        public function VerUmaContas($id)
        {
            $conta = $this->contaModel->TodasContas();
            $contas = $conta->fetchAll(\PDO::FETCH_ASSOC);

            require_once '../app/views/conta/index.php';
        }

        public function AlterarDadoConta($id)
        {
            //função para inserir id da categoria no model da categoria 
            $this->contaModel->setId($id);

            //mostrar dados do usuario selecionado
            $conta = $this->contaModel->SelecionarUmaConta();
            $DadosContaSelecionada = $conta->fetchAll(\PDO::FETCH_ASSOC);
            
            //redereciona para página categoria/ edit.php
            require_once '../app/views/conta/edit.php';

            if(isset($_POST['alterar_conta']))
            {
                $tipo = htmlspecialchars(strip_tags($_POST['tipo_conta']));
                $valor = htmlspecialchars(strip_tags($_POST['valor_conta'])) ;
                $banco = htmlspecialchars(strip_tags($_POST['banco'])) ;
                $descricao = htmlspecialchars(strip_tags($_POST['descricao']));
                $categoria = htmlspecialchars(strip_tags($_POST['categoria_id']));
                $id = htmlspecialchars(strip_tags($id));

                //verificar se foi inserido valores nas variáveirs
                if(empty($tipo))
                {
                    $_SESSION['msg_conta'] = '<p style:color=warning>Digite o Tipo de conta.';
                    header("location:../app/views/conta/edit.php");
                
                }else if(empty($valor))
                {
                    $_SESSION['msg_conta'] = '<p style:color=warning>Insira o valor.</p>';
                    header("location:../app/views/conta/edit.php");

                } else if(empty($banco))
                {
                    $_SESSION['msg_conta'] = '<p style:color=warning>Seleciona o banco.</p>';
                    header("location:../app/views/conta/edit.php");

                }else if(empty($descricao))
                {
                    $_SESSION['msg_conta'] = '<p style:color=warning>Digite uma descrição.</p>';
                    header("location:../app/views/conta/edit.php");

                }else if(empty($categoria))
                {
                    $_SESSION['msg_conta'] = '<p style:color=warning>Seleciona a Categoria</p>';
                    header("location:../app/views/conta/edit.php");

                }else{
                    $this->contaModel->setTipo($tipo);
                    $this->contaModel->setValor($valor);
                    $this->contaModel->setBanco($banco);
                    $this->contaModel->setDescricao($descricao);
                    $this->contaModel->setCategoria_id($categoria);
                    $this->contaModel->setId($id);
                    $this->contaModel->AlterarConta();
                    
                    header("location:../public/index.php?url=/Conta/edit");
                }
            }
            require_once '../app/views/conta/edit.php';
        }
    }