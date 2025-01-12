<?php 
declare(strict_types=1);

namespace App\Application\Actions\Data;

use Exception;
use Psr\Http\Message\ResponseInterface as Response;

/**
 * 
 */
class ViewPostDBAction extends DatabaseAction {

  protected function action(): Response {
    $PostDAO = $this->DAOFactory->getPostDAO();

    $response = [
      'message' => 'DAO Error'
    ];
    
    return $this->respondWithData($response);
  }
}