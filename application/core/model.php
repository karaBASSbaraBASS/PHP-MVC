<?php

class Model
{
    // данные подключения к БД
    private static $dbName = 'taskmanager';
    private static $dbHost = 'localhost';
    private static $dbUsername = 'taskmanager';
    private static $dbUserPassword = '123';
    
    private static $cont = null;

    public function __construct() 
        {
    	die('Init function is not allowed');
        }

    public static function database_connect()
        {
        // создадим одно подключение на все случаи
   	if ( null == self::$cont )
            {
            try
                {
                    self::$cont = new PDO( "mysql:host=".self::$dbHost.";"."dbname=".self::$dbName, self::$dbUsername, self::$dbUserPassword);
   		}
            catch(PDOException $e)
   		{
                    die($e->getMessage());
   		}
            }
   	return self::$cont;
        }
    
    // функция отключения от БД    
    public static function database_disconnect()
   	{
            self::$cont = null;
   	}
}
