<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Crud
 *
 * @author Mateus
 */

namespace estamparia\libs;

abstract class Crud {

    //put your code here
    protected $banco;
    protected $tabela;
    protected $consultaColunaId; // armazena o nome da coluna(campo) ID da tabela

    function __construct() {
        $servidor = "localhost";
        $banco = "TccEstamparia";
        $dsn = "mysql:host=$servidor; dbname=$banco";
        $usuario = "root";
        $senha = "root";
        $conexao = new \PDO($dsn, $usuario, $senha);
        $this->banco = $conexao;
    }

    abstract public function inserir();

    abstract public function editar($id);

    abstract public function mostrarInformacoes();

    public function deletar($id) {
        $comando = $this->banco->prepare("DELETE FROM $this->tabela WHERE "
                . "$this->consultaColunaId=$id");
        $comando->execute();
    }

    public function consultar($id) {
        // "Iniciando uma consulta em $this->tabela, no registro id = $id <br />";
        $comando = $this->banco->prepare("SELECT * FROM $this->tabela WHERE "
                . "$this->consultaColunaId=$id"); //PREPARA os dados para fazer um COMANDO de banco de dados
        $comando->execute();
        $lista = $comando->fetch(\PDO::FETCH_ASSOC);   //Retorna os Valores em um VETOR ou ARRAY

        if($lista) {
            return $lista;
        } else {
            return false;
        }
        /* foreach ($lista as $chave => $valor) {
          echo $chave . ": " . $valor . "<br />";
          }
          echo "<br /><hr />"; */
    }

    public function consultarTudo() {
        //echo "Iniciando consulta inteira em $this->tabela...<br/>";
        $comando = $this->banco->prepare("SELECT * FROM $this->tabela");
        $comando->execute();

        $lista = $comando->fetchAll(\PDO::FETCH_ASSOC);
        return $lista;
        /*
        foreach ($lista as $value) {
            foreach ($value as $chave => $valor) {
                echo $chave . ": " . $valor . "<br />";
            }
            echo "<br /><br /><hr />";
        }*/
    }

}
