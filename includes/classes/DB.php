<?php

namespace Includes\Classes;

use PDO;
use PDOException;
use PDOStatement;

class DB {

    private $connection;

    public function __construct() {
        try{
        $this->connection = new PDO(
            "mysql:host=". HOST .";dbname=". DB_NAME ."", 
            USER, 
            PASSWORD, 
            array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'UTF8\''));
        } catch(PDOException $e) {
            header('Location: ./error.php');
            exit();
        }
    }

    public function execute(string $query, array $filters = []): bool
    {
        try {
            $query = $this->connection->prepare($query);

            $query = $this->bindParams($query, $filters);

            return $query->execute();
        } catch(PDOException $e) {
            echo $e->getMessage();die;
            header('Location: ./error.php');
            exit();
        }
    }

    public function query(string $query, array $filters = []): ?array
    {
        try {
            $query = $this->connection->prepare($query);

            $query = $this->bindParams($query, $filters);

            $query->execute();

            $result = $query->fetchAll(PDO::FETCH_ASSOC);

            if (empty($result)) {
                return null;
            }

            return $result;

        } catch(PDOException $e) {
            header('Location: ./error.php');
            exit();
        }
    }

    public function paginate(
        string $sql, 
        array $filters = [],
        int $page = 1, 
        int $limitForPage = 10): ?array
    {
        
        $position = strpos($sql, ' FROM ');
        $query = substr($sql." ", $position, -1);

        $countSql = "SELECT COUNT(0) as cant {$query}";

        $count = $this->query($countSql, $filters);
        $cant = $count[0]['cant'];

        if (!$cant) {
            return null;
        }

        $calculo = (($page * $limitForPage) - $limitForPage);

        $rows = $this->query($sql." LIMIT {$calculo},{$limitForPage}", $filters);

        return [
            "data" => $rows,
            "paginate" => [
                "current_page" => (int)$page,
                "last_page" => ceil($cant / $limitForPage),
                "num_per_page" => (int)$limitForPage,
                "total_records" => (int)$cant
            ]
        ];
    }

    public function exist(string $tableName, string $param, string $value) : bool 
    {
        try{
            $sql = "SELECT 1 FROM $tableName WHERE $param = :value LIMIT 1";

            $query = $this->connection->prepare($sql);

            $query->bindParam(":value", $value);

            $query->execute();

            return $query->rowCount() > 0;

        } catch(PDOException $e) {
            header('Location: ./error.php');
            exit();
        }
    }

    private function bindParams(PDOStatement $query, array $filters): PDOStatement
    {
        foreach ($filters as $key => $value) {
            $query->bindValue($key, $value);
        }
        return $query;
    }
}