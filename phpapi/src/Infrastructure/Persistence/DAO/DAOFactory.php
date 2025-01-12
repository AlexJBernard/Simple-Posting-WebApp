<?php
declare(strict_types=1);
namespace App\Infrastructure\Persistence\DAO;

use App\Infrastructure\Persistence\DBPool;

/**
 * Creates an instance of 
 */
class DAOFactory {
    private $DBPool;

    public function __construct(DBPool $DBPool) {
        $this->DBPool = $DBPool;
    }

    function getUserDAO(): UserDAO {
        return new UserDAO($this->DBPool);
    }

    function getPostDAO(): PostDAO {
        return new PostDAO($this->DBPool);
    }

    public function __get($property): DAO {
        $className = 'SDC\\API\\Infrastructure\\Persistence\\DAO\\'.$property;

        return new $className($this->DBPool);
    }
}