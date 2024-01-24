<?php

namespace Services;
use Library\Database;
use PDO;
use services;
class MainService
{

    public function __construct(private Database $database,
    )
    {
    }



    public function vivaRedirectOrderSuccess(array $data) : bool
    {

            $conn = $this->database->getConnection();

            $sql = "UPDATE orders SET TransactionId = :transactionId, StateId = :stateId WHERE OrderCode = :orderCode";

            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':transactionId', $data['transactionId'], PDO::PARAM_STR);
            $stmt->bindParam(':stateId', $data['stateId'], PDO::PARAM_STR);
            $stmt->bindParam(':orderCode', $data['orderCode'], PDO::PARAM_STR);

            $check = $stmt->execute();



        return $check;
    }

}
