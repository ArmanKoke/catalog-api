<?php

namespace App\Http\Helpers;

use \App\Http\Helpers\Interfaces\Token as TokenInterface;
use App\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Lcobucci\JWT\Builder;
use Lcobucci\JWT\Parser;
use Lcobucci\JWT\Signer\Hmac\Sha512;
use Lcobucci\JWT\ValidationData;

class JwtHelper extends TokenHelper implements TokenInterface
{
    /**
     * @param $aud
     * @param $sub
     * @param null|int $exp
     * @return string
     */
    public static function issue($aud, $sub, $exp = null) //todo protected
    {
        $jti = self::RandomToken();
        $iss = Auth::user()->email;
        $iat = Carbon::now()->format(self::JWT_IAT_FORMAT);

        $builder = (new Builder())
            //->identifiedBy($jti, true)
            //->issuedBy($iss)
            //->issuedAt($iat)
            ->permittedFor($aud);
            //->relatedTo($sub);

        if ($exp) {
            $builder->expiresAt(time() + ($exp * 60)); //return $exp in minutes
        }

        //$token = Token::firstOrNew(['aud' => $request->aud]); //todo use vault for validating?
        //$token->iat = $request->iat;
        //$token->sub = $request->sub;
        //$token->exp = $request->exp;
        //$token->save();

        return (string) $builder->getToken(new Sha512());
    }

    /** todo rewrite with vault
     * @param $token
     * @return bool
     */
    public static function verify($token)
    {
        $email_assigned_token = User::where('email', self::getAud($token))->first();
        if (empty($email_assigned_token))
        {
            return false;
        }

        $data = new ValidationData;
        //$data->setIssuer(config('app.name'));
        //->setCurrentTime($email_assigned_token->iat);
        $data->setAudience($email_assigned_token->email);
        //$data->setSubject($email_assigned_token->sub);

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
