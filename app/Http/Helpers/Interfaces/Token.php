<?php

namespace App\Http\Helpers\Interfaces;

interface Token
{
    const JWT_IAT_FORMAT = "YmdHis";
    const
        IAT_LENGTH = 14,
        AUD_LENGTH = 100,
        SUB_LENGTH = 100;
}
