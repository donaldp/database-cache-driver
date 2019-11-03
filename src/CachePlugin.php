<?php

namespace Don47\DatabaseCacheDriver;

use Modulus\Utility\Plugin;
use Modulus\Hibernate\Cache\CacheBase;
use Don47\DatabaseCacheDriver\Mocks\Connection;

class CachePlugin extends Plugin
{
  use Connection;

  /*
  |--------------------------------------------------------------------------
  | Plugin information
  |--------------------------------------------------------------------------
  */

  /**
   * Interact::NAME
   */
  const PACKAGE = 'Database Cache Driver';

  /**
   * Interact::VERSION
   */
  const VERSION = '0.1';

  /**
   * Interact::FRAMEWORK
   */
  const FRAMEWORK = '1.9.*|2.*';

  /**
   * Interact::AUTHORS
   */
  const AUTHORS = [
    'Donald Pakkies' => 'donaldpakkies@gmail.com'
  ];

  /*
  |--------------------------------------------------------------------------
  | Plugin installation
  |--------------------------------------------------------------------------
  */

  /**
   * Interact::MIGRATION
   */
  const MIGRATION = 'don47_database_cache_driver';

  /*
  |--------------------------------------------------------------------------
  | Start Plugin
  |--------------------------------------------------------------------------
  */

  /**
   * Check if the config is present before loading the plugin
   *
   * @return bool
   */
  public function onload() : bool
  {
    return $this->stringOrNull() ? true : false;
  }

  /**
   * Boot up service
   *
   * @param mixed $app
   * @return void
   */
  public static function boot($app)
  {
    CacheBase::register('database', Driver::class);
  }
}
