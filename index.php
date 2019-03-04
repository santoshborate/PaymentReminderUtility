<?php
$loader = require __DIR__ . '/vendor/autoload.php';
$loader->addPsr4('PaymentReminderUtility\\Tests\\', __DIR__);

use PaymentReminderUtility\Services\FileReader;
use PaymentReminderUtility\Services\PaymentReminder;
use PaymentReminderUtility\Services\CsvWriter;
use PaymentReminderUtility\Validator\InputValidator;

$inputValidator = new InputValidator();
if ($inputValidator->validate($argv))
{
    // 1. Get year and date
    $startMonth = $argv[3] ?? date('m');
    $year = $argv[2] ?? date('Y');

    // 2. Calculate payment date and bonus date
    $payamnetReminder = new PaymentReminder();
    $result = $payamnetReminder->getPaymentDates($startMonth, $year);

    // 3. Create csv file for report
    $fileReader = new FileReader($argv[1]);
    $csvWriter = new CsvWriter();
    $csvWriter->write($fileReader->getFile(), $result);
}








