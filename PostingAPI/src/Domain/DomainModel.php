<?php 
declare(strict_types=1);

namespace App\Domain;

use JsonSerializable;

abstract class DomainModel implements JsonSerializable {
  protected $JSONFields;

  function jsonSerialize():array {
    $result = array();
    foreach($this as $key => $value) {
      if(in_array($key, $this->JSONFields)) {
        $result[$key] = $value;
      }
    }
    return $result;
  }
}