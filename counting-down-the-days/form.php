<?php
// if submit form 
if($_POST['urr_counting_down_the_days_hidden'] == 'Y') :
  // store data
  $countdown_data = $_POST['urr_counting_down_the_days_data'];
  update_option('urr_counting_down_the_days_data', $countdown_data);
  ?>
  <div class="updated"><p><strong><?php _e('Options saved.' ); ?></strong></p></div>
  <?php 
else :
  // normal page display. get data.
  $countdown_data = get_option('urr_counting_down_the_days_data');
endif;
?>

<div class="wrap">
  <?php echo "<h2>" . __( 'Counting Down The Days', 'urr_counting_down_the_days' ) . "</h2>"; ?>
  <form name="urr_counting_down_the_days_form" method="post" action="<?php echo str_replace( '%7E', '~', $_SERVER['REQUEST_URI']); ?>">
  <input type="hidden" name="urr_counting_down_the_days_hidden" value="Y">
  <h3><?php _e("Set A Future Date" ); ?></h3>
  <p>Valid Syntax: <code>January 1, 2017 3:00 PM</code></p>
  Date: <input type="text" name="urr_counting_down_the_days_data" value="<?php echo stripslashes($countdown_data); ?>">
  <p class="submit"><input type="submit" name="Submit" value="<?php _e('Update', 'urr_counting_down_the_days' ) ?>" /></p>
  <hr />
  </form>
</div>