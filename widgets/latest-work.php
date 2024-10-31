<?php







/* Latest Work Widget
============================================================ */

class rvn_latest_work_widget extends WP_Widget {



  /* Constructor
  ------------------------------------------------------------ */

	function __construct()
	{
		$widget_ops = array('classname' => 'widget_latest_work', 'description' => __('Shows your latest portfolio entries', 'ruventhemes'));

		parent::__construct('latest-work', __('Latest Work', 'ruventhemes'), $widget_ops);

		add_action('save_post',    array(&$this, 'flush_widget_cache'));
		add_action('deleted_post', array(&$this, 'flush_widget_cache'));
		add_action('switch_theme', array(&$this, 'flush_widget_cache'));
	}



  /* Widget
  ------------------------------------------------------------ */

	function widget($args, $instance)
	{
		$cache = wp_cache_get('widget_latest_work', 'widget');

		if(!is_array($cache))
			$cache = array();

		if(isset($cache[$args['widget_id']])) {
			echo $cache[$args['widget_id']];
			return;
		}

		ob_start();
		extract($args);

		$title  = apply_filters('widget_title', empty($instance['title']) ? __('Latest Work', 'ruventhemes') : $instance['title'], $instance, $this->id_base);
		$number = (int)$instance['number'];
		$type   = '';
		if((int)$instance['type']) {
  		$term = get_term((int)$instance['type'], 'portfolio-type');
      $type = $term->slug;
    }

		if(!$number)         $number = 5;
		elseif($number < 1)  $number = 1;

		$r = new WP_Query(array(
		  'post_type'      => 'portfolio',
		  'portfolio-type' => $type,
		  'posts_per_page' => $number,
		  'post_status'    => 'publish',
		));

		if($r->have_posts()):
  		echo $before_widget;
  		if($title) echo $before_title . $title . $after_title;
  		echo '<div class="widget-content"><ul>';
  		while($r->have_posts()) {
  		  $r->the_post();
		    echo '<li><a href="'.get_permalink().'">'. get_the_title() .'</a></li>';
  		}
  		echo '</ul></div>';
  		echo $after_widget;

		// Reset the global $the_post as this query will have stomped on it
		wp_reset_postdata();
		endif;

		$cache[$args['widget_id']] = ob_get_flush();
		wp_cache_set('widget_latest_work', $cache, 'widget');
	}



  /* Update
  ------------------------------------------------------------ */

	function update($new_instance, $old_instance)
	{
		$instance = $old_instance;

		$instance['title']  = $new_instance['title'];
		$instance['number'] = (int)$new_instance['number'];
		$instance['type']   = $new_instance['type'];

		$this->flush_widget_cache();

		$alloptions = wp_cache_get('alloptions', 'options');
		if(isset($alloptions['widget_latest_work']))
			delete_option('widget_latest_work');

		return $instance;
	}



  /* Flush Widget Cache
  ------------------------------------------------------------ */

	function flush_widget_cache()
	{
		wp_cache_delete('widget_latest_work', 'widget');
	}



  /* Form
  ------------------------------------------------------------ */

	function form($instance)
	{
		$instance = wp_parse_args((array)$instance, array(
		  'title'  => __('Latest Work', 'ruventhemes'),
		  'number' => 5,
		  'type'   => ''
		));

		extract($instance);

		if(!is_numeric($number)) $number = 5;

    ?>
		<p>
		  <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:', 'ruventhemes'); ?></label>
		  <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" />
		</p>
		<p>
		  <label for="<?php echo $this->get_field_id('number'); ?>"><?php _e('Number of entries to show:', 'ruventhemes'); ?></label>
		  <input id="<?php echo $this->get_field_id('number'); ?>" name="<?php echo $this->get_field_name('number'); ?>" type="text" value="<?php echo $number; ?>" size="3" />
		</p>
		<p>
		  <label for="<?php echo $this->get_field_id('type'); ?>"><?php _e('Type:', 'ruventhemes'); ?></label>
		  <?php
		  wp_dropdown_categories(array(
		    'id'              => $this->get_field_id('type'),
		    'name'            => $this->get_field_name('type'),
		    'show_option_all' => __('All', 'ruventhemes'),
		    'selected'        => $type,
		    'hierarchical'    => true,
		    'taxonomy'        => _x('portfolio-type', 'URL slug (no spaces or special characters)', 'ruventhemes'),
		  ));
		  ?>
		</p>
    <?php
	}

}







/* Register Widget
============================================================ */

add_action('widgets_init', 'register_latest_work_widget');

function register_latest_work_widget() {
	register_widget('rvn_latest_work_widget');
}







?>