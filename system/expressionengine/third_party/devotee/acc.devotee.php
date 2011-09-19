<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
/**
 * ExpressionEngine - by EllisLab
 *
 * @package		ExpressionEngine
 * @author		ExpressionEngine Dev Team
 * @copyright	Copyright (c) 2003 - 2011, EllisLab, Inc.
 * @license		http://expressionengine.com/user_guide/license.html
 * @link		http://expressionengine.com
 * @since		Version 2.0
 * @filesource
 */
 
// ------------------------------------------------------------------------
 
/**
 * devot:ee Accessory
 *
 * @package		ExpressionEngine
 * @subpackage	Addons
 * @category	Accessory
 * @author		The devot:eam
 * @link		http://devot-ee.com
 */
 
class Devotee_acc {
	
	public $name			= 'devot:ee';
	public $id				= 'devotee';
	public $version			= '1.0';
	public $description		= 'In yr filez, lookin up yr vershins';
	public $sections		= array();
	
	/**
	 * Set Sections
	 */
	public function set_sections()
	{
		$EE =& get_instance();
		
		
		$this->sections['Cool Stuff'] = $EE->load->view('accessory_cool_stuff', '', TRUE);
		
		$this->sections['Cooler Stuff Yet'] = $EE->load->view('accessory_cooler_stuff_yet', '', TRUE);
		
	}
	
	// ----------------------------------------------------------------
	
}
 
/* End of file acc.devotee.php */
/* Location: /system/expressionengine/third_party/devotee/acc.devotee.php */