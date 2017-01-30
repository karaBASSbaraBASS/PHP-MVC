<?php

class View
{

    function generate($content_view, $template_view, $data = null)
	{
            // подключаем общий шаблон для всех страниц
            include 'application/views/'.$template_view;
	}
}
