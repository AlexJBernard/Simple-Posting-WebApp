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

    $response = [
      'message' => 'DAO Error'
    ];

    $output = implode(',', $_REQUEST);
    echo "<script>console.log('" . $output . "');</script>";

    $body = $this->request->getparsedbody();

    if (! empty($body)) {
      $PostDAO->post($body['postText']);
    }
    
    return $this->respondWithData($response);
  }
}