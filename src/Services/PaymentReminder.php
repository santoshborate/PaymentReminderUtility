<?php
declare(strict_types=1);

namespace PaymentReminderUtility\Services;

class PaymentReminder
{
    /** Bonus day */
    const BONUS_DAY = 15;

    /**
     * @param int $startMonth
     * @param int $year
     * @return array
     */
    public function getPaymentDates(int $startMonth, int $year): array
    {
        $dates = [];
        for ($month = $startMonth; $month <= 12; $month++) {
            $dates[] = [
                'Year' => $year,
                'Month' => $this->getFormattedDate(strtotime(sprintf('%d-%d-%d', $year, $month, 1)), 'M'),
                'paymentDate' => $this->getPaymentDate($month, $year),
                'bonusDate' => $this->getBonusDate($month, $year),
            ];
        }

        return $dates;
    }

    /**
     * @param int $month
     * @return string
     */
    private function getPaymentDate(int $month, int $year): string
    {
        $monthDate = sprintf('%d-%d-%d', $year, $month, 1);
        $lastDay = date('t', strtotime($monthDate));
        $lastDayName = date('l', strtotime(sprintf('%d-%d-%d', $year, $month, $lastDay)));

        if ($lastDayName === 'Saturday') {
            $lastDay--;
        }

        if ($lastDayName === 'Sunday') {
            $lastDay = $lastDay - 2;
        }

        return $this->getFormattedDate(strtotime(sprintf('%d-%d-%d', $year, $month, $lastDay)));
    }

    /**
     * @param int $month
     * @return string
     */
    private function getBonusDate(int $month, int $year): string
    {
        $bonusDateTime = strtotime(sprintf('%d-%d-%d', $year, $month, self::BONUS_DAY));
        $bonusDay = date('l', $bonusDateTime);

        // If bonus date is weekend then get next wednesday
        if (in_array($bonusDay, ['Saturday', 'Sunday'])) {
            $bonusDateTime = strtotime('next wednesday', $bonusDateTime);
        }

        return $this->getFormattedDate($bonusDateTime);
    }

    /**
     * @param int $timestamp
     * @param string $format
     * @return string
     */
    private function getFormattedDate(int $timestamp, $format = 'd-m-Y'): string
    {
        return date($format, $timestamp);
    }
}
