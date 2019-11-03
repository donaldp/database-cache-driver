<?php

use Illuminate\Database\Schema\Blueprint;
use Modulus\Hibernate\{Capsule, Migration};

class Don47DatabaseCacheDriver extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  protected function up()
  {
    Capsule::schema()->create('don47_cache', function (Blueprint $table) {
      $table->increments('id');
      $table->string('key');
      $table->longText('value');
      $table->dateTime('expiry_date')->nullable();
      $table->timestamps();
    });
  }
  /**
   * Reverse the migrations.
   *
   * @return void
   */
  protected function down()
  {
    Capsule::schema()->dropIfExists('don47_cache');
  }
}