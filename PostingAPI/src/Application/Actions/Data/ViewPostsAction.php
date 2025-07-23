<?php 
declare(strict_types=1);

namespace App\Application\Actions\Data;

use Exception;
use Psr\Http\Message\ResponseInterface as Response;

/**
 * 
 */
class ViewPostsAction extends DatabaseAction {

  protected function action(): Response {
    $PostDAO = $this->DAOFactory->getPostDAO();

    $statusCode = 400;
    $response = [
      'message' => 'DAO Error'
    ];
    $posts = $PostDAO->getAll();
    if (count($posts) > 0) {
      return $this->respondWithData($posts);
    } else {
      return $this->respondWithData($response, 400);
    }
    
  }
}