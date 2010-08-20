# AZN Rates module for Kohana 3 (KO3) PHP Framework

An open source module to fetch and format AZN exchange rates from www.cbr.ru (The Central Bank of the Russian Federation) for [Kohana Framework](http://kohanaphp.com/) (KohanaPHP v3). 
Kohana AZNrates is licensed under the [New BSD License](http://creativecommons.org/licenses/BSD/).

## Quick Start

### Download and install
Download the module from [downloads section](http://github.com/NARKOZ/kohana-aznrates/downloads) and place into `modules` folder.

### Download and install using Git
First, add the submodule to your Git application:

	git submodule add git://github.com/NARKOZ/kohana-aznrates.git modules/aznrates
	git submodule update --init

Or clone the the module separately:

	cd modules
	git clone git://github.com/NARKOZ/kohana-aznrates.git aznrates

### Update module using Git

	cd modules/aznrates
	git submodule update --init

### Modify the Config File

Add to `modules` setting in the `application/bootstrap.php` this line of code:

	Kohana::modules(array(
		...
		'aznrates' => MODPATH.'aznrates',
		...
	));

### See a result
Go to `/aznxrates` or `/aznxrates/date` (date formatted as dd.mm.yyyy, for example: 14.06.2010).

## Sample Output
<pre>
Array
(
    [AZN] => 1
    [RUR] => 0.0376
    [USD] => 1.4727
    [EUR] => 1.7426
    [AUD] => 1.7426
    [JPY] => 1.7426
    [GBP] => 1.7426
    [BYR] => 1.7426
    [LVL] => 1.7426
    [TRY] => 1.7426
    [UAH] => 1.7426
    [EEK] => 1.7426
)
</pre>

You can add more currency valutes in the `classes/model/currency.php` file.