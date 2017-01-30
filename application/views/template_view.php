<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
	<meta name="description" content="Дай джину задание и надейся что он все выполнит!"/>
	<meta name="keywords" content="задачи,таски,волщебство"/>
        
        <meta name="viewport" content="width=device-width, initial-scale=1"> <!-- для изменение размера касанием -->
        
	<title>Джин</title>
		
        <link rel="stylesheet" href="css/bootstrap.min.css"/>
        <link rel="stylesheet" href="css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" media="only screen and (max-width: 768px)" href="/css/style.css" />
        <meta name="viewport" content="width=device-width" />
        <link rel="stylesheet" type="text/css" href="/css/style.css"/>
        
        <script type='text/javascript' src="/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="/js/jquery-3.1.1.min.js"></script>  
        
    </head>
    
    <body>
        <div id="wrapper">
        
            <!-- header -->
            <div class="row">
                <div class="header col-lg-12">
                    <div id="logo" class="col-lg-5 col-md-5 col-sm-5 col-xs-2">
                        <h1>Джин</h1>
                    </div>
                    <div class="menu col-lg-7 col-md-7 col-sm-7 col-xs-10">
                        <ul>
                            <li class="first active">
                                <a href="/">
                                Главная
                                </a>
                            </li>
                            <li>
                                <a href="/planer">
                                Планировщик
                                </a>
                            </li>
                            <li>           
                                <a href="/login">
                                    Вход для джинов
                                </a>   
                            </li>
                        </ul>			
                    </div>
                </div>
            </div> <!-- header -->
            
            <!-- блок с контентом -->
            <div class="row">
                <div class="content col-lg-12">		
                    <div class="box">
                        <?php include 'application/views/'.$content_view; ?>			
                    </div>			
                </div>
            </div>    
        </div> <!-- wrapper -->   
        
        <!-- нижний текстовый блок -->
        <div class="row">
            <div class="bottom col-lg-12">
                <div class="bottom_left col-lg-9 col-md-9 col-sm-8 col-xs-12">
                    <h3>О Компании</h3>
                        <p>
                        Вот дом.
                        Который построил Джек.

                        А это пшеница.
                        Которая в тёмном чулане хранится
                        В доме,
                        Который построил Джек.
                                    
                        А это веселая птица-синица,
                        Которая часто ворует пшеницу,
                        Которая в темном чулане хранится
                        В доме,
                        Который построил Джек. 
                        </p>
                </div>		
                <div class="bottom_right col-lg-3 col-md-3 col-sm-4 col-xs-12">
                    <h3>Наши контакты</h3>
                        <div>
                            <i class="fa fa-phone">
                            </i>
                            <a href="tel:(044)2215217">
                                (044)2255522
                            </a>
                            </br>
                            <i class="fa fa-envelope">
                            </i>
                            <a href="mailto:make.your.wish@ukr.net">
                                make.your.wish@ukr.net
                            </a>
                            </br>
                            <i class="fa fa-clock-o">
                            </i>
                                пн - пт 9:00 - 21:00
                        </div>
                </div>                  	
            </div>
        </div> <!-- нижний текстовый блок -->
        
        <!-- footer -->
        <div class="row">
            <div class="footer col-lg-12">
                <a href="/">Desegn by Jack</a> &copy; 2017</a>
            </div>
        </div>
              
    </body>
</html>