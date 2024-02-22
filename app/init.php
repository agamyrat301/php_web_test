<?php
spl_autoload_register(function ($class_name) {
    // Define your class file directory
    $class_file = '../app/controllers/' . $class_name . '.php';

    // Check if the class file exists
    if (file_exists($class_file)) {
        require_once($class_file);
    } else {
        // Handle class not found error
        throw new Exception("Class $class_name not found.");
    }
}); 
const LOGIN_URL = 'https://api.baubuddy.de/index.php/login';
const TASKS_SELECT_URL = 'https://api.baubuddy.de/dev/index.php/v1/tasks/select';
const TOKEN = 'QVBJX0V4cGxvcmVyOjEyMzQ1NmlzQUxhbWVQYXNz';
