<?php
    //Método para Obter a conexao
    function Conexao()
    {
        $conexao = null;

        try{

            $conexao = new PDO('mysql: host=localhost;dbname=contrologasto','root','');
        }catch(PDOException $erro)
        {
            echo "Erro na conexão com o banco. Erro: ". $erro->getMessage();
        }

        return $conexao;
    } 
