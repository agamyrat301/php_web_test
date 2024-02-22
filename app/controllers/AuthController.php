<?php
require './app/controllers/BaseController.php';
class AuthController extends BaseController {

    public function login()
    {
        if(User::isLoggedin()){
           return self::redirect('/');
        }
        
        return self::view('auth/login');
    }

    public function  logout()
    {
        $_SESSION = array();
        session_destroy();
        return self::redirect('/auth/login');
    }

    public function postLogin()
    {
        $headers = [
            "Authorization: Basic ".TOKEN,
            "Content-Type: application/json"
        ];
        $post_fields = json_encode(["username" => $_POST['username'], "password" => $_POST['password']]);
        if(User::login('POST', LOGIN_URL, $headers, $post_fields)){
            return self::redirect('/');
        }
        return self::redirectBack();
    }

}