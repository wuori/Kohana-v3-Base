<?php defined('SYSPATH') or die('No direct script access.');

class Model_Common extends Kohana_Model{

    /*
    * Get Navigation Categories
    */
    public function get_nav_categories($table='tbox_sec_documents_categories')
	{
		$parent_table = str_replace('_categories','',$table);
		$sql = "SELECT {$table}.* FROM {$parent_table} LEFT JOIN {$table} ON {$table}.ID = {$parent_table}.category GROUP BY category ORDER BY {$table}.sort_order ASC";
        return $this->_db->query(Database::SELECT, $sql, FALSE)->as_array();
    }
    
    /*
    * Check Username/Password Combo
    */
    public function check_credentials($username=null,$password=null)
    {
    	$sql = "SELECT * FROM tbox_members WHERE email='".$username."' AND password = AES_ENCRYPT('".$password."','".Kohana_Core::config('site.site_key')."') LIMIT 1";
        return $this->_db->query(Database::SELECT, $sql, FALSE)->as_array();
    }

}
