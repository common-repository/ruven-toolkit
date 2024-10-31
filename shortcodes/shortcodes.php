<?php







/* Button
============================================================ */

if(!function_exists('ruven_button'))
{
  function ruven_button($atts, $content = null, $sc_name = '')
  {
    extract(shortcode_atts(array(
      'url'          => '#',
      'style'        => '',
      'size'         => '',
      'open_new_tab' => '',
      'class'        => '',
    ), $atts));

    $url = ($url) ? "href='$url'" : '';
    $open_new_tab = ($open_new_tab == 'on') ? 'target="_blank"' : '';

    $output = "<a class='ruven-button $size $style $class' $url $open_new_tab>";
    $output.= $content;
    $output.= '</a>';

    return apply_filters('rvnt_sc_button_html', $output);
  }

  add_shortcode('ruven_button', 'ruven_button');
}







/* Column
============================================================ */

if(!function_exists('ruven_column'))
{
  function ruven_column($atts, $content = null, $sc_name = '')
  {
    $last = '';
  	if(isset($atts[0]) && trim($atts[0]) == 'last') {
  	  $last = 'ruven-last-column';
  	}

    $column_class = str_replace('_', '-', $sc_name);
    $output = "<div class='$column_class $last'>".do_shortcode($content).'</div>';

    if(!empty($last)) { $output.= '<div class="divider"></div>'; }

    return $output;
  }

  $column_shortcodes = array('one_half',   'one_third', 'two_third', 'three_fourth',
                             'one_fourth', 'one_fifth', 'two_fifth', 'three_fifth',
                             'four_fifth', 'one_sixth', 'two_sixth', 'three_sixth',
                             'four_sixth', 'five_sixth');

  foreach($column_shortcodes as $column_shortcode) {
    add_shortcode('ruven_'.$column_shortcode, 'ruven_column');
  }
}







/* Horizontal Ruler
============================================================ */

if(!function_exists('ruven_hr'))
{
  function ruven_hr($atts, $content = null, $sc_name = '')
  {
    extract(shortcode_atts(array(
      'style' => '',
      'size'  => '',
    ), $atts));

    $output = "<hr class='ruven $style $size' />";

    return apply_filters('rvnt_sc_hr_html', $output);
  }

  add_shortcode('ruven_hr', 'ruven_hr');
}







/* Info Box
============================================================ */

if(!function_exists('ruven_info_box'))
{
  function ruven_info_box($atts, $content = null, $sc_name = '')
  {
    extract(shortcode_atts(array(
      'style' => '',
    ), $atts));

    $output = "<p class='ruven-info-box $style'>".do_shortcode($content).'</p>';

    return apply_filters('rvnt_sc_info_box_html', $output);
  }

  add_shortcode('ruven_info_box', 'ruven_info_box');
}







/* Spacer
============================================================ */

if(!function_exists('ruven_spacer'))
{
  function ruven_spacer($atts, $content = null, $sc_name = '')
  {
    extract(shortcode_atts(array(
      'size'  => '',
    ), $atts));

    $output = "<div class='ruven-spacer $size'></div>";

    return apply_filters('rvnt_sc_spacer_html', $output);
  }

  add_shortcode('ruven_spacer', 'ruven_spacer');
}







?>