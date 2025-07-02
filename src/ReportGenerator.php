<?php

declare(strict_types=1);

namespace App;

class ReportGenerator
{
    public function generate(): string
    {
        // Simule un traitement un peu long
        usleep(100000); // 0.1 seconde
        return "Report generated.";
    }
}
