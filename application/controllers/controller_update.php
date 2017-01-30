<?php

class Controller_Update extends Controller
{
	function action_index()
	{
            $data = [];
            $id = $_SESSION['selectID'];
            $data["sessionName"] = $id;
            
            
            if ( !empty($_POST)) 
                {
         
                // описание полей с ошибками
                $data["usernameError"] = null;
                $data["emailError"] = null;
                $data["descriptionError"] = null;
                $data["photoError"] = null;

                // переменные полей которые мы проверяем
                $username = $_POST['username'];
                $email = $_POST['email'];
                $description = $_POST['description'];
                $photo = $_POST['photo'];
                $status = $_POST['status'];
                
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
                    // дополнительная проверка правописния МЕЙЛА
                    } else if ( !filter_var($email,FILTER_VALIDATE_EMAIL) ) 
                        {
                        $data["emailError"] = 'Please enter a valid Email Address';
                        $valid = false;
                        }     
                //if (empty($status = )) 
                //    {
                //    $data["statusError"] = 'Please choose status';
                //    $valid = false;
                //    }        
                if (empty($photo)) 
                    {
                    $data["photoError"] = 'Please upload photo';
                    $valid = false;
                    }

                // если валидация успешна обновить данные в базе
                if ($valid) 
                    {
                    $pdo = Model::database_connect();
                    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    $sql = "UPDATE tasks set username = ?, email = ?, description =?, status = ?,photo = ? WHERE id = ?";
                    $q = $pdo->prepare($sql);
                    $q->execute(array($username,$email,$description,$status,$photo,$id));
                    Model::database_disconnect();
                    header('Location:/admin');
                    } 
                }    
                else 
                        {
                        $pdo = Model::database_connect();
                        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                        $sql = "SELECT * FROM tasks where id = ?";
                        $q = $pdo->prepare($sql);
                        $q->execute(array($id));
                        $data = $q->fetch(PDO::FETCH_ASSOC);
                        Model::database_disconnect();
                        }

                
        
            $this->view->generate('update_view.php', 'template_view.php', $data);
            
        }
        
}