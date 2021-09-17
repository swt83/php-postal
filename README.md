# Postal

A PHP package for working w/ postal addresses.

In working with US postal addresses, there seems to be no library out there that will help you standardize those strings without having to use costly Geocoding API's.  This is my attempt to create my own standardizing library w/out the use of an API.

## Install

Normal install via Composer.

## Usage

```php
use Travis\Postal;

$string = Postal::run('300 Independence Ave SE #300'); // returns "300 INDEPENDENCE AVENUE SOUTHEAST 300"
```