<?php
$options = get_option('upg_settings');
$attr = shortcode_atts( array(
    'class' => 'pure-form',
    'title' => 'Submit',
    'preview' => $options['global_media_layout'],
    'name' => '',
    'id' =>get_the_ID(),
    'post_type' => 'upg'
), $params );


$abc="";
ob_start ();
if (isset($_POST['upg-nonce']) && wp_verify_nonce($_POST['upg-nonce'], 'upg-nonce')) 
{
    //Submit in USER POST GALLERY WP-UPG Plugin    
    if($attr['post_type']=='upg')
    {
        echo "Submit into 'USER POST GALLERY' but something is wrong with your form. Please check your magic-form shortcode again.";
        
    }
    	
}
else
{
    ?>
    <div id="upg_ajax">
    <!-- Image loader -->
        <div id='upg_loader' style='display: none;'>
            <i class="fa fa-spinner fa-spin" style="font-size:24px"></i>
        </div>
	
        <div class='upg_response'></div>
    </div>
    
    <?php
    echo '<div id="upg_form">
    <form 
    id="upg-request-form" 
    class="upg_ajax_post '.$attr['class'].'"
    method="post" 
    enctype="multipart/form-data"
    action="'.admin_url("admin-ajax.php").'"
    >';
    
    echo do_shortcode($content);

    wp_nonce_field('upg-nonce', 'upg-nonce', false);
    echo '<input type="hidden" name="action" value="upg_ajax_post">';
    echo '<input type="hidden" name="upload_type" value="upg_post">';
    echo '<input type="hidden" name="preview" value="'.$attr['preview'].'">';
    echo '<input type="hidden" name="form_name" value="'.$attr['name'].'">';
    echo '<input type="hidden" name="form_attach" value="'.$attr['id'].'">';

    echo '</form></div>';
    
}

$abc=ob_get_clean (); 
return $abc;
?>