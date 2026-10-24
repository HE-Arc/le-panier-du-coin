<?php

namespace App\Enums;

enum ArticleStatus: string
{
    case Available = "available";
    case Reserved = "reserved";
    case Sold = "sold";
    case Draft = "draft";
}
