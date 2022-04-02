<?php
namespace App\Console;

use Phalcon\Cli\Task;

use DateTimeImmutable;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;

class TokenTask extends Task
{
    public function mainAction()
    {
        echo 'This is the default task and the default action' . PHP_EOL;
    }
    public function createTokenAction($role)
    {
        if ($role === 'admin') {
            $key = "example_key";
            $now = new DateTimeImmutable();
            $payload = array(
                "iss" => "http://example.org",
                "aud" => "http://example.com",
                "iat" => $now->getTimestamp(),
                "nbf" => $now->modify('-1 minute')->getTimestamp(),
                "exp" => $now->modify('+1 day')->getTimestamp(),
                'sub' => $role
            );
            echo JWT::encode($payload, $key, 'HS256');
        } else {
            echo 'role is not admin';
        }
    }
}