tiny_config_php
=====================

[![Build Status](https://travis-ci.org/gong023/tiny_config_php.svg?branch=master)](https://travis-ci.org/gong023/tiny_config_php)

```php
use \TinyConfig\TinyConfig;

TinyConfig::set('hello', 'world');
TinyConfig::set('foo', 'bar');

TinyConfig::get('hello');
=> 'world'

TinyConfig::get('unknownKey');
=> Throws TinyConfigEmptyException

TinyConfig::has('hello');
=> true

TinyConfig::getAll();
=> ['hello' => 'world', 'foo' => 'bar'];

TinyConfig::getKeys();
=> ['hello', 'foo'];

TinyConfig::delete('hello');
TinyConfig::getAll();
=> ['foo' => 'bar'];

TinyConfig::deleteAll();
TinyConfig::getAll();
=> [];
```
