<?php
class HomeController extends BaseController
{
    public function __construct()
    {
        new User();
        if (!User::isLoggedin()) {
            self::redirect('/auth/login');
        }
    }

    public static function index()
    {
        if (!empty($_GET['query'])) {
            $tasks = Task::getTasks();
            echo json_encode($tasks);
            return;
        } else {
            // The request is not AJAX
            $tasks = Task::getTasks();
            if (isset($tasks['error'])) {
                session_destroy();
                return self::redirect('/auth/login');
            }
            return self::view('home', ['tasks' => $tasks]);
        }
    }

    // other methods goes here ....
}
