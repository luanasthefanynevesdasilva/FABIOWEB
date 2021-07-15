<?php

if(!$_GET || !$_POST) header('Location: ./vendas.php');


require_once '../controller/veiculoController.php';
require_once '../controller/ItensVendaController.php';
require_once '../controller/VendasController.php';

$veiculo = new veiculoController();
$aluguel = new VendasController();
$itemaluguels = new ItensVendaController();

$idusuario = intval($_POST['idusuario']);
$idfuncionario = intval($_POST['idfuncionario']);
$pago = $_POST['pago'];
$diaria = $_POST['diaria'];
$total = $_POST['total'];
$troco = $_POST['troco'];
$desconto = $_POST['desconto'];
$datalocacao = $_POST['datalocacao'];
$combustivelatual = $_POST['combustivelatual'];
$idaluguel = $_GET['id'];

    $aluguel->setidusuario($idusuario);
    $aluguel->setidfuncionario($idfuncionario);
    $aluguel->setpago($pago);
    $aluguel->setdiaria($diaria);
    $aluguel->settotal($total);
    $aluguel->settroco($troco);
    $aluguel->setdesconto($desconto);
    $aluguel->setdatalocacao($datalocacao);
    $aluguel->setcombustivelatual($combustivelatual);
    $aluguel->setidaluguel($aluguel->findidaluguel($idusuario));
    $aluguel->setidaluguel($aluguel->findidaluguel($idfuncionario));
    $aluguel->setidaluguel($aluguel->findidaluguel($pago));
    $aluguel->setidaluguel($aluguel->findidaluguel($diaria));
    $aluguel->setidaluguel($aluguel->findidaluguel($total));
    $aluguel->setidaluguel($aluguel->findidaluguel($troco));
    $aluguel->setidaluguel($aluguel->findidaluguel($desconto));
    $aluguel->setidaluguel($aluguel->findidaluguel($datalocacao));
    $aluguel->setidaluguel($aluguel->findidaluguel($combustivelatual));


try {

    header('Location: ./vendas.php');

} catch (PDOException $err) {
    echo 'Erro';
}

