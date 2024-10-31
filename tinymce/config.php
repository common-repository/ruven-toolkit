<?php







/* Button Config
============================================================ */

$ruven_shortcodes['button'] = array(
	'no_preview' => true,
	'params' => array(
		'content' => array(
			'std'   => 'Button',
			'type'  => 'text',
			'label' => __('Title', 'ruventhemes'),
			'desc'  => '',
		),
		'url' => array(
			'std'   => '',
			'type'  => 'text',
			'label' => __('URL', 'ruventhemes'),
			'desc'  => __('Add the button\'s URL (e.g. http://example.com)', 'ruventhemes')
		),
//		'open_new_tab' => array(
//			'type'          => 'checkbox',
//			'label'         => __('Open New Tab', 'ruventhemes'),
//			'checkbox_text' => __('Open link in new tab', 'ruventhemes'),
//			'desc'          => '',
//		),
		'open_new_tab' => array(
			'type'  => 'select',
			'label' => __('Open Link in New Tab', 'ruventhemes'),
			'desc'  => '',
			'options' => array(
				'off' => 'Off',
				'on'  => 'On'
			)
		),
		'style' => array(
			'type'  => 'select',
			'label' => __('Style', 'ruventhemes'),
			'desc'  => '',
			'options' => array(
				'black'      => 'Black',
				'grey'       => 'Grey',
				'purple'     => 'Purple',
				'red'        => 'Red',
				'orange'     => 'Orange',
				'yellow'     => 'yellow',
				'green'      => 'Green',
				'blue'       => 'Blue',
				'light-blue' => 'Light Blue',
			)
		),
		'size' => array(
			'type'    => 'select',
			'label'   => __('Size', 'ruventhemes'),
			'desc'    => '',
			'options' => array(
				'small'  => 'Small',
				'medium' => 'Medium',
				'large'  => 'Large'
			)
		),
	),
	'shortcode'   => '[ruven_button url="{{url}}" style="{{style}}" size="{{size}}" open_new_tab="{{open_new_tab}}"] {{content}} [/ruven_button]',
	'popup_title' => __('Insert Button Shortcode', 'ruventhemes')
);







/* Columns Config
============================================================ */

$ruven_shortcodes['columns'] = array(
	'params'      => array(),
	'shortcode'   => ' {{child_shortcode}} ', // as there is no wrapper shortcode
	'popup_title' => __('Insert Columns Shortcode', 'ruventhemes'),
	'no_preview'  => true,
	
	// child shortcode is clonable & sortable
	'child_shortcode' => array(
		'params' => array(
			'column' => array(
				'type'  => 'select',
				'label' => __('Column Type', 'ruventhemes'),
				'desc'  => '',
				'options' => array(
					'ruven_one_half'     => 'One Half',
					'ruven_one_third'    => 'One Third',
					'ruven_two_third'    => 'Two Thirds',
					'ruven_one_fourth'   => 'One Fourth',
					'ruven_three_fourth' => 'Three Fourth',
					'ruven_one_fifth'    => 'One Fifth',
					'ruven_two_fifth'    => 'Two Fifth',
					'ruven_three_fifth'  => 'Three Fifth',
					'ruven_four_fifth'   => 'Four Fifth',
					'ruven_one_sixth'    => 'One Sixth',
					'ruven_two_sixth'    => 'Two Sixth',
					'ruven_three_sixth'  => 'Three Sixth',
					'ruven_four_sixth'   => 'Four Sixth',
					'ruven_five_sixth'   => 'Five Sixth',
				)
			),
			'last' => array(
				'type'  => 'select',
				'label' => __('Last Column', 'ruventhemes'),
				'desc'  => '',
				'options' => array(
					''     => 'No',
					'last' => 'Yes'
				)
			),
//  		'last' => array(
//  			'type'          => 'checkbox',
//  			'label'         => __('Last Column', 'ruventhemes'),
//  			'checkbox_text' => __('Last Column', 'ruventhemes'),
//  			'desc'          => '',
//  		),
			'content' => array(
				'std'   => '',
				'type'  => 'textarea',
				'label' => __('Column Content', 'ruventhemes'),
				'desc'  => '',
			)
		),
		'shortcode'    => '[{{column}} {{last}}] {{content}} [/{{column}}] ',
		'clone_button' => __('Add Column', 'ruventhemes')
	)
);







/* Horizontal Ruler Config
============================================================ */

$ruven_shortcodes['hr'] = array(
	'no_preview' => true,
	'params' => array(
		'style' => array(
			'type'  => 'select',
			'label' => __('Style', 'ruventhemes'),
			'desc'  => '',
			'options' => array(
				'default' => 'Default',
				'alt'     => 'Alternative',
			),
		),
		'size' => array(
			'type'    => 'select',
			'label'   => __('Size', 'ruventhemes'),
			'desc'    => '',
			'options' => array(
				'small'  => 'Small',
				'medium' => 'Medium',
				'large'  => 'Large'
			)
		),
	),
	'shortcode'   => '[ruven_hr style="{{style}}" size="{{size}}"]',
	'popup_title' => __('Insert Horizontal Ruler Shortcode', 'ruventhemes')
);







/* Info Box Config
============================================================ */

$ruven_shortcodes['info_box'] = array(
	'no_preview' => true,
	'params' => array(
		'content' => array(
			'std'   => 'Your Info Box.',
			'type'  => 'textarea',
			'label' => __('Text', 'ruventhemes'),
			'desc'  => '',
		),
		'style' => array(
			'type'  => 'select',
			'label' => __('Style', 'ruventhemes'),
			'desc'  => '',
			'options' => array(
				'default' => 'Default',
				'grey'    => 'Grey',
				'green'   => 'Green',
				'orange'  => 'Orange',
				'red'     => 'Red',
			)
		),
	),
	'shortcode'   => '[ruven_info_box style="{{style}}"] {{content}} [/ruven_info_box]',
	'popup_title' => __('Insert Info Box Shortcode', 'ruventhemes')
);







/* Spacer Config
============================================================ */

$ruven_shortcodes['spacer'] = array(
	'no_preview' => true,
	'params' => array(
		'size' => array(
			'type'    => 'select',
			'label'   => __('Size', 'ruventhemes'),
			'desc'    => '',
			'options' => array(
				'small'  => 'Small',
				'medium' => 'Medium',
				'large'  => 'Large'
			)
		),
	),
	'shortcode'   => '[ruven_spacer size="{{size}}"]',
	'popup_title' => __('Insert Spacer Shortcode', 'ruventhemes')
);







?>