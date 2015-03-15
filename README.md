HTML Compressor
===============

HTML output compressor and minimizer written in PHP. This package is a part of the Hups Framework.  

Features
--------

-   Removes whitespaces
-   Removes comments
-   Replaces absolute URLs with relative ones
-   Low memory usage

Installation
------------

https://packagist.org/packages/shakahl/hups-util-htmlcompressor

Add `shakahl/hups-util-htmlcompressor` as a requirement to `composer.json`:

```javascript
{
    "require": {
        "shakahl/hups-util-htmlcompressor": "dev-master"
    }
}
```

Update your packages with `composer update` or install with `composer install`.

You can also add the package using `composer require shakahl/hups-util-htmlcompressor` and later specifying the version you want (for now, `dev-master` is your best bet).

Usage example
-------------

~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
<?php  
$c = new \Hups\Util\HTMLCompressor($html);
$c->compress();

echo $c->get();
?>
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

Unit testing
------------

### Under Windows

~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
$ composer update
$ vendor/bin/phpunit​.bat
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

### Under Linux

~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
$ composer update
$ vendor/bin/phpunit​
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
