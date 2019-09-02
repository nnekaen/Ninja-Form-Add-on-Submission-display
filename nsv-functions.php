<?php
/*
 * Add plugin menu to the Admin Control Panel
 */
 
// Add a new top level menu link to the ACP

add_action( 'admin_menu', 'nsv_Add_My_Admin_Link' );

function nsv_Add_My_Admin_Link()
{
  add_menu_page(
        'My First Page', // Title of the page
        'My First Plugin', // Text to show on the menu link
        'manage_options', // Capability requirement to see the link
        'includes/mfp-first-acp-page.php' // The 'slug' - file to display when clicking the link
    );


}
