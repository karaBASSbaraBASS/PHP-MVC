<?php

class Controller_Login extends Controller
{	
    function action_index()
	{    
        // Поскольку у нас всего один пользователь, то пароль можно хранить тут 
        $admin="21232f297a57a5a743894a0e4a801fc3";
        $pass="202cb962ac59075b964b07152d234b70";
        
        // Отслеживаем нажатие кнопки "логин" и роверяем данные пользователя
        if(isset($_POST['login']))
            {	 
            if($admin==md5($_POST['username']) && $pass==md5($_POST['password']))
                {
                    // стартуем сессию администратора, оставляем флаг успешного выполнения и перенаправляем
                    $data["login_status"] = "access_garanted";
                    $_SESSION['username'] = $admin; 
                    header('Location:/admin');               
		}
		else
		{
                    // оставляем флаг неуспешного выполнения для генерации текста ошибки
                    $data["login_status"] = "access_denied";       
		}
            }
            else
            {
                // ничего невведено
		$data["login_status"] = "";
            }
	
        $this->view->generate('login_view.php', 'template_view.php', $data);
        
        }
	
}
