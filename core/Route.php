<?php

class Route
{
	public static function run()
	{
		$controllers_dir = 'controllers/';
		$uri = parse_url($_SERVER['REQUEST_URI']);
		// routes
		$uri_array = array(
			'/' => 'MainController',
            '/article' => 'ArticleController'
		);

		if ($uri['path']) {
			if (file_exists($controllers_dir.$uri_array[$uri['path']].'.php')) {
				require $controllers_dir.$uri_array[$uri['path']].'.php';
				$controller = new $uri_array[$uri['path']]();

				if (method_exists($controller, 'index')) {
				    print $controller->index();
				} else {
					Route::error404();
				}
			} else {
				Route::error404();
			}
		}
	}

	public static function error404()
	{
		//page 404
	}
}