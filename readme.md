Oatmeal
-------------

Oatmeal is a cookie manager for modern, object-oriented PHP development. Oatmeal works both as a standalone package, as well as having built-in integration into Laravel.

### Requirements ###

Oatmeal requires PHP 7.0 and higher.

### Installation ###

Installation is done via composer

~~~shell
composer require elle-the-dev/oatmeal
~~~

If we want to integrate into Laravel, we'll additionally want to run

~~~shell
php artisan vendor:publish
~~~

This will publish the config file to `config/oatmeal.php`.

Also for Laravel, if we don't use auto-discovery, we'll need to add `OatmealServiceProvider` to the providers array in `config/app.php`

~~~php
ElleTheDev\Oatmeal\Providers\OatmealServiceProvider::class,
~~~

### Usage ###

#### Instantiation ####

Ideally we'll be using Oatmeal with a side of dependency injection, but this is what it looks like to instantiate a new instance on its own.

~~~php
$oatmeal = new ElleTheDev\Oatmeal\Oatmeal;
~~~

Configuration can be passed in via the constructor so we don't need to specify path, domain, https and http-only settings each time we want to set a cookie.

~~~php
$oatmeal = new ElleTheDev\Oatmeal\Oatmeal([
    'path' => '/',
    'domain' => 'example.com',
    'secure' => false,
    'httpOnly' => true,
]);
~~~

In Laravel, the service provider allows for auto-injecting the Oatmeal interface and autoloading the config from `config/oatmeal.php`

~~~php
use ElleTheDev\Oatmeal\Contracts\Oatmeal;

class ExampleController extends Controller
{
    public function show(Oatmeal $oatmeal)
    {
    }
}
~~~

When injecting in Laravel, Oatmeal will automatically be loaded using the config file `config/oatmeal.php`.

#### Setting ####

We can set a basic cookie with a timeout in minutes. `set` will also update the `$_COOKIE` superglobal array with the new cookie value.

~~~php
$oatmeal->set('name', 'value', 60);
~~~

We can also store a cookie with no expiration (note: it technically expires in ~5 years)

~~~php
$oatmeal->forever('name', 'value');
~~~

If we need to change settings before setting a cookie, we can do so through chained method calls.

~~~php
$oatmeal->setPath('/')
    ->setDomain('example.com')
    ->setSecure(false)
    ->setHttpOnly(true)
    ->set('name', 'value', 60);
~~~

#### Getting ####

Getting a cookie is as simple as calling `get`. If the requested cookie does not exist or is expired, `get` will return `null`

~~~php
$value = $oatmeal->get('name');
~~~

If we'd like to forget the cookie after getting it, we can `pull` instead. `pull` will also update the `$_COOKIE` superglobal to remove the pulled cookie.

~~~php
$value = $oatmeal->pull('name');
~~~

#### Deleting ####

We can delete a cookie using `forget`

~~~php
$oatmeal->forget('name');
~~~
