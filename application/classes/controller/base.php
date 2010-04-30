<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Base extends Controller_Template {

	public $template = 'template';
	
	// Init template for pre-controller operations
	public function before()
	{
		parent::before();
	
		if ($this->auto_render)
		{
			// Initialize empty values
			$this->template->title   = '';
			$this->template->content = '';
		}
	}

	// Build SideNav
	public function get_sidebar($current='',$current_id='')
	{
		// Init
		$data = array();		
		$data['current'] = $current;
		$data['current_id'] = $current_id;
		
		// Build
		$sidebar = View::factory('sidebar',$data)->render();		
		return $sidebar;
	}
}
