<?php

namespace App\Enums;

enum ArticleStatus: string
{
    case Available = "available";
    case Reserved = "reserved";
    case Sold = "sold";
    case Draft = "draft";

    public function label(): string
    {
        return match ($this) {
            self::Available => "Disponible",
            self::Reserved => "Réservé",
            self::Sold => "Vendu",
            self::Draft => "Brouillon",
        };
    }
}
