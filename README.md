# Postal

A PHP package for working w/ postal addresses.

In working with US postal addresses, there seems to be no library out there that will help you standardize those strings without having to use costly Geocoding API's.  This is my attempt to create my own standardizing library w/out the use of an API.

## Install

Normal install via Composer.

## Usage

The library attempts to standardize the address by stripping out commas, periods, number signs, and correcting any abbreviations that may be present in the string.

```php
use Travis\Postal;

$string = Postal::street('300 Independence Ave SE #300'); // 300 INDEPENDENCE AVENUE SOUTHEAST 300
$string = Postal::city('St. Louis'); // SAINT LOUIS
$string = Postal::state('Texas'); // TX
$string = Postal::zip('77777-7777'); // 77777
```

Sometimes, when crunching through thousands of addresses, you may want to use hashes to determine the uniqueness of the address.  Stripping commons words from the address, such as ``street`` and ``road``, can be helpful in this context, as users may enter the address differently by including or omitting these words.

```php
$string = Postal::street('300 Independence Ave SE #300', true); // pass true flag, returns "300 INDEPENDENCE SOUTHEAST 300"
```

## Todo

- Add handling for ordinal streets such as ``1st St`` or ``First Street``.