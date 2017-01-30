<?php

class Controller {
	
	public $model;
	public $view;
	
	function __construct()
	{
                // запускать сессию в каждой странице
                session_start();
		$this->view = new View();
	}
	
	// действие (action), вызываемое по умолчанию
	function action_index()
	{
		// todo	
	}
}
