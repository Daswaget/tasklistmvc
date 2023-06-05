<?php
class Controller_Task_check extends Controller
{
	function action_index()
	{
		$this->view->generate('task_check.php', 'template_view.php');
	}
}
