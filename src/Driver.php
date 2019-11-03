<?php

namespace Don47\DatabaseCacheDriver;

use Carbon\Carbon;
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

  /**
   * Remove key from cache
   *
   * @param string $key
   * @return bool
   */
  public function remove(string $key) : bool
  {
    $cached = Cache::where('key', $key)->first();

    if ($cached) {
      return $cached->delete();
    }

    return false;
  }

  /**
   * Assign new item to key
   *
   * @param string $key
   * @param mixed $value
   * @param Carbon $expire
   * @return bool
   */
  public function assign(string $key, $value, ?Carbon $expire = null) : bool
  {
    if (Cache::where('key', $key)->exists()) {
      return Cache::where('key', $key)->update([
        'key' => $key,
        'value' => $value,
        'expiry_date' => $expire
      ]);
    }

    $cached = Cache::create([
      'key' => $key,
      'value' => $value,
      'expiry_date' => $expire
    ]);

    return $cached ? true : false;
  }
}