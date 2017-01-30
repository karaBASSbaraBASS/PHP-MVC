<?php

class Controller_planer extends Controller
{
	function action_index()
	{
            // собираем страничку из обложки и контента
            $this->view->generate('planer_view.php', 'template_view.php');
	}
}
