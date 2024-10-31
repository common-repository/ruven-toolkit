<?php







/* Initialize Portfolio
============================================================ */

class ruven_init_portfolio {



  /* Constructor
  ------------------------------------------------------------ */

	function __construct()
	{
	  // Portfolio
    if(!get_option('rvnt_disable_portfolio'))
    {
      // Run when the plugin is activated
      register_activation_hook(__FILE__, array($this, 'plugin_activation'));

      // Portfolio Post Type
  	  add_action('init', array(&$this, 'register_post_type'));

  	  // Portfolio Taxonomy
  	  if(!get_option('rvnt_disable_portfolio_tax_type')) {
    	  add_action('init', array(&$this, 'register_taxonomy_type'));
  	  }
  	}
	}



  /* Plugin Activation
  ------------------------------------------------------------ */

  function plugin_activation()
  {
    flush_rewrite_rules();
  }



  /* Register Post Type
  ------------------------------------------------------------ */

  function register_post_type()
  {
    $labels = apply_filters('rvnt_portfolio_labels', array(
      'name'               => _x('Portfolio', 'post type name', 'ruventhemes'),
      'singular_name'      => _x('Portfolio Item', 'singular post type name', 'ruventhemes'),
      'add_new'            => _x('Add New', 'portfolio', 'ruventhemes'),
      'add_new_item'       => __('Add New Portfolio Item', 'ruventhemes'),
      'edit_item'          => __('Edit Portfolio Item', 'ruventhemes'),
      'new_item'           => __('New Portfolio Item', 'ruventhemes'),
      'view_item'          => __('View Portfolio Item', 'ruventhemes'),
      'search_items'       => __('Search Portfolio', 'ruventhemes'),
      'not_found'          => __('No portfolio items found', 'ruventhemes'),
      'not_found_in_trash' => __('No portfolio items found in trash', 'ruventhemes'),
      'parent_item_colon'  => ''
    ));

    $args = apply_filters('rvnt_portfolio_args', array(
    	'labels'              => $labels,
    	'public'              => true,
    	'show_in_nav_menus'   => false,
    	'exclude_from_search' => false,
    	'supports'            => array(
                                 'title',
                                 'editor',
                                 'post-formats',
                                 'thumbnail',
                                 'revisions',
                                 'excerpt',
                                 'comments',
                                 'author',
                                 'custom-fields',
                               ),
      'rewrite'             => array('slug' => _x('portfolio-item', 'URL slug (no spaces or special characters)', 'ruventhemes')),
      'menu_position'       => 5,
      'has_archive'         => true,
    ));

    register_post_type('portfolio', $args);
  }



  /* Register Taxonomy: Type
  ------------------------------------------------------------ */

	function register_taxonomy_type()
  {
    $labels = apply_filters('rvnt_portfolio_tax_labels', array(
      'name'                       => _x('Portfolio Types', 'post type name', 'ruventhemes'),
      'singular_name'              => _x('Portfolio Type', 'singular post type name', 'ruventhemes'),
      'menu_name'                  => __('Types', 'ruventhemes' ),
      'edit_item'                  => __('Edit Portfolio Type', 'ruventhemes'),
      'update_item'                => __('Update Portfolio Type', 'ruventhemes'),
      'add_new_item'               => __('Add New Portfolio Type', 'ruventhemes'),
      'new_item_name'              => __('New Portfolio Type Name', 'ruventhemes'),
      'parent_item'                => __('Parent Portfolio Type', 'ruventhemes'),
      'parent_item_colon'          => __('Parent Portfolio Type:', 'ruventhemes'),
      'all_items'                  => __('All Portfolio Types', 'ruventhemes'),
      'search_items'               => __('Search Portfolio Types', 'ruventhemes'),
      'popular_items'              => __('Popular Portfolio Types', 'ruventhemes'),
      'separate_items_with_commas' => __('Separate portfolio types with commas', 'ruventhemes'),
      'add_or_remove_items'        => __('Add or remove portfolio types', 'ruventhemes'),
      'choose_from_most_used'      => __('Choose from the most used portfolio types', 'ruventhemes'),
      'not_found'                  => __('No portfolio types found.', 'ruventhemes'),
    ));

    $args = apply_filters('rvnt_portfolio_tax_args', array(
      'labels'            => $labels,
      'public'            => true,
      'query_var'         => true,
      'hierarchical'      => true,
      'show_admin_column' => true,
      'rewrite'           => array(
                               'slug' => _x('portfolio-type', 'URL slug (no spaces or special characters)', 'ruventhemes'),
                               'hierarchical' => true
                             ),
    ));

    register_taxonomy('portfolio-type', 'portfolio', $args);
  }



}







/* Invoke Portfolio
============================================================ */

new ruven_init_portfolio();







?>