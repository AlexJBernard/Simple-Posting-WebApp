<?php

declare(strict_types=1);

namespace App\Application\Actions\Data;

use Exception;
use Psr\Http\Message\ResponseInterface as Response;

/**
 * Returns a list of usernames from the user database
 */
class ViewUserIdDBAction extends DatabaseAction {

  protected function action(): Response {
    $response = [
      'message' => 'Message Error'
    ];

    // ERROR CHECK: No ID given
    if (empty($_REQUEST['id'])) {
      $response['message'] = 'No id';
      return $this->respondWithData($response);
    }

    $userId = $_REQUEST['id'];
    $UserDAO = $this->DAOFactory->getUserDAO();
    $User = $UserDAO->getById($userId);
    if ($User) {
      return $this->respondWithData([
        'user' => $User
      ]);
    } else {
      return $this->respondWithData($response);
    }
  }
}