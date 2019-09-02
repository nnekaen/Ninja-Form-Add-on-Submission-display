<?php
/**
 * Plugin Name:Ninja Form Submission view
 * Description: Shortcode plugin to display list of submission from Ninja form for a loggedin users.
 * Version: 1.0
 * Author: Nneka Edozien
 * Author URI: http://edozien.ch 
*/


//add shortcode to view users submission.

 require_once plugin_dir_path(__FILE__) . 'includes/nsv-functions.php';
 

function test_process_shortcode(){
      
if (is_user_logged_in()) {
    $user = wp_get_current_user();
   if ( !($user instanceof WP_User) ) 
    return; 
   
$current_user = wp_get_current_user();
$current_user_id = $current_user->ID;

?>
 <table class="applied table ">
<thead>
 <tr class="applyth">
        <th>Poste</th>
        <th></th>
        <th style="text-align:right">Actions</th></thead>
</table>
<?php

$form_id = 3;
 
// Get all submissions for that form ID
$submissions = Ninja_Forms()->form( $form_id )->get_subs();
if ( is_array( $submissions ) && count( $submissions ) > 0 ) {
    foreach($submissions as $submission) {
        $race_values = $submission->get_field_values();
        $race_name = $race_values['prenom_1563909438971'];
         $race_jobs = $race_values['apply_for_1558082481080'];
          $race_user = $race_values['user_id_1564481661706'];
   $race_listing = $race_values['listing_id_1557782345539'];




if ($current_user->ID==$race_user)
{ 
 
 echo ' <table class="table applied">

<tbody>
      <tr>
        <td><a href ="/e-temps/?p='.$race_listing.'">' .$race_jobs. '</a></td>
  <td>

<a class="con" style ="padding:5px" 
href ="/e-temps/?p='.$race_listing.'">Description du poste</a></td>
 
</tr></tr></table>'; 
}


        echo '<br><br>';
    }
}



   }
else {
    echo 'You are not logged in';
}












}
add_shortcode("submission", "test_process_shortcode");


?>
