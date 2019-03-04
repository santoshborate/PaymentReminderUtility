<?php
declare(strict_types=1);

namespace PaymentReminderUtility\Tests\Services;

use PaymentReminderUtility\Services\FileReader;
use PHPUnit\Framework\TestCase;

class FileReaderTest extends TestCase
{
    /** @var  */
    private $file;

    /** @var  FileReader */
    private $fileReader;

    public function setUp(): void
    {
        $this->file = fopen(__DIR__ . '/test_csv.csv', 'w');
        $this->fileReader = new FileReader('test_csv.csv');
    }

    public function testGetFile(): void
    {
        $this->fileReader->setFile($this->file);
        $result = $this->fileReader->getFile();

        $this->assertNotEmpty($result);
    }

    public function testEmptyFile(): void
    {
        $result = $this->fileReader->getFile();
        $this->assertNotEmpty($result);
    }
}