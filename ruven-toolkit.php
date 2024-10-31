<?php
/*
Plugin Name: Ruven Toolkit
Description: Extends the functionality of Ruven Themes by adding portfolio and gallery post types, custom widgets, a shortcode editor, and a post format UI.
Version: 2.0
Author: Ruven
Author URI: http://ruventhemes.com/
Author Email: info@ruventhemes.com
*/

if(!get_option('rvnt_disable_plugin'))
{
  // Define Constants
  define('RVNT_PLUGIN_DIR_PATH', plugin_dir_path(__FILE__));
  define('RVNT_PLUGIN_DIR_URL',  plugin_dir_url(__FILE__));

  // Load Plugin Textdomain (for translation)
  add_action('plugins_loaded', 'rvn_load_plugin_textdomain');

  // Includes
  require_once(RVNT_PLUGIN_DIR_PATH.'init-shortcodes.php');
  require_once(RVNT_PLUGIN_DIR_PATH.'init-widgets.php');
  require_once(RVNT_PLUGIN_DIR_PATH.'init-tinymce.php');
  require_once(RVNT_PLUGIN_DIR_PATH.'init-portfolio.php');
  require_once(RVNT_PLUGIN_DIR_PATH.'init-gallery.php');
  require_once(RVNT_PLUGIN_DIR_PATH.'init-post-format-ui.php');
}

function rvn_load_plugin_textdomain() {
  load_plugin_textdomain('ruventhemes', false, dirname(plugin_basename(__FILE__)).'/lang');
}

?>