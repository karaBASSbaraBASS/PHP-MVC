<h1>У джина не всегда есть свободное время, потому заносите свои пожелания в очередь!</h1>
<p>

    <div class="">
        <div class="row">
              <a href="/create" class="btn btn-warning">+ Новая задача</a>
                <table class="table table-striped table-bordered">
                  <thead>
                    <tr>
                      <th>
                          <form action="" id="Filter" method="post" name="Filter">
                                <i class="fa fa-filter" aria-hidden="true"></i>
                                <input class="btn_filter" name="No" type="submit" value="No">
                           </form>
                      </th> 
                      <th>
                           <form action="" id="Filter" method="post" name="Filter">
                               <i class="fa fa-filter" aria-hidden="true"></i>
                                <input class="btn_filter" name="Name" type="submit" value="Name">
                           </form>
                      </th>
                      <th>
                          <form action="" id="Filter" method="post" name="Filter">
                              <i class="fa fa-filter" aria-hidden="true"></i>
                                <input class="btn_filter" name="Email" type="submit" value="Email Address">
                           </form>
                      </th>
                      <th>
                           <form action="" id="Filter" method="post" name="Filter">
                               <i class="fa fa-filter" aria-hidden="true"></i>
                                <input class="btn_filter" name="Status" type="submit" value="Status">
                           </form>
                      </th>
                      <th>Descripton</th>
                      <th>Image</th>
                    </tr>
                  </thead>
                  <tbody>
                      
                  <?php
                  
                    // по умолчанию таблица фильтруется по номерам в порядке возрастания
                    $sql = 'SELECT * FROM tasks ORDER BY id ASC';
                    
                    // определяем запрос фильтрации для соответсвующих колонок
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
                    
                    // подключаемся к БД
                    $pdo = Model::database_connect();
                    
                    // выбираем по очереди значения из БД, создаем ячейки таблицы и вписываем значения в ячейки
                    foreach ($pdo->query($sql) as $row) 
                        {
                            echo '<tr>';
                            echo '<td>'. $row['id'] . '</td>';
                            echo '<td>'. $row['username'] . '</td>';
                            echo '<td>'. $row['email'] . '</td>';
                            
                            // статус заявки в БД записан флагами 1 и 2, переводим его в "человекопонятный" вид 
                            if ($row['status'] == 1){
                                echo '<td>'. "невыполнено" . '</td>';  
                            } else {
                                echo '<td>'. "выполнено" . '</td>'; 
                            }
                            echo '<td>'. $row['description'] . '</td>';
                            echo '<td>'. $row['photo'] . '</td>';
                            echo '</tr>';
                        }
                        
                    // отключаемся от БД    
                    Model::database_disconnect();
                   ?>
                  </tbody>
                </table>
        </div>
    </div> <!-- /container -->
</p>
