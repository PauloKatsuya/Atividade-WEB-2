<?php

    include "Funcionario.php";
    include "FolhaPagamento.php";

    session_start();

    if (!isset($_SESSION["incrementoCodigos"])) {
        $_SESSION["incrementoCodigos"] = 1;
    }

    if (!isset($_SESSION['folhaPagamento'])) {
        $_SESSION['folhaPagamento'] = new FolhaPagamento();
    }

    $nome = isset($_POST['nome']) ? $_POST['nome'] : "";
    $salario = isset($_POST['salario']) ? $_POST['salario'] : "";
    $cargo = isset($_POST['cargo']) ? $_POST['cargo'] : "";
    $horas = isset($_POST['horas']) ? $_POST['horas'] : "";

    $folhaPagamento = $_SESSION["folhaPagamento"];

    if (isset($_POST["enviar"]) && $nome != "" && $salario != "" && $cargo != "" && $horas != "") {
        $codigo = $_SESSION["incrementoCodigos"];
        $funcionario = new Funcionario($codigo, $nome, $salario, $cargo, $horas);
        $folhaPagamento->addFuncionario($funcionario);

        $_SESSION["incrementoCodigos"]++;

        // echo $codigo;

        // var_dump($folhaPagamento->getFuncionarios());    
        
    } else {
        echo "Preencha todos os campos";
    }
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
    <link rel="stylesheet" href="src/style.css">
</head>
<body>
    <main>
        <h1>Cadastro de Funcionário</h1>

        <form action="#" method="POST">
            <label for="nome">Nome</label>
            <input type="text" placeholder="Digite o nome" id="nome" name="nome">

            <label for="salario">Salário</label>
            <input type="number"  step="0.01" placeholder="Digite o salário" id="salario" name="salario">

            <label for="cargo">Cargo</label>
            <input type="text" placeholder="Digite o cargo" id="cargo" name="cargo">

            <label for="horas">Horas Trabalhadas</label>
            <input type="number" placeholder="Digite a quantidade de horas trabalhadas" id="horas" name="horas">

            <button type="submit" name="enviar" class="botao enviar">Enviar</button>
        </form>

        
    </main> 

    <div class="container-funcionarios">
        <h3>Lista de Funcionários</h3>
        <div class="funcionarios">
            <?php
                $funcionarios = $folhaPagamento->getFuncionarios();
                if(isset($_POST["apagar"])){
                    session_destroy();
                    echo "";
                }else{
                    foreach ($funcionarios as $funcionario) {
                        echo "<section class='funcionarios-card'>
                            <img src='src/foto.jpg'>
                            <h3>Identificador</h3>" . $funcionario->getCodigo() .
                            "<h3>Nome</h3> " . $funcionario->getNome() . "<h4>Salário</h4> " . $funcionario->getSalario() . "<h4>Cargo</h4> " . $funcionario->getCargo() . "<h4>Horas Trabalhadas</h4> " . $funcionario->getHorasTrabalhadas() . "</section>";
                    }
                }

            ?>
        </div>
        <form action="#" method="POST">
            <button type="submit" name="apagar" class="botao limpar">Limpar</button>
        </form>
    </div>

    <footer>
        feito por Daniel Zornek e Paulo Katsuya
    </footer>
</body>
</html>
