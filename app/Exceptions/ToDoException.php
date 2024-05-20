<?php

declare(strict_types=1);

namespace App\Exceptions;

use DomainException;
use Mezzio\ProblemDetails\Exception\CommonProblemDetailsExceptionTrait;
use Mezzio\ProblemDetails\Exception\ProblemDetailsExceptionInterface;

class ToDoException extends DomainException implements ProblemDetailsExceptionInterface
{
    use CommonProblemDetailsExceptionTrait;
    const TYPE = 'toDoMTN';

    public static function notFound(string $coy): self
    {
        $detail = 'The ToDo you are looking for does not exist: ' . $coy;
        $e = new self($detail);
        $e->status = 404;
        $e->type   = self::TYPE;
        $e->title  = 'To do not found';
        $e->detail = $detail;

        return $e;
    }

    public static function invalid(string $detail): self
    {
        $e = new self($detail);
        $e->status = 401;
        $e->type   = self::TYPE;
        $e->title  = 'Invalid To do';
        $e->detail = $detail;

        return $e;
    }
}
