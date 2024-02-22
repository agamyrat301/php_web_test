<?php
class User extends Task{
    public static  string $displayName;
    public static  string $access_token;
    public static  string $refresh_token;


    public function __construct()
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        if(isset($_SESSION['user']['userInfo']['displayName'])){
            self::$displayName = $_SESSION['user']['userInfo']['displayName'];

        }
        if(isset($_SESSION['user']['oauth']['access_token'])){
            self::$access_token = $_SESSION['user']['oauth']['access_token'];
        }
        if(isset($_SESSION['user']['oauth']['refresh_token'])){
            self::$refresh_token = $_SESSION['user']['oauth']['refresh_token'];
        }
    }

    public static function getDisplayName(): string
    {
        return self::$displayName;
    }

    public static function isLoggedin():Bool
    {
        return !empty($_SESSION['user']);
    }


}