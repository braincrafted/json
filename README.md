BraincraftedJson
================

[![Build Status](https://travis-ci.org/braincrafted/json.png)](https://travis-ci.org/braincrafted/json)

An object-orientated wrapper for json_encode() and json_decode() with error handling.

By [Florian Eckerstorfer](http://florian.ec).

Installation
------------

The recommended way of installing BraincraftedJson is through [Composer](http://getcomposer.org):

    {
        "require": {
            "braincrafted/json": "dev-master"
        }
    }

Usage
-----

    <?php

    use Braincrafted\Json\Json;
    use Braincrafted\Json\JsonDecodeException;

    // Encode a variable as JSON:
    echo Json::encode(array('name' => 'Bilbo Baggins'));

    // Decode JSON:
    print_r(Json::decode('{"name": "Bilbo Baggins"}'));

    // Error handling
    try {
        Json::decode('{"name": "Bilbo Baggins"'); // missing }
    } catch (JsonDecodeException $e) {
        echo sprintf("Could not decode JSON.\nReason: %s", $e->getMessage());
    }


Changelog
---------

### Version 0.2 (15 November 2013)

- Changed namespace to `Braincrafted`


License
-------

```
The MIT License (MIT)

Copyright (c) 2013 Florian Eckerstorfer

Permission is hereby granted, free of charge, to any person obtaining a copy
of this software and associated documentation files (the "Software"), to deal
in the Software without restriction, including without limitation the rights
to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the Software is
furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in
all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
THE SOFTWARE.
```
