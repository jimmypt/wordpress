<?php

if (!function_exists('synved_wp_package_load'))
{
	function synved_wp_package_load()
	{
		$path = __FILE__;
	
		if (defined('SYNVED_PACKAGE_INCLUDE_PATH'))
		{
			$path = SYNVED_PACKAGE_INCLUDE_PATH;
		}
	
		$dir = dirname($path) . DIRECTORY_SEPARATOR;
	
		if (!function_exists('synved_plugout_module_import'))
		{
			include($dir . 'synved-plugout' . DIRECTORY_SEPARATOR . 'synved-plugout.php');
		}

		synved_plugout_path_set('module', $dir);
	
		/* Register used modules */
		synved_plugout_module_register('synved-connect');
		synved_plugout_module_path_add('synved-connect', 'core', $dir . 'synved-connect');
		synved_plugout_module_register('synved-option');
		synved_plugout_module_path_add('synved-option', 'core', $dir . 'synved-option');
	
		/* Import modules */
		synved_plugout_module_import('synved-connect');
		synved_plugout_module_import('synved-option');
	}

	synved_wp_package_load();
}

synved_plugout_module_path_add('synved-connect', 'addon', dirname((defined('SYNVED_PACKAGE_INCLUDE_PATH') ? SYNVED_PACKAGE_INCLUDE_PATH : __FILE__)) . '/synved-connect/addons');
synved_plugout_module_path_add('synved-option', 'addon', dirname((defined('SYNVED_PACKAGE_INCLUDE_PATH') ? SYNVED_PACKAGE_INCLUDE_PATH : __FILE__)) . '/synved-option/addons');

?>
