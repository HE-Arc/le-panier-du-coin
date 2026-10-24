<?php

namespace App\Enums;

enum RequestStatus: string
{
    case Open = 'open';
    case InProgress = 'in_progress';
    case Fulfilled = 'fulfilled';
}