<?php

namespace App\Http\Helpers\Interfaces;

interface Slugify
{
    const SEPARATOR = '_';

    public static function makeSlug($text):string ;
}
