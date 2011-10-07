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
	 * @var		object
	 * @access	protected
	 */
	protected $EE;
	
	/**
	 * @var		array
	 * @access	protected
	 */
	protected $_addons = array();
	
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
		$this->sections['Addon Updates'] = $this->_get_addons();
	}
	
	/**
	 * Get installed addon information
	 *
	 * @access	protected
	 * @return	string
	 */
	protected function _get_addons()
	{
		$this->EE->load->helper('directory');
		$this->EE->load->library('addons');
		$this->EE->load->model('addons_model');
		
		// scan third_party folder
		$map = directory_map(PATH_THIRD, 2);
		
		// return if nothing found
		if($map === FALSE)
		{
			return 'No third-party addons were found.';
		}
		
		// set third-party addons
		$third_party = array_intersect_key($this->EE->addons->_packages, $map);
		
		// get all installed addons
		$installed = array(
			'modules' => $this->EE->addons->get_installed('modules'),
			'plugins' => $this->EE->addons_model->get_plugins(),
			'extensions' => $this->EE->addons->get_installed('extensions'),
			'fieldtypes' => $this->EE->addons->get_installed('fieldtypes'),
			'accessories' => $this->EE->addons->get_installed('accessories')
		);
		
		foreach($third_party as $package => $types)
		{
			if(array_key_exists($package, $this->_addons))
			{
				continue;
			}
			
			// check for module
			if(array_key_exists($package, $installed['modules']))
			{
				$addon = $installed['modules'][$package];
				$this->_set_addon_info($package, $addon['name'], $addon['module_version'], $types);
			}
			// check for plugin
			elseif(array_key_exists($package, $installed['plugins']))
			{
				$addon = $installed['plugins'][$package];
				$this->_set_addon_info($package, $addon['pi_name'], $addon['pi_version'], $types);
			}
			// check for extension
			elseif(array_key_exists($package, $installed['extensions']))
			{
				$addon = $installed['extensions'][$package];
				$this->_set_addon_info($package, $addon['name'], $addon['version'], $types);
			}
			// check for fieldtype
			elseif(array_key_exists($package, $installed['fieldtypes']))
			{
				$addon = $installed['fieldtypes'][$package];
				$this->_set_addon_info($package, $addon['name'], $addon['version'], $types);
			}
			// check for accessory
			elseif(array_key_exists($package, $installed['accessories']))
			{
				$addon = $installed['accessories'][$package];
				$this->_set_addon_info($package, $addon['name'], $addon['accessory_version'], $types);
			}
		}
		
		return $this->EE->load->view('updates', array('addons' => $this->_addons), TRUE);
	}
	
	/**
	 * Set addon info
	 */
	protected function _set_addon_info($package, $name, $version, $types)
	{
		$this->_addons[$package] = array(
			'name' => $name,
			'version' => $version,
			'types' => array_keys($types)
		);
	}
	
}

/* End of file acc.ee_monitor.php */