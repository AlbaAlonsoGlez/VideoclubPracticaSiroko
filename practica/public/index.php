<?php

require_once __DIR__ . '/Application/RentAFilmUseCase.php';
require_once __DIR__ . '/FilmRepository.php';
require_once __DIR__ . '/Film.php';
require_once __DIR__ . '/Exceptions/FilmNotFoundException.php';
require_once __DIR__ . '/Exceptions/FilmIsRentedException.php';

/** DDD (Domain Drive Design) */

use Application\RentAFilmUseCase;
use Exceptions\FilmIsRentedException;
use Exceptions\FilmNotFoundException;
use Infrastructure\InMemoryFilmRepository;

$filmTitle = 'The lion king';

$filmRepository = new InMemoryFilmRepository();

$useCase = new RentAFilmUseCase($filmRepository);

try {
    $useCase->rentAFilm($filmTitle);
} catch (FilmNotFoundException|FilmIsRentedException $exception) {
    echo $exception->getMessage();
}
