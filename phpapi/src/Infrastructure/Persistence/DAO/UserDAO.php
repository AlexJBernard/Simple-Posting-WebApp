<?php
declare(strict_types=1);
namespace App\Infrastructure\Persistence\DAO;

use App\Infrastructure\Persistence\DBIterator;
use App\Domain\Models\User;

class UserDAO extends DAO {

    /**
     * SQL Query used to select a result from the user table
     */
    private $BaseQuery = "SELECT * FROM users ";

    /**
     * Returns user information based on the given id
     */
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

    /**
     * Returns a full list of users from the User Database
     */
    function getAll() {
        $DBConn = $this->DBPool->request();
        $UserIterator = $this->getIterator("");
        $Users = $UserIterator->toArray();
        return $Users;
    }

    /**
     * Creates an Iterator for the result of the given SQL query
     * @param appendQuery String appended to the end of the program's base query
     */
    function getIterator($appendQuery) {
        $DBConn = $this->DBPool->request();
        $DBConn->query($this->BaseQuery . $appendQuery);
        return new DBIterator($DBConn, "User");
    }
}