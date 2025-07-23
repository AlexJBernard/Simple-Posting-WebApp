<?php
declare(strict_types=1);
namespace App\Domain\Models;

use App\Domain\DomainModel;

class User extends DomainModel {
  // User's id number in database
  public $id = null;

  // User's username
  public $username = null;

  // User's input first name
  public $firstname = null;

  // User's input last name
  public $lastname = null;

  function __construct($data) {
    $this->JSONFields = array("id", "username", "firstname", "lastname");
    if(is_array($data)) { // FROM DATABASE
      $this->id = (int)$data['user_id'];
      $this->username = $data['username'];
      $this->firstname = $data['firstname'];
      $this->lastname = $data['lastname'];
    } elseif(is_object($data)) { // FROM OBJECT
      if(isset($data->id)) {
        $this->id = $data->id;
      }
      $this->username = $data->username;
      $this->firstname = $data->firstname;
      $this->lastname = $data->lastname;
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
      case "username":
        return $this->username;
        break;
      case "firstname":
        return $this->firstname;
        break;
      case "lastname":
        return $this->lastname;
        break;
    }
  }
}