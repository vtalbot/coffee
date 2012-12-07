<?php

namespace Ellicom\Coffee\Compilers;

use Illuminate\Filesystem;
use Illuminate\View\Compilers\Compiler;
use Illuminate\View\Compilers\CompilerInterface;
use CoffeeScript\Compiler as Coffee;

class CoffeeCompiler extends Compiler implements CompilerInterface {

  /**
   * Compile the CoffeeScript at the given path.
   *
   * @param  string  $path
   * @return void
   */
  public function compile($path)
  {
    $app = app();
    
    $options = $app['config']['coffee.options'];

    $contents = Coffee::compile($this->files->get($path), $options);

    if ( ! is_null($this->cachePath))
    {
      $this->files->put($this->getCompiledPath($path), $contents);
    }
  }

}