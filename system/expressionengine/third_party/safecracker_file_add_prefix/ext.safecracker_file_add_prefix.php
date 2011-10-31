<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Safecracker_file_add_prefix_ext
{
	public $settings = array();
	public $name = 'SafeCracker File - Add Prefix to Filename';
	public $version = '1.0.0';
	public $description = 'Add a prefix to the filename of SafeCracker File field in a SafeCracker form.';
	public $settings_exist = 'n';
	public $docs_url = 'http://github.com/rsanchez/safecracker_file_add_prefix';
	
	/**
	 * constructor
	 * 
	 * @access	public
	 * @param	mixed $settings = ''
	 * @return	void
	 */
	public function __construct($settings = '')
	{
		$this->EE =& get_instance();
		
		$this->settings = $settings;
	}
	
	/**
	 * activate_extension
	 * 
	 * @access	public
	 * @return	void
	 */
	public function activate_extension()
	{
		$hook_defaults = array(
			'class' => __CLASS__,
			'settings' => '',
			'version' => $this->version,
			'enabled' => 'y',
			'priority' => 10
		);
		
		$hooks[] = array(
			'method' => 'safecracker_submit_entry_start',
			'hook' => 'safecracker_submit_entry_start'
		);
		
		foreach ($hooks as $hook)
		{
			$this->EE->db->insert('extensions', array_merge($hook_defaults, $hook));
		}
	}
	
	/**
	 * update_extension
	 * 
	 * @access	public
	 * @param	mixed $current = ''
	 * @return	void
	 */
	public function update_extension($current = '')
	{
		if ($current == '' OR $current == $this->version)
		{
			return FALSE;
		}
		
		$this->EE->db->update('extensions', array('version' => $this->version), array('class' => __CLASS__));
	}
	
	/**
	 * disable_extension
	 * 
	 * @access	public
	 * @return	void
	 */
	public function disable_extension()
	{
		$this->EE->db->delete('extensions', array('class' => __CLASS__));
	}
	
	/**
	 * settings
	 * 
	 * @access	public
	 * @return	void
	 */
	public function settings()
	{
		$settings = array();
		
		return $settings;
	}
	
	public function safecracker_submit_entry_start()
	{
		foreach ($this->EE->safecracker->custom_fields as $field)
		{
			if ($field['field_type'] === 'safecracker_file' && isset($_FILES[$field['field_name']]) && isset($_POST[$field['field_name'].'_prefix']))
			{
				$prefix = $this->EE->input->post($field['field_name'].'_prefix', TRUE);
				
				unset($_POST[$field['field_name'].'_prefix']);
				
				$_FILES[$field['field_name']]['name'] = strtolower(str_replace(' ', '-', $prefix.$_FILES[$field['field_name']]['name']));
			}
		}
	}
}

/* End of file ext.safecracker_file_add_prefix.php */
/* Location: ./system/expressionengine/third_party/safecracker_file_add_prefix/ext.safecracker_file_add_prefix.php */