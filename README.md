# CoffeeScript Compiler for Laravel 4 (Illuminate)

### Installation

Add to your composer.json those lines

    "require": {
        "vtalbot/coffee": "1.*"
    }

Run `php artisan config:publish vtalbot/coffee`

Then edit `config.php` in `app/packages/vtalbot/coffee` to your needs.

Add `'VTalbot\Coffee\CoffeeServiceProvider',` to `providers` in `app/config/app.php`
and `'Coffee' => 'VTalbot\Coffee\Facades\Coffee',` to `aliases` in `app/config/app.php`

### Usage

    <script src="js/test.js"></script>

If `js/test.js` doesn't exists in the `public` directory, it will search for `test.coffee` in `app/coffee` directory.
If found, compile it if needed and return the result.

    Coffee::make('file-in-coffee-directory');
