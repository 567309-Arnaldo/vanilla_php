<?php
declare(strict_types=1);

abstract class Modelo
{
    public function __construct(
        public readonly int $id,
    ) {
    }

    abstract public function descripcion(): string;
}