<?php

/*
Plugin Name: Counting Down the Days
Plugin URI: http://uly.me
Description: php countdown
Version: 1.0
Author: Ulysses Ronquillo
Author URI: http://uly.me
*/

// place your php code here

function urr_countdown_days() { 

date_default_timezone_set('America/Los_Angeles');
$date = strtotime("June 1, 2017 3:00 PM");
$remaining         = $date - time();
$days_remaining    = floor($remaining / 86400);
$hours_remaining   = floor(($remaining % 86400) / 3600);
$minutes_remaining = floor(($remaining-($days_remaining*60*60*24)-($hours_remaining*60*60))/60);
$seconds_remaining = floor(($remaining-($days_remaining*60*60*24)-($hours_remaining*60*60))-($minutes_remaining*60));

return '<p>There are '.$days_remaining.' days and '.$hours_remaining.' hours and '.$minutes_remaining.' minutes and '.$seconds_remaining.' seconds left.</p>';

}
add_shortcode('counting_down_the_days','urr_countdown_days');

// end of file