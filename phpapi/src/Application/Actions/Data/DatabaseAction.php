<?php
declare(strict_types=1);

namespace App\Application\Actions\Data;

use App\Application\Actions\Action;
use App\Infrastructure\Persistence\DAO\DAOFactory;
use Psr\Log\LoggerInterface;

abstract class DatabaseAction extends Action
{
    protected DAOFactory $DAOFactory;

    public function __construct(LoggerInterface $logger, DAOFactory $DAOFactory)
    {
        
        parent::__construct($logger);
        $this->DAOFactory = $DAOFactory;
    }
}
