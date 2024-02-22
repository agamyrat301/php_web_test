<?php


class BaseController {
    public static function view($name, $data = []): void
    {
		if(!empty($data))
			extract($data);
		
		$filename = "./app/views/".$name.".view.php";
		if(file_exists($filename))
		{
			include $filename;
		}else{
			$filename = "./app/views/404.view.php";
            include $filename;
		}
	}

     public static function redirect($route)
    {
        header('Location: ' . $route);
        exit;
    }

    function redirectBack() {
        // Get the referring URL from the Referer header
        $referer = $_SERVER['HTTP_REFERER'] ?? '/';

        // Redirect the user back to the referring URL
        header('Location: ' . $referer);
        exit;
    }
}