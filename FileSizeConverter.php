<?php

/**
* FileSizeConverter
*
* @author [ramazancetinkaya]
* @date [23.01.2023]
*/

class FileSizeConverter
{
    private const UNITS = ['B', 'KB', 'MB', 'GB', 'TB', 'PB', 'EB', 'ZB', 'YB'];
    private const PRECISION = 2;
    private const MAX_SIZE = PHP_INT_MAX;
    private const MIN_SIZE = 0;

    public function convert(int $size): string
    {
        if ($size < self::MIN_SIZE) {
            throw new \InvalidArgumentException("Size should be greater than or equal to 0.");
        }

        if ($size > self::MAX_SIZE) {
            throw new \InvalidArgumentException("Size should be less than or equal to " . self::MAX_SIZE . ".");
        }

        $i = floor(log($size, 1024));
        return round($size / (1024 ** $i), self::PRECISION) . ' ' . self::UNITS[$i];
    }
}

// You can use this class in your code like this:
$converter = new FileSizeConverter();
$size = $converter->convert(12345678);
// Output: "11.77 MB"
