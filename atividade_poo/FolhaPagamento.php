<?php
class FolhaPagamento {
    public $listaFuncionarios = [];

    public function addFuncionario(Funcionario $funcionario) {
        $this->listaFuncionarios[$funcionario->getCodigo()] = $funcionario;
    }

    public function getFuncionarios() {
        return $this->listaFuncionarios;
    }
}
?>
