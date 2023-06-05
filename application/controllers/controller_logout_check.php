<?php
class Controller_Logout_check extends Controller
{
	function action_index()
	{
		$this->view->generate('logout_check.php', 'template_view.php');
	}
}
