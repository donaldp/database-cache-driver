<?php

namespace Don47\DatabaseCacheDriver;

use Modulus\Hibernate\Cache\Driver as Base;
use Modulus\Hibernate\Cache\DriverInterface;

class Driver extends Base implements DriverInterface
{
  /**
   * Cache driver
   *
   * @var string
   */
  protected $driver = 'database';

  /**
   * __construct
   *
   * @return void
   */
  public function __construct()
  {
    parent::__construct();
  }

  /**
   * Delete cache
   *
   * @return bool
   */
  public function delete() : bool
  {
    return Cache::truncate();
  }
}