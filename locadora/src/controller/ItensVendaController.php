<?php

require_once '../model/ItensVenda.php';
require_once '../model/Database.php';

class ItensVendaController extends itemaluguel
{
    protected $tabela = 'itemaluguel';

    public function __construct()
    {
    }

    public function insert($idaluguel, $idveiculo)
    {
        $query = "INSERT INTO $this->tabela (idaluguel, idveiculo) VALUES (:idaluguel, :idveiculo)";
        $stm = Database::prepare($query);
        $stm->bindParam(':idaluguel', $idaluguel);
        $stm->bindParam(':idveiculo', $idveiculo);
        return $stm->execute();
    }

    public function findAllIdaluguel($idaluguel)
    {
        $query = "SELECT * FROM $this->tabela WHERE idaluguel = :id";
        $stm = Database::prepare($query);
        $stm->bindParam(':id', $idaluguel, PDO::PARAM_INT);
        $stm->execute();
        $itemaluguel = array();

        foreach ($stm->fetchAll() as $itemaluguels) {
            array_push(
                $itemaluguel,
                new itemaluguel($itemaluguels->iditemaluguel, $idaluguel, $itemaluguels->idveiculo)
            );
        }
        return $itemaluguel;
    }

    public function delete($idaluguel)
    {
        $query = "DELETE FROM $this->tabela WHERE idaluguel = :id";
        $stm = Database::prepare($query);
        $stm->bindParam(':id', $idaluguel, PDO::PARAM_INT);
        return $stm->execute();
    }

}