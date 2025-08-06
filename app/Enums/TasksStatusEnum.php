<?php

namespace App\Enums;

enum TasksStatusEnum: string
{
    case pending = 'pending';
    case inProgress = 'inProgress';
    case done = 'done';
}
