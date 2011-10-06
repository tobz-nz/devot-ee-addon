<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * ExpressionMonitor Addon Accessory
 *
 * @package		ExpressionEngine
 * @subpackage	Accessories
 * @author		Visual Chefs, LLC
 * @copyright	Copyright (c) 2011, Visual Chefs, LLC
 */
class Ee_monitor_acc {
	
	/**
	 * Accessory information
	 */
	public $name = 'EE Monitor';
	public $id = 'ee_monitor';
	public $version = '0.1.0';
	public $description = 'Monitor your addons for updates';
	public $sections = array();
	
	/**
	 * Constructor
	 */
	public function __construct()
	{
		$this->EE =& get_instance();
	}
	
	/**
	 * Install accessory
	 */
	public function install()
	{
		return TRUE;
	}
	
	/**
	 * Update accessory
	 */
	public function update()
	{
		return TRUE;
	}
	
	/**
	 * Uninstall accessory
	 */
	public function uninstall()
	{
		return TRUE;
	}
	
	/**
	 * Set accessory sections
	 */
	public function set_sections()
	{
		$this->sections['Addon Updates'] = '<p>Info goes here&hellip;</p>';
	}
	
}

/* End of file acc.ee_monitor.php */