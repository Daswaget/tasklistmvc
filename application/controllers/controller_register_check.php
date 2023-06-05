<?php
class Controller_Register_check extends Controller
{
	function action_index()
	{
		$this->view->generate('register_check.php', 'template_view.php');
	}
}
