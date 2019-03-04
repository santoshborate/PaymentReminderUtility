<?php
declare(strict_types=1);

namespace PaymentReminderUtility\Services;

interface FileWriterInterface
{
    public function write($handle, array $data);
}
