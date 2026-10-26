<?php
declare(strict_types=1);

interface Publicable
{
    public function publicar(): void;

    public function estaPublicado(): bool;
}