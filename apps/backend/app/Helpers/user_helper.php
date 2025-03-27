<?php

use CodeIgniter\I18n\Time;
use CodeIgniter\Shield\Entities\User;
use CodeIgniter\Shield\Authentication\JWTManager;

function getJWTResponseArray(User $user): array
{
    /** @var JWTManager $jwtManager */
    $jwtManager = service("jwtmanager");

    $jwt = $jwtManager->generateToken($user);
    $expiry = Time::now()->addSeconds(setting('AuthJWT.timeToLive'));

    return [
        'token' => $jwt,
        'expiry' => $expiry,
        'user' => $user,
    ];
}
