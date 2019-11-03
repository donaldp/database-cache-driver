<?php

namespace Don47\DatabaseCacheDriver;

use Illuminate\Database\Eloquent\Model;
use Don47\DatabaseCacheDriver\Mocks\Connection;

class Cache extends Model
{
  use Connection;

  /**
   * The name of the table
   *
   * @var string
   */
  protected $table = 'don47_cache';

  /**
   * The attributes that are mass assignable
   *
   * @var array
   */
  protected $fillable = [
    'key', 'value', 'expiry_date'
  ];

  /**
   * Get default connection
   *
   * @return string
   */
  public function getConnectionName()
  {
    return $this->stringOrNull();
  }
}