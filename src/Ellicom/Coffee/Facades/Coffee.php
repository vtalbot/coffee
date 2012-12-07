<?php

namespace Ellicom\Coffee\Facades;

use Illuminate\Support\Facades\Facade;

class Coffee extends Facade {

  /**
   * Get the registered name of the component.
   *
   * @return string
   */
  protected static function getFacadeAccessor() { return 'coffee'; }

}