<h1>Страница авторизации</h1>
<p>

<div class="container mlogin">
<div id="login">
<h1>Вход</h1>
<form action="" id="loginform" method="post" name="loginform">
    <p>
        <label for="user_login">
            Имя пользователя<br>
            <input class="input" id="username" name="username" size="20" type="text" value="">
        </label>
    </p>
    <p>
        <label for="user_pass">
            Пароль<br>
            <input class="input" id="password" name="password" size="20" type="password" value="">
        </label>
    </p> 
	<p class="submit">
            <input class="button" name="login" type= "submit" value="Log In">
        </p>
</form>

</div>
</div>


<?php

// разпакуем массив с информацией об ошибке
extract($data);

// В случае успешного логин вывести зеленую надпись, в случае неудачного - красную
if($login_status=="access_garanted") 
    { 
    echo '<p style="color:green">Авторизация прошла успешно.</p>';
    } elseif($login_status=="access_denied")
    { 
    echo '<p style="color:red">Логин и/или пароль введены неверно.</p>';
    } 
?>
