<?php
declare(strict_types=1);

namespace PaymentReminderUtility\Services;

class FileReader
{
    /** @var string */
    private $filename;

    /** @var string */
    private $file;

    /**
     * @param string $filename
     */
    public function __construct(string $filename)
    {
        $this->filename = $filename;
    }

    public function getFile()
    {
        if ($this->file == null) {
            $this->file = fopen(__DIR__. '/../../data/' . $this->filename , 'w');
        }

        return $this->file;
    }

    public function setFile($file): void
    {
        $this->file = $file;
    }
}