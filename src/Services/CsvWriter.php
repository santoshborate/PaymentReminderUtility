<?php
declare(strict_types=1);

namespace PaymentReminderUtility\Services;

class CsvWriter implements FileWriterInterface
{
    /**
     * @param array $handle
     * @param array $data
     */
    public function write($handle, array $data): void
    {
        $data = array_merge([array_keys($data[0])], $data);
        foreach ($data as $line) {
            fputcsv($handle, $line);
        }
    }
}