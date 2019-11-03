<?php

namespace Don47\DatabaseCacheDriver\Exceptions;

use Exception;

class InvalidDatabaseConnectionException extends Exception
{
  /**
   * Set error message
   *
   * @param string $name
   */
  public function __construct(string $name)
  {
    $trace = debug_backtrace()[1];

    foreach ($trace as $key => $value) {
      $this->{$key} = $value;
    }

    $this->message = "\"{$name}\" is not a valid database connection.";
  }
} 