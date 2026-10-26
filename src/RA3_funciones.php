<?php
declare(strict_types=1);

function horasRestantes(int $horasTotales, int $horasCursadas): int
{
    return $horasTotales - $horasCursadas;
}

function titulacion(string $grado = 'Superior'): string
{
    return match ($grado) {
        'Superior' => 'Técnico Superior',
        'Medio' => 'Técnico',
        default => 'Titulación desconocida',
    };
}

function enlaceVideo(?string $video): string
{
    if ($video === null || $video === '') {
        return 'Sin vídeo';
    }

    return '<a href="' . $video . '">vídeo</a>';
}

function nombresAlumnos(array $curriculos): array
{
    return array_map(
        fn(array $curriculo): string => $curriculo['alumno'],
        $curriculos
    );
}

/**
 * Devuelve los currículos de un ciclo, reindexados desde 0.
 *
 * @param array<int, array{alumno: string, ciclo: string, video: ?string}> $curriculos
 * @param string $codCiclo Código del ciclo, por ejemplo 'DAW'.
 * @return array<int, array{alumno: string, ciclo: string, video: ?string}>
 */
function curriculosDeCiclo(array $curriculos, string $codCiclo): array
{
    return array_values(array_filter(
        $curriculos,
        fn(array $curriculo): bool => $curriculo['ciclo'] === $codCiclo
    ));
}

/**
 * Devuelve los currículos ordenados alfabéticamente por alumno.
 *
 * No modifica el array recibido: como se pasa por valor, usort() ordena una copia.
 *
 * @param array<int, array{alumno: string, ciclo: string, video: ?string}> $curriculos
 * @return array<int, array{alumno: string, ciclo: string, video: ?string}>
 */
function ordenarPorAlumno(array $curriculos): array
{
    usort(
        $curriculos,
        fn(array $a, array $b): int => $a['alumno'] <=> $b['alumno']
    );

    return $curriculos;
}