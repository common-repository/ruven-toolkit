<?php







/* Initialize Shortcodes
============================================================ */

class ruven_init_shortcodes {



  /* Constructor
  ------------------------------------------------------------ */

	function __construct()
	{
    if(!get_option('rvnt_disable_shortcodes'))
    {
  	  require_once(RVNT_PLUGIN_DIR_PATH.'shortcodes/shortcodes.php');
  	  add_action('wp_enqueue_scripts', array(&$this, 'enqueue_scripts_and_styles'));
  	}
	}



  /* Constructor
  ------------------------------------------------------------ */

	function enqueue_scripts_and_styles()
	{
  	if(!is_admin()) {
  		wp_enqueue_style('ruven-shortcodes', RVNT_PLUGIN_DIR_URL.'shortcodes/shortcodes.css');
  	}
	}



}







/* Invoke Shortcodes
============================================================ */

new ruven_init_shortcodes();







?>