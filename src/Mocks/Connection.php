<?php

namespace Don47\DatabaseCacheDriver\Mocks;

use Modulus\Support\Config;
use Don47\DatabaseCacheDriver\Exceptions\InvalidDatabaseConnectionException;

trait Connection
{
  /**
   * Get connection name
   *
   * @param string|null $name
   * @throws InvalidDatabaseConnectionException
   * @return string
   */
  public function stringOrNull(?string $name = null)
  {
    $cache      = Config::get('cache.default');

    $connection = Config::get("cache.connections.{$cache}");

    if (
      isset($connection['driver']) &&
      isset($connection['connection']) &&
      $connection['driver'] == 'database'
    ) {
      $connection = $connection['connection'];

      if (Config::has("database.connections.{$connection}")) return $connection;

      throw new InvalidDatabaseConnectionException($connection);
    }

    return $name;
  }
}