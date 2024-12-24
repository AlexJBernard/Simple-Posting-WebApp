<?php
declare(strict_types=1);
namespace App\Infrastructure\Persistence\DAO;

use App\Infrastructure\Persistence\DBIterator;
use App\Domain\Models\User;

class UserDAO extends DAO {

    private $BaseQuery = "SELECT * FROM users ";

    function getById($userId) {
        $DBConn = $this->DBPool->request();
        $DBConn->query($this->BaseQuery . "WHERE user_id = ?",
            array(
                array("value" => $userId, "type" => \PDO::PARAM_INT)
            ));
        $User = null;
        if ($DBConn->nextRow()) {
            $User = new User($DBConn->getRow());
        }
        $this->DBPool->release($DBConn);
        
        return $User;
    }

    function getAll() {
        $DBConn = $this->DBPool->request();
        $DBConn->query($this->BaseQuery);
        $Users = 0;
        if ($DBConn->nextRow()) {
            $Users = 1;
        }
        $this->DBPool->release($DBConn);
        return $Users;
    }

    /**
     * 
     */
    function getIterator() {
        $DBConn = $this->DBPool->request();
    }
}