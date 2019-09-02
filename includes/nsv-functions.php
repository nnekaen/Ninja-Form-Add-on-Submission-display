<?php
/*
 * Add plugin menu to the Admin Control Panel
 */
 


add_action( 'admin_enqueue_scripts', 'mw_enqueue_color_picker' );
function mw_enqueue_color_picker( $hook_suffix ) {
    // first check that $hook_suffix is appropriate for your admin page
    wp_enqueue_style( 'wp-color-picker' );
    wp_enqueue_script( 'my-script-handle', plugins_url('table-colors.js', __FILE__ ), array( 'wp-color-picker' ), false, true );
}


// Hook the 'admin_menu' action hook, run the function named 'extra_post_info_menu'



add_action( 'admin_menu', 'extra_post_info_menu' ); 


 function extra_post_info_menu(){    
$page_title = 'Ninja Form View';   
$menu_title = 'Ninja Form View';  
 $capability = 'manage_options';   
$menu_slug  = 'ninja-form-view';   
$function   = 'extra_post_info_page';  
 $icon_url   = 'dashicons-media-code';  
 $position   = 9;    


add_menu_page( $page_title,$menu_title,$capability,$menu_slug,$function,$icon_url,$position ); } 



//check if the $fuction exist

if( !function_exists("extra_post_info_page") ) 

{ 


function extra_post_info_page(){ ?>    


 <h1>WordPress Extra Post Info</h1>   

<form method="post" action="options.php">    
 <?php settings_fields( 'extra-post-info-settings' ); ?>     
<?php do_settings_sections( 'extra-post-info-settings' ); ?>    

 <table class="form-table">       
<tr valign="top">      
<th scope="row">Change Table color:</th>       
<td><input type="text" name="extra_post_info" value="<?php echo get_option( 'extra_post_info' ); ?>"/></td>   
<input type="text" value="#bada55" class="my-color-field" data-default-color="#effeff" />

    </tr>    
 </table>   

  <?php submit_button(); ?>   
</form>  

<?php 

}







} 







?>