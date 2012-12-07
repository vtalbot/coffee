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
    */

    'paths' => array(__DIR__.'/../coffee'),

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
    | Example: ellicom.com/js/jquery/test.js will search for jquery/test.coffee
    */

    'prefix' => 'js/',

    /*
    |--------------------------------------------------------------------------
    | CoffeeScript Routes extensions
    |--------------------------------------------------------------------------
    */

    'extensions' => array('js', 'coffee'),

);
