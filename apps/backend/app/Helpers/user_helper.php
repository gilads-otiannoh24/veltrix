<?php

use CodeIgniter\I18n\Time;
use CodeIgniter\Shield\Entities\User;
use CodeIgniter\Shield\Authentication\JWTManager;

function getJWTResponseArray(User $user, bool $remmberMe = false): array
{
    /** @var JWTManager $jwtManager */
    $jwtManager = service("jwtmanager");

    $jwt = $jwtManager->generateToken($user);
    // sets expiry to 30 days if remember me is checked
    // otherwise sets to 7 days
    $expiry = Time::now()->addSeconds($remmberMe ? setting('AuthJWT.timeToLive') * 30 : setting('AuthJWT.timeToLive'));

    return [
        'token' => $jwt,
        'expiry' => $expiry,
        'user' => $user,
    ];
}
