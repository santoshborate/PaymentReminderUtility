<?php
declare(strict_types=1);

namespace PaymentReminderUtility\Tests\Services;

use PaymentReminderUtility\Services\CsvWriter;
use PaymentReminderUtility\Services\FileReader;
use PHPUnit\Framework\TestCase;

class CsvWriterTest extends TestCase
{
    /** @var  */
    private $file;

    public function setUp(): void
    {
        $this->file = fopen(__DIR__ . '/test_csv.csv', 'w');
    }

    /**
     * @dataProvider csvDataProvider
     */
    public function testWrite($inputData, $expected): void
    {
        $fileReader = new FileReader('test_csv.csv');
        $fileReader->setFile($this->file);
        $cvsWriter = new CsvWriter();
        $cvsWriter->write($fileReader->getFile(), [$inputData]);

        $this->assertEquals(trim(file_get_contents(__DIR__ . '/test_csv.csv')), $expected);
    }

    public function tearDown(): void
    {
        unlink(__DIR__ . '/test_csv.csv');
    }

    public function csvDataProvider(): array
    {
        return [
            [
                [
                    'Year' => 2019,
                    'Month' => 3,
                    'paymentDate' => '31-3-2019',
                    'bonusDate' => '15-3-2019',
                ],
                "Year,Month,paymentDate,bonusDate\n2019,3,31-3-2019,15-3-2019"
            ]
        ];
    }
}