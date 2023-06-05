<?php
class Controller_Login_check extends Controller
{
	function action_index()
	{
		$this->view->generate('login_check.php', 'template_view.php');
	}
}
