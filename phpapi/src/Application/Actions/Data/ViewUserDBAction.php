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
    //if (empty($_REQUEST['id'])) {
      
    //  return $this->response();
    //}

    //$userId = $_REQUEST['id'];
    $UserDAO = $this->DAOFactory->getUserDAO();
    $response = [
      'message' => 'Message Error'
    ];
    if ($UserDAO->getAll() > 0) {
      $response['message'] = 'Response Recieved';
    }
    return $this->respondWithData($response);
  }
}