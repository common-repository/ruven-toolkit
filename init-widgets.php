<?php







/* Initialize Widgets
============================================================ */

class ruven_init_widgets {



  /* Constructor
  ------------------------------------------------------------ */

	function __construct()
	{
	  // Portfolio
	  if(!get_option('rvnt_disable_widgets') && !get_option('rvnt_disable_portfolio'))
    {
  	  // Latest Work Widget
      if(!get_option('rvnt_disable_widget_latest_work')) {
    	  require_once(RVNT_PLUGIN_DIR_PATH.'widgets/latest-work.php');
    	}
  	}
	}



}







/* Invoke Widgets
============================================================ */

new ruven_init_widgets();







?>