<h2>Выполняй задачи, закрывай таски и будь свободен!</h2>

<!-- фомра закрытия сессии администратора -->
<p>  
    <form action="" id="logoutform" method="post" name="logoutform">
        <input class="btn btn-info" name="logout" type= "submit" value="Вылогинится">
    </form>
</p>


    <div class="">
        <div class="row">
            
            <!-- фомра перебросит на страницу создания новой задачи -->
            <form action="" id="Action" method="post" name="Action">
                <a href="/create" class="btn btn-warning">+ Новая задача</a> 
            </form>
            
             
            <table class="table table-striped table-bordered">
                <!-- создание шапки таблицы --> 
                <thead>
                    <tr>
                        <!-- колонка с формой фильтрации по порядковому номеру-->
                        <th>
                            <form action="" id="Filter" method="post" name="Filter">
                                <i class="fa fa-filter" aria-hidden="true"></i>
                                <input class="btn_filter" name="No" type="submit" value="No">
                            </form>
                        </th>
                        <!-- колонка с формой фильтрации по имени-->
                        <th>
                            <form action="" id="Filter" method="post" name="Filter">
                                <i class="fa fa-filter" aria-hidden="true"></i>
                                <input class="btn_filter" name="Name" type="submit" value="Name">
                            </form>
                        </th>
                        <!-- колонка с формой фильтрации по почтовым ящикам-->
                        <th>
                            <form action="" id="Filter" method="post" name="Filter">
                                <i class="fa fa-filter" aria-hidden="true"></i>
                                <input class="btn_filter" name="Email" type="submit" value="Email Address">
                            </form>
                        </th>
                        <!-- колонка с формой фильтрации по статусу-->
                        <th>
                           <form action="" id="Filter" method="post" name="Filter">
                               <i class="fa fa-filter" aria-hidden="true"></i>
                                <input class="btn_filter" name="Status" type="submit" value="Status">
                           </form>
                        </th>
                        <!-- колонки без фильтрации-->
                        <th>
                            Descripton
                        </th>
                        <th>
                            Image
                        </th>
                        <th>
                            Action
                        </th>
                    </tr>
                </thead>
                <!-- тело таблицы формируется скриптом-->
                <tbody>
                    <?php
                        // для начала определяем была ли выбрана фильтрация, по умолчанию фильтрация в порядке возрастания
                    
                        $sql = 'SELECT * FROM tasks ORDER BY id ASC';

                        if (isset($_POST['No'])) { 
                            $sql = 'SELECT * FROM tasks ORDER BY id ASC';
                            $_POST['No'] = '';
                        }
                        if (isset($_POST['Name'])) { 
                            $sql = 'SELECT * FROM tasks ORDER BY username ASC';
                            $_POST['Name'] = '';   
                        } 
                        if (isset($_POST['Email'])) { 
                            $sql = 'SELECT * FROM tasks ORDER BY Email ASC';
                            $_POST['Email'] = '';
                        } 
                        if (isset($_POST['Status'])) { 
                            $sql = 'SELECT * FROM tasks ORDER BY Status ASC';
                            $_POST['Status'] = '';
                        }  

                        // подключаемся к базе и выбираем последовательно все значения, паралельно зоздавая под них ячейки
                        $pdo = Model::database_connect();
                        foreach ($pdo->query($sql) as $row) 
                            {
                            echo '<tr>';
                            echo '<td width=60>'. $row['id'] . '</td>';
                            echo '<td>'. $row['username'] . '</td>';
                            echo '<td>'. $row['email'] . '</td>';
                            // статус задач хранится под флагами "1" и "2", заменяем числа словами.
                            if ($row['status'] == 1)
                                {
                                echo '<td>'. "невыполнено" . '</td>';  
                                } else {
                                echo '<td>'. "выполнено" . '</td>'; 
                                }
                            echo '<td>'. $row['description'] . '</td>';
                            echo '<td>'. $row['photo'] . '</td>';
                            // в каждой строчке добавим форму с двумя кнопками, также запомним номер этой строчки
                            echo '<td width=140>';
                            echo '<form action="" id="IDnumber" method="post" name="IDnumber">';
                            echo '<input class="btn btn-success" name="update['.$row['id'].']" type="submit" value="редактировать">';
                            echo '<input class="btn btn-danger" name="delete['.$row['id'].']" type="submit" value="удалить">';
                            echo '</form>';
                            echo '</td>';
                            // конец строки
                            echo '</tr>';
                            }
                        // отключаемся от БД    
                        Model::database_disconnect();
                    ?>
                    
                </tbody>
            <!-- Таблица готова-->    
            </table>
            
            <!-- в случае удаления записей вызвать сообщение информирующее об успешном удалении -->
            <?php
            extract($data);
            if(isset($_POST['delete']))
                {
                echo '<div class="alert-success" >'.$IDform.'</div>';
                }
            ?>
            
        </div>
    </div> <!-- /container -->
</p>

<?php

          //  echo $sessionName;

    ?>