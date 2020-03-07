<?php

namespace App\Http\Helpers;

use App\Http\Helpers\Interfaces\Slugify;

class SlugHelper implements Slugify
{
    /**
     * @param $text
     * @param string $separator
     * @return string
     */
    public static function makeSlug($text, $separator = self::SEPARATOR):string
    {
        // replace non letter or digits by -
        $text = preg_replace('~[^\pL\d]+~u', $separator, $text);

        // transliterate
        $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);

        // remove unwanted characters
        $text = preg_replace('~[^-\w]+~', '', $text);

        // trim
        $text = trim($text, $separator);

        // remove duplicate -
        $text = preg_replace('~-+~', $separator, $text);

        // lowercase
        $text = strtolower($text);

        if (empty($text)) {
            return 'n_a';
        }

        return $text;
    }
}
