<?php
declare(strict_types=1);

namespace App\Tests;

use App\ReportGenerator;
use PHPUnit\Framework\TestCase;

/**
 * @group performance
 */
class ReportGeneratorTest extends TestCase
{
    public function testReportGenerationIsFastEnough(): void
    {
        $generator = new ReportGenerator();

        $start = microtime(true);
        $result = $generator->generate();
        $end = microtime(true);

        $duration = $end - $start;

        $this->assertSame("Report generated.", $result);
        $this->assertLessThan(0.2, $duration, "Report generation took too long: {$duration}s");
    }
}
