<?php
declare(strict_types=1);

namespace PaymentReminderUtility\Validator;

class InputValidator
{
    /**
     * @param array $params
     * @return bool
     */
    public function validate(array $params): bool
    {
        // Check filename is provided or not
        if (count($params) <= 1) {
            echo 'Invalid arguments provided. Output filename is not provided e.g filename.csv !!!!';
            return false;
        }

        // Check year is provided and is valid year
        if (isset($params[2]) && ((int)$params[2] < 1970 || (int)$params[2] > 9999)) {
            echo 'Invalid arguments provided. Year must be integer e.g 2019 !!!!';
            return false;
        }

        // Check month is provided and is valid month
        if (isset($params[3]) && ((int)$params[3] < 1 || (int)$params[3] > 12)) {
            echo 'Invalid arguments provided. Month must be integer e.g 3 !!!!';
            return false;
        }

        return true;
    }
}
