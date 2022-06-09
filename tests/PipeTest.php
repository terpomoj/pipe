<?php

use Terpomoj\Pipe\Pipe;

it('pipes value', function () {
    $pipe = new Pipe('value');

    expect($pipe->endpipe())->toBe('value');
    expect($pipe->endpipe)->toBe('value');

    $pipe = ($pipe)(fn () => 'new value');

    expect($pipe)->toBeInstanceOf(Pipe::class)->and($pipe->endpipe)->toBe('new value');
});

it('forwards call', function () {
    $pipe = new Pipe(new class {
        public function foo(): string
        {
            return 'bar';
        }
    });

    expect($pipe->foo()->endpipe())->toBe('bar');
});

test('pipe helper exists', function () {
    $pipe = pipe('value');

    expect($pipe->endpipe())->toBe('value');
    expect($pipe->endpipe)->toBe('value');

    $pipe = ($pipe)(fn () => 'new value');

    expect($pipe)->toBeInstanceOf(Pipe::class)->and($pipe->endpipe)->toBe('new value');
});
