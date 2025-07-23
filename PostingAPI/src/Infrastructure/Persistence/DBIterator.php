<?php
declare(strict_types=1);
namespace App\Infrastructure\Persistence;

/**
 *
 * DBPDO LIBRARY FOR PHP - VERSION 1.0 - http://ignacioxd.com/
 *
 * Copyright (C) Ignacio X. Domínguez
 *
 * For more information, visit http://ignacioxd.com/
 *
 * This notice may not be removed or altered from any source distribution.
 * This software is provided 'as-is', without any express or implied warranty.
 * In no event will the author be held liable for any damages arising from the
 * use of this software. Permission is granted to anyone to use this software
 * for any purpose, including commercial applications subject to the following
 * restrictions:
 *
 * 1. The origin of this software must not be misrepresented; you must not claim
 * that you wrote the original software. If you use this software in a product,
 * an acknowledgment in the product would be appreciated but is not required.
 *
 * 2. Altered source versions must be plainly marked as such, and must not be
 * misrepresented as being the original software.
 *
 * 3. This notice may not be removed or altered from any source distribution.
 *
 */



class DBIterator implements \Iterator {
	private $current = null;
	private $DBObj = null;
	private $className = "";
	private $position = 0;

	function __construct(DBPDO $DBObj, $className) {
		$this->DBObj = $DBObj;
		$this->className = "\\App\\Domain\\Models\\{$className}";
		$this->next();
	}

	function current(): \App\Domain\DomainModel {
		return $this->current;
	}

	function key(): mixed {
	}

	function next(): void {
		if($this->DBObj->nextRow()) {
			$this->current = new $this->className($this->DBObj->getRow());
			$this->position++;
		}
		else
			$this->current = null;
	}

	function rewind(): void {
	}

	function valid(): bool {
		return $this->current != null;
	}

	function currentPosition() {
		return $this->position;
	}

	function count() {
		return $this->DBObj->totalRows() + 0;
	}

	function isFirst() {
		return $this->currentPosition() == 1;
	}

	function isLast() {
		return $this->count() == $this->currentPosition();
	}

  function toArray() {
	  return iterator_to_array($this, false);
  }

}
