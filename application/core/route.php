<?php 

/*
Класс-маршрутизатор для определения запрашиваемой страницы.
> цепляет классы контроллеров и моделей;
> создает экземпляры контролеров страниц и вызывает действия этих контроллеров.
*/

class Route
{
	static function start()
	{
		// контроллер и действие по умолчанию
		$controller_name = 'Main';
		$action_name = 'index';
                
		// адрес по которому обращается пользователь, разделяется на значения между знаками "/" и записывается в массив
		$routes = explode('/', $_SERVER['REQUEST_URI']);

		// выбираем из массива routes имя контроллера 
		if ( !empty($routes[1]) )
		{	
			$controller_name = $routes[1];
                        if ( $controller_name == 'dayside-master' )
                        {
                            header('Location:/dayside-master');
                        }
		}
		
		// выбираем из массива routes имя экшена
		if ( !empty($routes[2]) )
		{
			$action_name = $routes[2];
		}

		// добавляем префиксы
		$model_name = 'Model_'.$controller_name;
		$controller_name = 'Controller_'.$controller_name;
		$action_name = 'action_'.$action_name;

		// добавляем файл с классом модели, если она есть

		$model_file = strtolower($model_name).'.php';
		$model_path = "application/models/".$model_file;
		if(file_exists($model_path))
		{
			include "application/models/".$model_file;
		}

		// добавляем файл с классом контроллера
		$controller_file = strtolower($controller_name).'.php';
		$controller_path = "application/controllers/".$controller_file;
		if(file_exists($controller_path))
		{
			include "application/controllers/".$controller_file;
		}
		else
		{
                    // функция вызова странички 404, перестает работать если вынести в отдельную функцию. 
                     $host = 'http://'.$_SERVER['HTTP_HOST'].'/';
                     header('Location:'.$host.'404');
		}
		
		// создать контроллер
		$controller = new $controller_name;
		$action = $action_name;
		
		if(method_exists($controller, $action))
		{
			// вызвать действие контроллера
			$controller->$action();
		}
		else
		{
                    // функция вызова странички 404, перестает работать если вынести в отдельную функцию.
                    $host = 'http://'.$_SERVER['HTTP_HOST'].'/';
                    header('Location:'.$host.'404');
            	}
	}
}
