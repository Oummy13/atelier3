<?php

declare(strict_types=1);

namespace App;

interface NotifierInterface
{
    public function notify(User $user, string $message): void;
}
