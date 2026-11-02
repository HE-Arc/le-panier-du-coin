<?php

namespace App\Enums;

enum ArticleCondition: string
{
    case BrandNew = "new";
    case LikeNew = "like_new";
    case Good = "good";
    case Fair = "fair";
    case NotWorking = "not_working";

    public function label(): string
    {
        return match ($this) {
            self::BrandNew => "Neuf",
            self::LikeNew => "Comme neuf",
            self::Good => "Bon état",
            self::Fair => "État correct",
            self::NotWorking => "Ne fonctionne pas",
        };
    }
}
