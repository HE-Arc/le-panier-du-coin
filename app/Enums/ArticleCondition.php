<?php

namespace App\Enums;

enum ArticleCondition: string
{
    case BrandNew = "new";
    case LikeNew = "like_new";
    case Good = "good";
    case Fair = "fair";
    case NotWorking = "not_working";
}
