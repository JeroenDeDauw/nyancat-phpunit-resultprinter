[![Build Status](https://travis-ci.org/JeroenDeDauw/nyancat-phpunit-resultprinter.svg?branch=master)](https://travis-ci.org/JeroenDeDauw/nyancat-phpunit-resultprinter)
[![Latest Stable Version](https://poser.pugx.org/jeroen/nyancat-phpunit-resultprinter/version.png)](https://packagist.org/packages/jeroen/nyancat-phpunit-resultprinter)
[![Download count](https://poser.pugx.org/jeroen/nyancat-phpunit-resultprinter/d/total.png)](https://packagist.org/packages/jeroen/nyancat-phpunit-resultprinter)

<p><img alt="Video of the Nyan Cat result printer for PHPUnit" src="https://github.com/JeroenDeDauw/nyancat-phpunit-resultprinter/raw/master/nyan.gif"></p>

## Requirements

The Nyan Cat result printer for PHPUnit requires a terminal emulator with support
for ANSI escape sequences, including color and cursor control.

<table>
	<tr>
		<th></th>
		<th>PHPUnit</th>
		<th>PHP</th>
		<th>~=[,,_,,]:3</th>
	</tr>
	<tr>
		<th>Nyan v2.4</th>
		<td>9.x, 8.x, 7.x</td>
		<td>>=7.1</td>
		<td>✔</td>
	</tr>
	<tr>
		<th>Nyan v2.3</th>
		<td>8.x, 7.x</td>
		<td>~7.1</td>
		<td>✔</td>
	</tr>
	<tr>
		<th>Nyan v2.1 & 2.2</th>
		<td>7.x</td>
		<td>~7.1</td>
		<td>✔</td>
	</tr>
	<tr>
		<th>Nyan v2.0</th>
		<td>6.x</td>
		<td>~7.0</td>
		<td>✔</td>
	</tr>
	<tr>
		<th>Nyan v1.3</th>
		<td>4.x, 5.x</td>
		<td>~7.0|^5.3.3</td>
		<td>✔</td>
	</tr>
</table>

**NOTE:** By default, the Windows console does not support ANSI escape
sequences. If you'd like to use the Nyan Cat result printer on Windows, you
may want to try one of the following solutions:

 * [ANSICON](https://github.com/adoxa/ansicon)
 * [ConEmu](https://github.com/Maximus5/ConEmu)

## Installation

The recommended way to install the Nyan Cat result printer for PHPUnit is
[through composer](http://getcomposer.org). Just create a `composer.json` file
and run the `composer install` command to install it:

~~~json
{
    "require-dev": {
        "jeroen/nyancat-phpunit-resultprinter": "^2.0"
    }
}
~~~

Once installed, add the following attributes to the `<phpunit>` element in your `phpunit.xml` file:

    printerFile="vendor/jeroen/nyancat-phpunit-resultprinter/src/NyanCat/PHPUnit/ResultPrinter.php"
    printerClass="NyanCat\PHPUnit\ResultPrinter"

**NOTE:** If PHPUnit was not installed via composer, you also need to include
the composer autoloader. One easy way to do this is to add the following
attribute to the `<phpunit>` element in your `phpunit.xml` file:

    bootstrap="vendor/autoload.php"

## Switching over from whatthejeff

To switch from `whatthejeff/nyancat-phpunit-resultprinter` to `jeroen/nyancat-phpunit-resultprinter`,
you need to

1. Update your `composer.json`: replace `whatthejeff/nyancat` by `jeroen/nyancat`
2. Update your `phpunit.xml`: replace `vendor/whatthejeff/` by `vendor/jeroen/`
3. Run `composer update`

## Tests

To run the test suite, you need [composer](http://getcomposer.org).

    $ composer install
    $ composer test

## Acknowledgements

The Nyan Cat result printer for PHPUnit was __heavily__ inspired by the
glorious [mocha/nyan.js](https://github.com/visionmedia/mocha/blob/master/lib/reporters/nyan.js).

## License

The Nyan Cat result printer for PHPUnit is licensed under the [MIT license](LICENSE).
