<?php

namespace Ellicom\Coffee;

use Illuminate\View\Engines\EngineInterface;
use Illuminate\Support\Contracts\RenderableInterface as Renderable;

class Coffee implements Renderable {

  /**
   * The CoffeeScript environment instance.
   *
   * @var Ellicom\Coffee\Environment
   */
  protected $environment;

  /**
   * The engine implementation
   *
   * @var Illuminate\View\Engines\EngineInterface
   */
  protected $engine;

  /**
   * The name of the CoffeeScript.
   *
   * @var string
   */
  protected $coffee;

  /**
   * The path to the CoffeeScript file.
   *
   * @var string
   */
  protected $path;

  /**
   * Create a new CoffeeScript instance.
   *
   * @param  Ellicom\Coffee\Environment  $environment
   * @param  Illuminate\View\Engines\EngineInterface  $engine
   * @param  string  $coffee
   * @param  string  $path
   * @return void
   */
  public function __construct(Environment $environment, EngineInterface $engine, $coffee, $path)
  {
    $this->environment = $environment;
    $this->engine = $engine;
    $this->coffee = $coffee;
    $this->path = $path;
  }

  /**
   * Get the string contents of the CoffeeScript.
   *
   * @return string
   */
  public function render()
  {
    $env = $this->environment;

    $env->incrementRender();

    $contents = $this->getContents();

    $env->decrementRender();

    return $contents;
  }

  /**
   * Get the evaluated contents of the CoffeeScript.
   *
   * @return string
   */
  protected function getContents()
  {
    return $this->engine->get($this->path);
  }

  /**
   * Get the CoffeeScript environment instance.
   *
   * @return Ellicom\Coffee\Environment
   */
  public function getEnvironment()
  {
    return $this->environment;
  }

  /**
   * Get the CoffeeScript's rendering engine.
   *
   * @return Illuminate\View\Engines\EngineInterface
   */
  public function getEngine()
  {
    return $this->engine;
  }

  /**
   * Get the name of the CoffeeScript.
   *
   * @return string
   */
  public function getName()
  {
    return $this->coffee;
  }

  /**
   * Get the path to the CoffeeScript file.
   *
   * @return string
   */
  public function getPath()
  {
    return $this->path;
  }

  /**
   * Set the path to the CoffeeScript.
   *
   * @param  string  $path
   * @return void
   */
  public function setPath($path)
  {
    $this->path = $path;
  }

  /**
   * Get the string contents of the CoffeeScript.
   *
   * @return string
   */
  public function __toString()
  {
    return $this->render();
  }
}