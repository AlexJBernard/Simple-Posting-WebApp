<?php

declare(strict_types=1);

namespace App\Application\Actions\Data;

use Exception;
use Psr\Http\Message\ResponseInterface as Response;

/**
 * Returns a list of usernames from the user database
 */
class ViewUserDBAction extends DatabaseAction {

  protected function action(): Response {
    
    $UserDAO = $this->DAOFactory->getUserDAO();
    $response = [
      'message' => 'DAO Error'
    ];
    $Users = $UserDAO->getAll();
    if ($Users) {
      return $this->respondWithData($Users);
    } else {
      return $this->respondWithData($response, 404);
    }
  }
}