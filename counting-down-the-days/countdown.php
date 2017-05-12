<?php

/*
Plugin Name: Counting Down the Days
Plugin URI: http://uly.me
Description: This plugin creates a countdown of days. Just set a future time and date. Just add the '[counting_down_the_days]' shortcut in a WordPress post.
Version: 1.0
Author: Ulysses Ronquillo
Author URI: http://uly.me
*/

// include the form
function urr_counting_down_the_days_form() 
{
   include('form.php');
}
// add this plugin under the appearance theme pages
function urr_counting_down_the_days_add_options() 
{
   add_options_page( 'Counting Down The Days', 'Countdown', 'manage_options', __FILE__, 'urr_counting_down_the_days_form' );
}
add_action( 'admin_menu', 'urr_counting_down_the_days_add_options' );

// the count down function

function urr_counting_down_the_days() {
   date_default_timezone_set('America/Los_Angeles');
   $countdown_data = get_option('urr_counting_down_the_days_data');
   $now = time(); 
   $date = strtotime($countdown_data);
   $remaining         = $date - time();
   $days_remaining    = floor($remaining / 86400);
   $hours_remaining   = floor(($remaining % 86400) / 3600);
   $minutes_remaining = floor(($remaining-($days_remaining*60*60*24)-($hours_remaining*60*60))/60);
   $seconds_remaining = floor(($remaining-($days_remaining*60*60*24)-($hours_remaining*60*60))-($minutes_remaining*60));
   if ($date>$now) :
      return '<span style="color:red">'.$days_remaining.' days, '.$hours_remaining.' hours, '.$minutes_remaining.' minutes and '.$seconds_remaining.' seconds left.</span>';
   else :
      return '<span style="color:red">Set a future date!</span>';
   endif;
}
add_shortcode('counting_down_the_days','urr_counting_down_the_days');

// end of file