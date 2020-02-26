<?php

namespace App\Http\Helpers;

use App\Token;
use Lcobucci\JWT\Builder;
use Lcobucci\JWT\Parser;
use Lcobucci\JWT\Signer\Ecdsa\Sha512;
use Lcobucci\JWT\ValidationData;

class JwtHelper
{
    public static function issue($iat, $aud, $sub, $exp = null) //todo protected
    {
        $builder = (new Builder())
            ->identifiedBy('7sgnw920asls', true) //just for demo
            ->issuedBy(config('app.name'))
            ->issuedAt($iat)
            ->permittedFor($aud)
            ->relatedTo($sub);

        if ($exp) {
            $builder->expiresAt(time() + ($exp * 60));
        }

        return (string) $builder->getToken(new Sha512);
    }

    public static function validate($token)
    {
        $email_assigned_token = Token::where('aud', self::getAud($token))->first();
        if (empty($email_assigned_token))
        {
            return false;
        }

        $data = new ValidationData;
        $data->setIssuer(config('app.name'));
        $data->setCurrentTime($email_assigned_token->iat);
        $data->setAudience($email_assigned_token->aud);
        $data->setSubject($email_assigned_token->sub);

        return self::getParsedToken($token)->validate($data);
    }

    public static function getAud($token)
    {
        $parsed_token = self::getParsedToken($token);

        return $parsed_token->getClaim('aud');
    }

    public static function getParsedToken($token)
    {
        return (new Parser)->parse($token);
    }
}
