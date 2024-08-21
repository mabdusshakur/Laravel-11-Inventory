<?php
namespace App\Helpers;

use Firebase\JWT\JWT;
use Firebase\JWT\Key;

class JWTToken
{

    /**
     * Creates a JWT token with the given user email and user ID.
     *
     * @param string $userEmail The email of the user.
     * @param int $userId The DB ID of the user.
     * @param int $expiryTime The expiry time of the token in seconds. Default is 3600 seconds.
     * @return string The generated JWT token.
     */

    public static function createToken($userEmail, $userId, $expiryTime = 3600): string
    {
        $key = env('JWT_KEY');
        $payload = [
            'iss' => 'pos-app',
            'iat' => time(),
            'exp' => time() + $expiryTime,
            'email' => $userEmail,
            'id' => $userId
        ];
        return JWT::encode($payload, $key, 'HS256');
    }

    /**
     * Decode a JWT token.
     *
     * @param string|null $encodedToken The encoded JWT token to decode.
     * @return mixed Returns the decoded object if successful, otherwise returns 'unauthorized'.
     */
    public static function decodeToken($encodedToken)
    {
        try {
            if ($encodedToken == null) {
                return 'Unauthorized';
            } else {
                $key = env('JWT_KEY');
                return JWT::decode($encodedToken, new Key($key, 'HS256'));
            }
        } catch (\Throwable $th) {
            return 'Unauthorized';
        }
    }
}