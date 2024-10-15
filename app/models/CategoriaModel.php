<?php
//namespace app\model
namespace app\models;

require_once '../app/config/Database.php';

class CategoriaModel
{
    private $id;
    private $categoria;
    private $descricao;

    private $db;
    
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

    public function setCategoria($categoria)
    {
        $this->categoria = $categoria;

    }

    public function getCategoria()
    {
        return $this->categoria;
    }

    public function setDescricao($descricao)
    {
        $this->descricao = $descricao;

    }

    public function getDescricao()
    {
        return $this->descricao;
    }

    //método para inserir dados no banco
    public function CadastrarCategoria()
    {
        $sql = "INSERT INTO `tb_categoria`(`categoria`, `descricao`, `data_criacao`, `data_actualizacao`) VALUES (:Categoria,:Descricao,NOW(),NOW())";
        
        //var_dump($this->db);exit;
        $stmt = Conexao()->prepare($sql);
        
        $stmt->bindParam(':Categoria', $this->categoria, \PDO::PARAM_STR);
        
        $stmt->bindParam(':Descricao', $this->descricao, \PDO::PARAM_STR);
        
        //executar as instruções e inserir no banco
        if($stmt->execute())
        {
            $_SESSION['msg_cadastrar_categoria'] = "Categoria Cadastrada com sucesso.";
        }else
        {
            $_SESSION['msg_cadastrar_categoria'] = "Falha ao Cadastrar uma nova Categoria.";
        }
    } 

    //método para listar todas categorias existentes no banco
    public function index()
    {
        $sql = "SELECT `id`, `categoria`, `descricao`, `data_criacao` FROM `tb_categoria`";
        $stmt= Conexao()->prepare($sql);
        $stmt->execute();
        return $stmt;
    }

    //método Actualizar Categoria
    public function AlterarCategoria()
    {

    }

    //Eliminar Categoria
    public function ApagarCategoria()
    {
        $sql = "DELETE FROM tb_categoria WHERE id =:Id";
        $stmt = Conexao()->prepare($sql);
        $stmt->bindParam(':Id', $this->id, \PDO::PARAM_INT);
        if($stmt->execute())
        {
            $_SESSION['msg_apagar_categoria']= "Categoria Eliminada com sucesso.";
        }else
        {
            $_SESSION['msg_apagar_categoria']= "Falha ao Eliminar a Categoria.";
        }
    } 
}
