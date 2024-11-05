<?php
    namespace app\models;

    require_once '../app/config/Database.php';

    class ContaModel
    {
        private $id;
        private	$tipo;
        private	$categoria_id;
        private	$valor;

        private	$banco;
        private	$descricao;

        //constructor da class
        public function __construct()
        {
        
            
        }

        public function setId($id)
        {
            $this->id = $id;
        }

        public function getId()
        {
            return $this->id;
        }

        public function setTipo($tipo)
        {
            $this->tipo = $tipo;
        }

        public function getTipo()
        {
            return $this->tipo;
        }
        public function setCategoria_id($id)
        {
            $this->categoria_id = $id;
        }

        public function getCategoria_id()
        {
            return $this->categoria_id;
        }
        public function setValor($valor)
        {
            $this->valor = $valor;
        }

        public function getValor()
        {
            return $this->valor;
        }

        public function setBanco($banco)
        {
            $this->banco = $banco;
        }

        public function getBanco()
        {
            return $this->banco;
        }
        public function setDescricao($descricao)
        {
            $this->descricao = $descricao;
        }

        public function getDescricao()
        {
            return $this->descricao;
        }
        public function Add()
        {
            $sql = "INSERT INTO tb_conta SET tipo=:Tipo,categoria_id=:Categoria_id,valor=:Valor,banco=:Banco,descricao=:Descricao,data_criação = NOW(),data_actualizacao = NOW()";
            $stmt = Conexao()->prepare($sql);
            $stmt->bindParam(':Tipo',$this->tipo,\PDO::PARAM_STR);

            $stmt->bindParam(':Categoria_id',$this->categoria_id,\PDO::PARAM_INT);

            $stmt->bindParam(':Valor',$this->valor,\PDO::PARAM_STR);

            $stmt->bindParam(':Banco',$this->banco,\PDO::PARAM_STR);

            $stmt->bindParam(':Descricao',$this->descricao,\PDO::PARAM_STR);
            
            if($stmt->execute())
            {
                $_SESSION['msg_add_conta'] = "<p style=color:green>Conta Adicionada com sucesso.</p>";

            }else
            {
                $_SESSION['msg_add_conta'] = "<p style=color:red>Falha ao Adiconar Conta.</p>";
            }
        }

        public function TodasContas()
        {
            $sql ="CALL VERTODASASCONTAS()";
            $stmt = Conexao()->prepare($sql);
            $stmt->execute();
            return $stmt;
        }

        public function VerUmaConta()
        {

        }

        public function AlterarConta()
        {
            //bloco sql usando psm procedimento
            $sql = "CALL ALTERARCONTA(:id_conta,:tipo_conta,:valor_conta,:categoria_id_conta,:descricao_conta,:banco_conta";
            $stmt = Conexao()->prepare($sql);
            $stmt->bindParam(':id_conta',$this->id,\PDO::PARAM_INT);
            $stmt->bindParam(':tipo_conta',$this->tipo,\PDO::PARAM_STR);
            $stmt->bindParam(':valor_conta',$this->valor,\PDO::PARAM_STR);
            $stmt->bindParam(':banco_conta',$this->banco,\PDO::PARAM_STR);
            $stmt->bindParam(':descricao_conta',$this->descricao,\PDO::PARAM_STR);
            $stmt->bindParam(':categoria_id_conta',$this->categoria_id,\PDO::PARAM_INT);
            
            if($stmt->execute())
            {
                $_SESSION['msg_conta'] = "<p style:color=green>Atualização bem-sucedida</p>";
            }else
            {
                $_SESSION['msg_conta'] = "<p style:color=red>Nenhum campo foi atualizado</p>";
            }

        }

        public function SelecionarUmaConta()
        {
            $sql = "SELECT * FROM `tb_conta` WHERE id =:ID";
            $stmt= Conexao()->prepare($sql);
            $stmt->bindParam(':ID', $this->id,\PDO::PARAM_INT);
            $stmt->execute();
            return $stmt;
        }
    }