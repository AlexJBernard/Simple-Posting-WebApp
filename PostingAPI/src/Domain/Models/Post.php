<?php
declare(strict_types=1);
namespace App\Domain\Models;

use App\Domain\DomainModel;

class Post extends DomainModel {
  //Post's id number in database
  public $id = null;

  // Post Text
  public $text = null;

  // User responsible for posting
  public $User = null;

  function __construct($data) {
    $this->JSONFields = array("id", "text", "User");
    if(is_array($data)) { // FROM DATABASE
      $this->id = (int)$data['post_id'];
      $this->text = $data['post_text'];
      $this->User = new User($data);
    } elseif(is_object($data)) { // FROM OBJECT
      if(isset($data->id)) {
        $this->id = $data->id;
      }
      $this->text = $data->text;
      $this->User = $data->User;
    }
  }

  function jsonSerialize():array {
    $result = parent::jsonSerialize();
    return $result;
  }

  public function __get($property) {
    switch($property) {
      case "id":
        return $this->id;
        break;
      case "text":
        return $this->text;
        break;
      case "user":
        return $this->User;
        break;
    }
  }
}