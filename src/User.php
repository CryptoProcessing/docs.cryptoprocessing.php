<?php
/**
 * Created by PhpStorm.
 * User: artur
 * Date: 07.03.18
 * Time: 15:52
 */

namespace Cryptoprocessing;


class User
{
    public static function create($name, $email, $pass, $confirmPass)
    {
        $parameters = [
            'name' => $name,
            'email' => $email,
            'password' => $pass,
            'password_confirmation' => $confirmPass
        ];

        return Request::send('POST', 'api/v1/users/', $parameters);
    }

    public static function update($email, $currentPass, $pass, $confirmPass)
    {
        $parameters = [
            'email' => $email,
            'current_password' => $currentPass,
            'password' => $pass,
            'password_confirmation' => $confirmPass,
            'addHeader' => [
                'X-Email' => $email
            ]
        ];

        return Request::send('PUT', 'api/v1/users/', $parameters);
    }
}