<?php
require './app/controllers/BaseController.php';
class HomeController extends BaseController
{
    public function __construct()
    {
        new User();
        if(!User::isLoggedin()){
            self::redirect('/auth/login');
        }
    }

    public static function index()
    {

        $tasks = Task::getTasks();
        return self::view('home',['tasks'=>$tasks]);
    }

    public static function about()
    {
        return self::view('about');
    }
    public static function contact()
    {
        return self::view('contact');
    }
}
