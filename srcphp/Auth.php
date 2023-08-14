<?php

namespace proyecto;

use Carbon\Carbon;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;
use proyecto\Models\User;


class Auth
{
    private $User;

    public static function generateToken($data, $time = 3600): string
    {
        $t = Carbon::now()->timestamp + $time;
        $key = 'orimar174';
        $payload = ['exp' => $t, 'data' => $data];
        return JWT::encode($payload, $key, 'HS256');
    }

    /**
     * @return mixed
     */
    public static function getUser()
    {
        $secretKey = 'orimar174';
        $jwt = Router::getBearerToken();
        $token = JWT::decode($jwt, new key($secretKey, 'HS256'));
        return User::find($token->data[0]);
    }

    /**
     * @param mixed $User
     */
    public static function setUser($correo): void
    {
        $session = new Session();
        $session->set('correo', $correo);

    }

    public function clearUser($correo): void
    {
        $se = new Session();
        $se->remove("correo");
    }


}
