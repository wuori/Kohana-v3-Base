<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Home extends Controller_Base {

	public function action_index()
	{
		// Prep Template
		$this->template->title = 'Welcome';
		
		// Init
		$data = array();
		//$data['sidebar'] = parent::get_sidebar();

		// Build Page
		$this->template->content = View::factory('home',$data);
	}

}
