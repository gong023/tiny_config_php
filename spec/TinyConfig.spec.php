<?php

use TinyConfig\TinyConfig;

describe('\TinyConfig\TinyConfig', function () {
    beforeEach(function () {
        TinyConfig::set('hello', 'world');
        TinyConfig::set('foo', 'bar');
    });

    context('get', function () {
        it('should return set value', function () {
            expect(TinyConfig::get('hello'))->to->equal('world');
        });

        it('should throw unset value', function () {
            expect(function () { TinyConfig::get('unknownKey'); })->to->throw('\TinyConfig\TinyConfigEmptyException');
        });
    });

    context('has', function () {
        it('should return true with set value', function () {
            expect(TinyConfig::has('hello'))->to->ok();
        });

        it('should return false with unset value', function () {
            expect(TinyConfig::has('unknownKey'))->not->to->ok();
        });
    });

    context('getAll', function () {
        it('should all set values array', function () {
            $expected = [
                'hello' => 'world',
                'foo'    => 'bar',
            ];

            expect(TinyConfig::getAll())->to->equal($expected);
        });
    });

    context('getKeys', function () {
        it('should return all keys array', function () {
            expect(TinyConfig::getKeys())->to->equal(['hello', 'foo']);
        });
    });

    context('delete', function () {
        it('should unset value', function () {
            TinyConfig::set('a', 'b');
            TinyConfig::delete('a');

            expect(TinyConfig::getKeys())->to->equal(['hello', 'foo']);
        });
    });

    context('delete all', function () {
        it('should unset all values', function () {
            TinyConfig::deleteAll();

            expect(TinyConfig::getAll())->to->empty();
        });
    });
});
