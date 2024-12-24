<?php
declare(strict_types=1);

namespace App\Infrastructure\Persistence\DAO;

use App\Infrastructure\Persistence\DBPool;

abstract class DAO {
  /**
   * @var DBPool
   */
  protected $DBPool;

  public function __construct(DBPool $DBPool) {
    $this->DBPool = $DBPool;
  }
}