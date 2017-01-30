<?php

class Controller_Create extends Controller
{
	function action_index()
	{
            $data = [];
            
            if ( !empty($_POST)) 
                {
         
                // описание полей с ошибками
                $data["usernameError"] = null;
                $data["emailError"] = null;
                $data["descriptionError"] = null;
                $data["photoError"] = null;
                $data["uploadTypeError"] = null;
                $data["uploadSIzeError"] = null;
                $data["uploadError"] = null;

                // переменные полей которые мы проверяем
                $username = $_POST['username'];
                $email = $_POST['email'];
                $description = $_POST['description'];
                $photo = $_POST['photo'];

                // проверка на наличие пустых полей
                $valid = true;
                if (empty($username)) 
                    {
                    $data["usernameError"] = 'Please enter Name';
                    $valid = false;
                    }
                if (empty($description)) 
                    {
                    $data["descriptionError"] = 'Please enter description';
                    $valid = false;
                    }
                if (empty($email)) 
                    {
                    $data["emailError"] = 'Please enter Email Address';
                    $valid = false;
                    // дополнительно проверим правильно ли написан МЕЙЛ
                    } else if ( !filter_var($email,FILTER_VALIDATE_EMAIL) ) 
                        {
                        $data["emailError"] = 'Please enter a valid Email Address';
                        $valid = false;
                        }
                if (empty($photo)) 
                    {
                    $data["photoError"] = 'Please upload photo';
                    $valid = false;
                    }

                // если валидация успешна записать данные в базу
                if ($valid) 
                    {
                    $pdo = Model::database_connect();
                    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    $sql = "INSERT INTO tasks (username,email,description,status,photo) values(?, ?, ?, ?, ?)";
                    $q = $pdo->prepare($sql);
                    $q->execute(array($username,$email,$description,1,$photo));
                    Model::database_disconnect();
                    header('Location:/planer');
                    } 
  
                }
                if (isset($_POST['myfile']))
                    {
                    // путь загрузки картинки
                    $maxwidth = "320";
                    $maxheight = "240";
                    
                    $foto_dir = "images/"; // Директория для фотографий
                    $foto_name = $fotos_dir.time()."_".basename($_FILES['myfile']['name']); // Полное имя файла вместе с путем
                    $foto_light_name = time()."_".basename($_FILES['myfile']['name']); 
                    // Имя файла исключая путь
                    $foto_tag = "<img src=\"$foto_name\"border=\"0\">"; // Готовый тэг для вставки картинки на страницу
                    $foto_tag_preview = "<img src=\"$foto_name\"border=\"0\" width=\"$maxwidth\">"; // Тот же тэг, но для превью
                    
                    //if (!@copy($_FILES['picture']['tmp_name'], $path . $_FILES['picture']['name'])){
                    //    $data["uploadError"] = 'Что-то пошло не так';
                    //    } 
                    //    else
                    //    {
                     //   $data["uploadError"] = 'Загрузка удачна';
                    //    }
                    }
        
            $this->view->generate('create_view.php', 'template_view.php', $data);
            
        }
        
}