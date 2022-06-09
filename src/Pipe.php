<?php

declare(strict_types=1);

namespace Terpomoj\Pipe;

use JetBrains\PhpStorm\Pure;

/**
 * @template PipeValue
 *
 * @property PipeValue $endpipe
 */
final class Pipe
{
    /**
     * @param PipeValue $value
     */
    public function __construct(
        private mixed $value
    ) {
    }

    public function __call(string $name, array $arguments): self
    {
        return new self(($this->value)->{$name}(...$arguments));
    }

    public function __invoke(callable $callback): self
    {
        return new self($callback($this->value));
    }

    public function endpipe(): mixed
    {
        return $this->value;
    }

    /** @noinspection MagicMethodsValidityInspection */
    #[Pure] public function __get(string $name): mixed
    {
        if ($name === 'endpipe') {
            return $this->value;
        }

        return new self($this->value->{$name});
    }
}
