<?php

class Controller_Admin extends Controller
{
    function action_index()
    {
        $data = [];
        $id = 0;
        $data["sessionName"] = null;
        
        // Действие в случае удаления полей
        
        // высчитываем какая строка была выбрана
        for($i=1;$i<=100; $i++) 
            {
            if(isset($_POST['delete'][$i])) 
                {
                $id = $i;               

                // удаляем выбранную строку
                $pdo = Model::database_connect();
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $sql = "DELETE FROM tasks WHERE id = ?";
                $q = $pdo->prepare($sql);
                $q->execute(array($id));
                Model::Database_disconnect();
               
                $data["IDform"] = 'Строка '.$id.' была успешно удалена!';
                }
            }
        
        // Действие в случае редактирования полей
            
        // высчитываем какая строка была выбрана
        for($i=1;$i<=100; $i++)
            {
            if(isset($_POST['update'][$i]))
                {
                $_SESSION['selectID'] = $i;   
                header('Location:/update'); 
                }
            }
        
        // Действие для разлогинивания администратора  
        if(isset($_POST['logout']))
        {	   
            session_destroy();
            header('Location:/');               
        }
        
        // Перепроверка наличия сессии админа, есле ее нет - возврат на форму входа
        $admin="21232f297a57a5a743894a0e4a801fc3";
        $baz = $_SESSION['username'];
        if ($baz !== $admin)
        {
            // проверка наличия сессии
            //$data["sessionName"] = $baz;
            header('Location:/login');
            exit;
            
        } else {
            // проверка наличия сессии
            //$data["sessionName"] = $baz;
            $this->view->generate('admin_view.php', 'template_view.php', $data );
        }             

    }
}
