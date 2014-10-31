<?php

return array(

    /*
    |--------------------------------------------------------------------------
    | CoffeeScript Compiler Options
    |--------------------------------------------------------------------------
    */

    'options' => array(
        'filename' => null,
        'header' => false,
        'bare' => false,
    ),

    /*
    |--------------------------------------------------------------------------
    | CoffeeScript Storage Paths
    |--------------------------------------------------------------------------
    | Based on $app['path'] value.
    */

    'paths' => array('/coffee'),

    /*
    |--------------------------------------------------------------------------
    | CoffeeScript Routes Paths
    |--------------------------------------------------------------------------
    */

    'routes' => array(
        '',
    ),

    /*
    |--------------------------------------------------------------------------
    | JavaScript prefix routes
    |--------------------------------------------------------------------------
    | Just the URL, won't be use to find the CoffeeScript files.
    | Example: example.com/js/jquery/test.js will search for jquery/test.coffee
    */

    'prefix' => 'js/',

    /*
    |--------------------------------------------------------------------------
    | CoffeeScript Routes extensions
    |--------------------------------------------------------------------------
    */

    'extensions' => array('js', 'coffee'),

    /*
    |--------------------------------------------------------------------------
    | Coffee file caching
    |--------------------------------------------------------------------------
    | Minutes
    */

    'expires' => 1440,

    /*
    |--------------------------------------------------------------------------
    | Coffee post processing
    |--------------------------------------------------------------------------
    | Provide a function, and the converted CoffeeScript will be processed
    | by the function before being output
    */

    'post_process' => function($coffee) { return $coffee; },

);
