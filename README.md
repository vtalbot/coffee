# CoffeeScript Compiler for Laravel 4 (Illuminate)

[![Build Status](https://travis-ci.org/Ellicom/coffee.png)](https://travis-ci.org/Ellicom/coffee)

### Installation

Run `php artisan config:publish ellicom/coffee`

Then edit `config.php` in `app/packages/ellicom/coffee` to your needs.

Add `'Ellicom\Coffee\CoffeeServiceProvider',` to `providers` in `app/config/app.php`
and `'Coffee' => 'Ellicom\Coffee\Facades\Coffee',` to `aliases` in `app/config/app.php`

### Usage

`<script src="js/test.js"></script>`

If `js/test.js` doesn't exists in the `public` directory, it will search for `test.coffee` in `app/coffee` directory.
If found, compile it if needed and return the result.


### Todo

Add tests.