<?php 
declare(strict_types=1);

namespace App\Application\Actions\Data;

use Exception;
use Psr\Http\Message\ResponseInterface as Response;

/**
 * 
 */
class CreatePostDBAction extends DatabaseAction {

  protected function action(): Response {
    $PostDAO = $this->DAOFactory->getPostDAO();
    $UserDAO = $this->DAOFactory->getUserDAO();

    $response = [
      'message' => 'ERROR: Empty Post'
    ];
    $statusCode = 400;

    $body = $this->request->getparsedbody();

    if (!empty($body) && array_key_exists('postText', $body) && array_key_exists('userId', $body)) {
      $postText = $body['postText'];
      $userId = $body['userId'];
      $user = $UserDAO->getById($userId);
      
      if (gettype($postText) !== "string") {
        $response['message'] = 'ERROR: Invalid type';
      } else if (strlen($postText) == 0) {
        $response['message'] = "ERROR: Empty post text";
      } else {
        $response['message'] = $PostDAO->post($body['postText'], $user);
        $statusCode = 200;
      }
      
    }
    
    return $this->respondWithData($response, $statusCode);
  }
}