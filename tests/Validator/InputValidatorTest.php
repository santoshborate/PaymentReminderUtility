<?php
declare(strict_types=1);

use PaymentReminderUtility\Validator\InputValidator;
use PHPUnit\Framework\TestCase;

class InputValidatorTest extends TestCase
{
    private $inputValidator;

    public function setUp(): void
    {
        $this->inputValidator = new InputValidator();
    }

    /**
     * @dataProvider inputDataProvider
     * @param $params
     * @param $expected
     */
    public function testFilename(array $params, bool $expected): void
    {
        $result = $this->inputValidator->validate($params);

        $this->assertEquals($result, $expected);
    }

    public function inputDataProvider(): array
    {
        return [
            [
                ['index.php'],
                 false
            ],
            [
                ['index.php', 'test_csv.csv', 201912],
                false
            ],
            [
                ['index.php', 'test_csv.csv', 2019, 43],
                false
            ],
            [
                ['index.php', 'test_csv.csv'],
                true
            ]
        ];
    }
}
