<?php

class Controller_404 extends Controller
{	
    function action_index()
	{
        // собираем страничку из контента и обложки
        $this->view->generate('404_view.php', 'template_view.php');
	}

}
