[![Build Status](https://travis-ci.org/techno-express/spyc.svg?branch=master)](https://travis-ci.org/techno-express/spyc)[![Codacy Badge](https://api.codacy.com/project/badge/Grade/cf23167ee99d4fe8a56f5886226de70d)](https://app.codacy.com/app/techno-express/spyc?utm_source=github.com&utm_medium=referral&utm_content=techno-express/spyc&utm_campaign=Badge_Grade_Dashboard)
[![codecov](https://codecov.io/gh/techno-express/spyc/branch/master/graph/badge.svg)](https://codecov.io/gh/techno-express/spyc)[![Maintainability](https://api.codeclimate.com/v1/badges/414f3b593f321f4f255f/maintainability)](https://codeclimate.com/github/techno-express/spyc/maintainability)

**Spyc** is a YAML loader/dumper written in pure PHP. Given a YAML document, Spyc will return an array that
you can use however you see fit. Given an array, Spyc will return a string which contains a YAML document 
built from your data.

**YAML** is an amazingly human friendly and strikingly versatile data serialization language which can be used 
for log files, config files, custom protocols, the works. For more information, see http://www.yaml.org.

Spyc supports YAML 1.0 specification.

## Installation

    composer require mustangostang/spyc

## Using Spyc

Using Spyc is trivial:

```php
<?php
require 'vendor/autoload.php';

$Data = Spyc::YAMLLoad('spyc.yaml');
```

or (if you prefer functional syntax)

```php
<?php
require 'vendor/autoload.php';

$Data = spyc_load_file('spyc.yaml');
```

## Donations, anyone?

If you find Spyc useful, I'm accepting Bitcoin donations (who doesn't these days?) at 193bEkLP7zMrNLZm9UdUet4puGD5mQiLai
