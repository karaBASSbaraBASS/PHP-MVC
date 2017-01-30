<?php
// распаковать массив с текстом ошибок проверки     
extract($data);

// проверки
//if (isset($username)){
//    echo $username;
//}
//echo $data;
//if (isset($sessionName)){
//    echo ' Данные выбраны из рядка №'.$sessionName;
//}

if ( !empty($_POST)) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $description = $_POST['description'];
    $photo = $_POST['photo'];
    $status = $_POST['status'];
}


?>

<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">  
            <div class="row">
                <h3>Заполните поля и нажмите "Создать"</h3>
            </div>
        </div>
    </div>
</nav>

    <div class="create_container">
        <div class="span10 offset1">  
            <form class="form-horizontal" action="" method="post">
                        
                    <!-- выделить область красным в случае ошибки заполнения -->
                    <div class="control-group <?php echo !empty($usernameError)?'alert-danger':'';?>">
                       
                        <label class="control-label">
                            username
                        </label>
                        
                        <div class="controls">
                            
                            <!-- в случае неправильно введенных данных - вернуть написанный текст -->
                            <input name="username" size="50" type="text"  placeholder="username" value="<?php echo !empty($username)?$username:'';?>">
                            
                            <!-- в случае неправильно введенных данных - написать причину ошибки -->
                            <?php if (!empty($usernameError)): ?>
                                <span class="help-inline"><?php echo $usernameError;?></span>
                            <?php endif; ?>
                                
                        </div>
                    </div>
                    
                    <!-- выделить область красным в случае ошибки заполнения -->
                    <div class="control-group <?php echo !empty($emailError)?'alert-danger':'';?>">
                        
                        <label class="control-label">
                            email
                        </label>
                        
                        <div class="controls">
                            
                            <!-- в случае неправильно введенных данных - вернуть написанный текст -->
                            <input name="email" size="50" type="text" placeholder="email" value="<?php echo !empty($email)?$email:'';?>">
                            
                            <!-- в случае неправильно введенных данных - написать причину ошибки -->
                            <?php if (!empty($emailError)): ?>
                                <span class="help-inline"><?php echo $emailError;?></span>
                            <?php endif;?>
                                
                        </div>
                      </div>
                    
                    <!-- выделить область красным в случае ошибки заполнения -->
                    <div class="control-group <?php echo !empty($descriptionError)?'alert-danger':'';?>">
                        
                        <label class="control-label">
                            description
                        </label>
                        
                        <div class="controls">
                            
                            <!-- в случае неправильно введенных данных - вернуть написанный текст -->
                            <p>
                                <textarea rows="10" cols="80" name="description">
                                    <?php echo !empty($description)?$description:'';?>
                                </textarea>
                            </p>
                            
                            <!-- в случае неправильно введенных данных - написать причину ошибки -->
                            <?php if (!empty($descriptionError)): ?>
                                <span class="help-inline"><?php echo $descriptionError;?></span>
                            <?php endif;?> 
                                
                        </div>
                    </div>
                    
                    <!-- выделить область красным в случае ошибки заполнения -->
                    <div class="control-group <?php echo !empty($statusError)?'alert-danger':'';?>">
                        
                        <label class="control-label">
                            status
                        </label>

                        <!-- выделить область красным в случае ошибки заполнения -->
                        <div class="controls">
                            
                            <!-- в случае неправильно введенных данных - вернуть написанный текст -->
                            <select name="status">
                                <option value="1">невыполнено</option>
                                <option value="2">выполненно</option>
                            </select>
                   
                        </div>
                    </div>
                    
                    <!-- выделить область красным в случае ошибки заполнения -->
                    <div class="control-group <?php echo !empty($photoError)?'alert-danger':'';?>">
                        
                        <label class="control-label">
                            photo
                        </label>
                        
                        <!-- выделить область красным в случае ошибки заполнения -->
                        <div class="controls">
                            
                            <!-- в случае неправильно введенных данных - вернуть написанный текст -->
                            <input name="photo" size="50" type="text" placeholder="photo" value="<?php echo !empty($photo)?$photo:'';?>">
                                
                        </div>
                    </div>
                    
                    <!-- Блок с выбором действия -->
                    <div id="make_choose">
                        <div class="form-actions" style="margin-top: 20px">
                            <form action="" id="Createform" method="post" name="Createform"> 
                                <input class="btn btn-success" name="Create" type="submit" value="Создать">
                                <input class="btn btn-warning" name="Preview" type="submit" value="Предпросмотр">
                            </form>
                            <a class="btn btn-default" href="/admin">
                                Назад
                            </a>
                        </div>
                    </div>
                    
            </form>
          
        </div>            
    </div> <!-- /container -->