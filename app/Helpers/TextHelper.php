<?php

declare(strict_types=1);

namespace App\Helpers;

class TextHelper
{
    /**
     * Shorten a given description.
     *
     * @param string $description
     * @return string
     */
    public static function shortenDescription(string $description): string
    {
        if (strlen($description) > 100) {
            $description = substr($description, 0, 100);
            if (!str_ends_with($description, ' ')) {
                $lastSpace = strrpos($description, ' ');
                if ($lastSpace !== false) {
                    $description = substr($description, 0, $lastSpace);
                }
            }
            $description .= '...';
        }

        return $description;
    }
}
