<?php

namespace App\Enums;

enum RequestStatus: string
{
    case Open = 'open';
    case InProgress = 'in_progress';
    case Fulfilled = 'fulfilled';

    public function label(): string
    {
        return match ($this) {
            self::Open => 'Ouverte',
            self::InProgress => 'En cours',
            self::Fulfilled => 'Pourvue',
        };
    }
}
