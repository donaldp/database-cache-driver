<?php

namespace Don47\DatabaseCacheDriver;

use Modulus\Hibernate\Cache\Driver as Base;
use Modulus\Hibernate\Cache\DriverInterface;

class Driver extends Base implements DriverInterface
{
  /**
   * __construct
   *
   * @return void
   */
  public function __construct()
  {
    parent::__construct();
  }
}