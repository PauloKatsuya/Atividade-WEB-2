<?php
    class Funcionario{
        private $codigo;
        private $nome;
        private $salario;
        private $cargo;
        private $horasTrabalhadas;

        public function __construct($codigo, $nome, $salario, $cargo, $horasTrabalhadas){
            $this->codigo = $codigo;
            $this->nome = $nome;
            $this->salario = $salario;
            $this->cargo = $cargo;
            $this->horasTrabalhadas = $horasTrabalhadas;
        }

        public function getCodigo(){
            return $this->codigo;
        }     

        public function getNome(){
            return $this->nome;
        }

        public function getSalario(){
            return $this->salario;
        }

        public function getCargo(){
            return $this->cargo;
        }

        public function getHorasTrabalhadas(){
            return $this->horasTrabalhadas;
        }

        public function calcularPagamento(){
            return $this->salario * $this->horasTrabalhadas; 
        }

    }

?>