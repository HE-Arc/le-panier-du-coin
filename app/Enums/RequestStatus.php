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
    public function badgeClasses(): string{
        return match ($this) {
            self::Open => 'bg-green-100 text-green-700',
            self::InProgress => 'bg-amber-100 text-amber-700',
            self::Fulfilled => 'bg-gray-200 text-gray-700',
        };
    }
}
