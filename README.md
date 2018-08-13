<p><img alt="Video of the Nyan Cat result printer for PHPUnit" src="https://github.com/JeroenDeDauw/nyancat-phpunit-resultprinter/raw/master/nyan.gif"></p>

## Requirements

The Nyan Cat result printer for PHPUnit requires a terminal emulator with support
for ANSI escape sequences, including color and cursor control.

<table>
	<tr>
		<th></th>
		<th>PHP</th>
		<th>PHPUnit</th>
		<th>Awesome</th>
	</tr>
	<tr>
		<th>Version 2.1</th>
		<td>~7.1</td>
		<td>~7.0</td>
		<td>~=[,,_,,]:3</td>
	</tr>
	<tr>
		<th>Version 2.0</th>
		<td>~7.0</td>
		<td>~6.0</td>
		<td>~=[,,_,,]:3</td>
	</tr>
	<tr>
		<th>Version 1.3</th>
		<td>~7.0|^5.3.3</td>
		<td>~5.0|~4.0</td>
		<td>~=[,,_,,]:3</td>
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
        "whatthejeff/nyancat-phpunit-resultprinter": "^2.0"
    }
}
~~~

Once installed, add the following attributes to the `<phpunit>` element in your
`phpunit.xml` file:

    printerFile="vendor/whatthejeff/nyancat-phpunit-resultprinter/src/NyanCat/PHPUnit/ResultPrinter.php"
    printerClass="NyanCat\PHPUnit\ResultPrinter"

**NOTE:** If PHPUnit was not installed via composer, you also need to include
the composer autoloader. One easy way to do this is to add the following
attribute to the `<phpunit>` element in your `phpunit.xml` file:

    bootstrap="vendor/autoload.php"

## Tests

[![Build Status](https://travis-ci.org/JeroenDeDauw/nyancat-phpunit-resultprinter.svg?branch=master)](https://travis-ci.org/JeroenDeDauw/nyancat-phpunit-resultprinter)

To run the test suite, you need [composer](http://getcomposer.org).

    $ composer install
    $ composer test

## Acknowledgements

The Nyan Cat result printer for PHPUnit was __heavily__ inspired by the
glorious [mocha/nyan.js](https://github.com/visionmedia/mocha/blob/master/lib/reporters/nyan.js).

## License

The Nyan Cat result printer for PHPUnit is licensed under the [MIT license](LICENSE).
