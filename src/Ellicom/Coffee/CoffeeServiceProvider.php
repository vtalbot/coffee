<?php

namespace Ellicom\Coffee;

use Illuminate\Support\MessageBag;
use Illuminate\Support\ServiceProvider;
use Illuminate\View\Engines\CompilerEngine;
use Illuminate\View\Engines\EngineResolver;
use Illuminate\View\FileViewFinder;
use Ellicom\Coffee\Compilers\CoffeeCompiler;

class CoffeeServiceProvider extends ServiceProvider {

  /**
   * Register the service provider.
   *
   * @return void
   */
  public function register()
  {
    $this->registerRoutes();

    $this->registerEngineResolver();

    $this->registerCoffeeFinder();

    $this->registerEnvironment();
  }

  /**
   * Register routes to catch CoffeeScript request.
   *
   * @return void
   */
  public function registerRoutes()
  {
    $app = $this->app;

    $prefix = $app['config']['coffee.prefix'];

    foreach ($app['config']['coffee.routes'] as $routes)
    {
      foreach ($app['config']['coffee.extensions'] as $ext)
      {
        \Route::get($prefix.$routes.'{file}.'.$ext, function($file) use ($routes)
        {
          $coffee = \Coffee::make($routes.$file);
          return \Response::make($coffee, 200, array('Content-Type' => 'text/javascript'));
        });
      }
    }
  }

  /**
   * Register the engine resolver instance.
   *
   * @return void
   */
  public function registerEngineResolver()
  {
    list($me, $app) = array($this, $this->app);

    $app['coffee.engine.resolver'] = $app->share(function($app) use ($me)
    {
      $resolver = new EngineResolver;

      foreach (array('coffee') as $engine)
      {
        $me->{'register'.ucfirst($engine).'Engine'}($resolver);
      }

      return $resolver;
    });
  }

  /**
   * Register the CoffeeScript engine implementation.
   *
   * @param  Iluminate\View\Engines\EngineResolver  $resolver
   * @return void
   */
  public function registerCoffeeEngine($resolver)
  {
    $app = $this->app;

    $resolver->register('coffee', function() use ($app)
    {
      $cache = $app['path'].'/storage/coffee';

      if ( ! $app['files']->isDirectory($cache))
      {
        $app['files']->makeDirectory($cache);
      }

      $compiler = new CoffeeCompiler($app['files'], $cache);

      return new CompilerEngine($compiler, $app['files']);
    });
  }

  /**
   * Register the CoffeeScript finder implementation.
   *
   * @return void
   */
  public function registerCoffeeFinder()
  {
    $this->app['coffee.finder'] = $this->app->share(function($app)
    {
      $paths = $app['config']['coffee.paths'];

      return new FileViewFinder($app['files'], $paths, array('coffee'));
    });
  }

  /**
   * Register the CoffeeScript environment.
   *
   * @return void
   */
  public function registerEnvironment()
  {
    $me = $this;

    $this->app['coffee'] = $this->app->share(function($app) use ($me)
    {
      $resolver = $app['coffee.engine.resolver'];

      $finder = $app['coffee.finder'];

      $events = $app['events'];

      $environment = new Environment($resolver, $finder, $events);

      $environment->setContainer($app);

      $environment->share('app', $app);

      return $environment;
    });
  }

}